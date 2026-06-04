<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\GalleryImage;
use App\Models\Post;
use App\Models\Program;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use App\Models\VolunteerApplication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'posts' => Post::count(),
            'programs' => Program::count(),
            'team' => TeamMember::count(),
            'gallery' => GalleryImage::count(),
            'unreadMessages' => ContactMessage::unread()->count(),
            'pendingVolunteers' => VolunteerApplication::pending()->count(),
        ]);
    }

    public function index(string $resource)
    {
        $config = $this->resource($resource);
        $items = $config['model']::query()->orderBy($config['sort'][0], $config['sort'][1])->paginate(20);

        return view('admin.resource-index', compact('resource', 'config', 'items'));
    }

    public function create(string $resource)
    {
        $config = $this->resource($resource);
        $item = new $config['model'];

        return view('admin.resource-form', compact('resource', 'config', 'item'));
    }

    public function store(Request $request, string $resource)
    {
        $config = $this->resource($resource);
        $data = $this->validatedData($request, $config);

        $config['model']::create($data);

        return redirect()->route("admin.{$resource}.index")->with('status', 'Registro creado.');
    }

    public function edit(string $id, string $resource)
    {
        $config = $this->resource($resource);
        $item = $this->findResourceItem($config, $id);

        return view('admin.resource-form', compact('resource', 'config', 'item'));
    }

    public function update(Request $request, string $id, string $resource)
    {
        $config = $this->resource($resource);
        $item = $this->findResourceItem($config, $id);
        $data = $this->validatedData($request, $config, $item);

        $item->update($data);

        return redirect()->route("admin.{$resource}.index")->with('status', 'Cambios guardados.');
    }

    public function destroy(string $id, string $resource)
    {
        $config = $this->resource($resource);
        $this->findResourceItem($config, $id)->delete();

        return back()->with('status', 'Registro eliminado.');
    }

    public function messages()
    {
        $items = ContactMessage::latest()->paginate(20);

        return view('admin.messages', compact('items'));
    }

    public function showMessage(ContactMessage $message)
    {
        $message->markAsRead();

        return view('admin.message-show', compact('message'));
    }

    public function volunteers()
    {
        $items = VolunteerApplication::latest()->paginate(20);

        return view('admin.volunteers', compact('items'));
    }

    public function updateVolunteer(Request $request, VolunteerApplication $volunteer)
    {
        $data = $request->validate([
            'status' => ['required', 'in:pending,reviewing,accepted,rejected'],
        ]);

        $volunteer->update($data);

        return back()->with('status', 'Estado actualizado.');
    }

    public function settings()
    {
        $settings = SiteSetting::all()->keyBy('key');
        $groups = $this->settingsGroups();

        return view('admin.settings', compact('settings', 'groups'));
    }

    public function updateSettings(Request $request)
    {
        foreach ($this->settingsGroups() as $fields) {
            foreach ($fields as $field) {
                $key = $field['key'];
                $setting = SiteSetting::where('key', $key)->first();
                $value = $field['type'] === 'image'
                    ? $this->storeUploadedFile($request, $key, $field['directory'], $setting?->value)
                    : $request->input($key);

                if ($value !== null) {
                    SiteSetting::set($key, $value, $setting?->type ?? $field['type'], $setting?->group ?? 'general', $setting?->label ?? $field['label']);
                }
            }
        }

        SiteSetting::clearCache();

        return back()->with('status', 'Configuración guardada.');
    }

    private function validatedData(Request $request, array $config, ?Model $item = null): array
    {
        $rules = [];

        foreach ($config['fields'] as $name => $field) {
            if (($field['type'] ?? 'text') === 'file') {
                $rules[$name] = ['nullable', 'image', 'max:4096'];
                continue;
            }

            $rules[$name] = $field['rules'] ?? ['nullable'];
        }

        $data = $request->validate($rules);

        foreach ($config['fields'] as $name => $field) {
            $type = $field['type'] ?? 'text';

            if ($type === 'checkbox') {
                $data[$name] = $request->boolean($name);
            }

            if ($type === 'tags') {
                $data[$name] = collect(explode(',', (string) $request->input($name)))->map(fn ($tag) => trim($tag))->filter()->values()->all();
            }

            if ($type === 'file') {
                $stored = $this->storeUploadedFile($request, $name, $field['directory'], $item?->{$name});
                if ($stored !== null) {
                    $data[$name] = $stored;
                } else {
                    unset($data[$name]);
                }
            }
        }

        if (isset($data['title']) && array_key_exists('slug', $config['fields']) && empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        return $data;
    }

    private function storeUploadedFile(Request $request, string $field, string $directory, ?string $current = null): ?string
    {
        if (! $request->hasFile($field)) {
            return null;
        }

        $file = $request->file($field);
        $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'-'.Str::random(8).'.'.$file->getClientOriginalExtension();
        $relative = trim($directory, '/').'/'.$name;
        $target = public_path('images/'.trim($directory, '/'));

        File::ensureDirectoryExists($target);
        $file->move($target, $name);

        if ($current && File::exists(public_path('images/'.$current))) {
            File::delete(public_path('images/'.$current));
        }

        return $relative;
    }

    private function findResourceItem(array $config, string $key): Model
    {
        $query = $config['model']::query();

        if (ctype_digit($key)) {
            return $query->findOrFail((int) $key);
        }

        if (array_key_exists('slug', $config['fields'])) {
            return $query->where('slug', $key)->firstOrFail();
        }

        abort(404);
    }

    private function resource(string $resource): array
    {
        $resources = [
            'posts' => [
                'title' => 'Blog / Noticias',
                'model' => Post::class,
                'sort' => ['created_at', 'desc'],
                'columns' => ['title' => 'Título', 'category' => 'Categoría', 'is_published' => 'Publicado', 'published_at' => 'Fecha'],
                'fields' => [
                    'title' => ['label' => 'Título', 'rules' => ['required', 'max:255']],
                    'slug' => ['label' => 'Slug', 'rules' => ['nullable', 'max:255']],
                    'excerpt' => ['label' => 'Resumen', 'type' => 'textarea'],
                    'content' => ['label' => 'Contenido', 'type' => 'textarea', 'rules' => ['required']],
                    'image' => ['label' => 'Imagen destacada', 'type' => 'file', 'directory' => 'posts'],
                    'category' => ['label' => 'Categoría', 'type' => 'select', 'options' => ['noticias' => 'Noticias', 'actividades' => 'Actividades', 'programas' => 'Programas', 'testimonios' => 'Testimonios', 'blog' => 'Blog']],
                    'tags' => ['label' => 'Etiquetas separadas por coma', 'type' => 'tags'],
                    'author_name' => ['label' => 'Autor', 'rules' => ['nullable', 'max:255']],
                    'is_published' => ['label' => 'Publicado', 'type' => 'checkbox'],
                    'published_at' => ['label' => 'Fecha de publicación', 'type' => 'datetime'],
                    'meta_description' => ['label' => 'Meta descripción', 'type' => 'textarea'],
                ],
            ],
            'programs' => [
                'title' => 'Programas',
                'model' => Program::class,
                'sort' => ['order', 'asc'],
                'columns' => ['order' => '#', 'title' => 'Título', 'color' => 'Color', 'is_active' => 'Activo'],
                'fields' => [
                    'title' => ['label' => 'Título', 'rules' => ['required', 'max:255']],
                    'slug' => ['label' => 'Slug', 'rules' => ['nullable', 'max:255']],
                    'short_description' => ['label' => 'Descripción corta', 'type' => 'textarea', 'rules' => ['required']],
                    'description' => ['label' => 'Descripción completa', 'type' => 'textarea'],
                    'icon' => ['label' => 'Ícono'],
                    'image' => ['label' => 'Imagen', 'type' => 'file', 'directory' => 'programs'],
                    'color' => ['label' => 'Color', 'type' => 'select', 'options' => ['primary' => 'Azul', 'secondary' => 'Verde', 'accent' => 'Naranja', 'lilac' => 'Lila']],
                    'order' => ['label' => 'Orden', 'type' => 'number'],
                    'is_active' => ['label' => 'Activo', 'type' => 'checkbox'],
                ],
            ],
            'team' => [
                'title' => 'Equipo',
                'model' => TeamMember::class,
                'sort' => ['order', 'asc'],
                'columns' => ['order' => '#', 'name' => 'Nombre', 'role' => 'Cargo', 'is_active' => 'Activo'],
                'fields' => [
                    'name' => ['label' => 'Nombre', 'rules' => ['required', 'max:255']],
                    'role' => ['label' => 'Cargo', 'rules' => ['required', 'max:255']],
                    'bio' => ['label' => 'Biografía', 'type' => 'textarea'],
                    'photo' => ['label' => 'Fotografía', 'type' => 'file', 'directory' => 'team'],
                    'email' => ['label' => 'Email', 'rules' => ['nullable', 'email']],
                    'linkedin' => ['label' => 'LinkedIn'],
                    'facebook' => ['label' => 'Facebook'],
                    'order' => ['label' => 'Orden', 'type' => 'number'],
                    'is_active' => ['label' => 'Activo', 'type' => 'checkbox'],
                ],
            ],
            'gallery' => [
                'title' => 'Galería',
                'model' => GalleryImage::class,
                'sort' => ['order', 'asc'],
                'columns' => ['order' => '#', 'title' => 'Título', 'category' => 'Categoría', 'is_active' => 'Visible'],
                'fields' => [
                    'image' => ['label' => 'Imagen', 'type' => 'file', 'directory' => 'gallery'],
                    'title' => ['label' => 'Título'],
                    'caption' => ['label' => 'Descripción', 'type' => 'textarea'],
                    'category' => ['label' => 'Categoría', 'type' => 'select', 'options' => ['eventos' => 'Eventos', 'actividades' => 'Actividades', 'equipo' => 'Equipo', 'donaciones' => 'Donaciones', 'talleres' => 'Talleres', 'general' => 'General']],
                    'order' => ['label' => 'Orden', 'type' => 'number'],
                    'is_active' => ['label' => 'Visible', 'type' => 'checkbox'],
                ],
            ],
        ];

        abort_unless(isset($resources[$resource]), 404);

        return $resources[$resource];
    }

    private function settingsGroups(): array
    {
        return [
            'General' => [
                ['key' => 'site_name', 'label' => 'Nombre del sitio', 'type' => 'text'],
                ['key' => 'site_tagline', 'label' => 'Slogan', 'type' => 'text'],
                ['key' => 'site_description', 'label' => 'Descripción', 'type' => 'textarea'],
                ['key' => 'site_logo', 'label' => 'Logo', 'type' => 'image', 'directory' => 'settings'],
                ['key' => 'site_favicon', 'label' => 'Favicon', 'type' => 'image', 'directory' => 'settings'],
            ],
            'Inicio' => [
                ['key' => 'hero_image', 'label' => 'Imagen del hero', 'type' => 'image', 'directory' => 'hero'],
                ['key' => 'hero_title', 'label' => 'Título hero', 'type' => 'text'],
                ['key' => 'hero_subtitle', 'label' => 'Subtítulo hero', 'type' => 'textarea'],
                ['key' => 'hero_cta_text', 'label' => 'Botón principal', 'type' => 'text'],
                ['key' => 'hero_cta2_text', 'label' => 'Botón secundario', 'type' => 'text'],
            ],
            'Quiénes Somos' => [
                ['key' => 'about_image', 'label' => 'Imagen', 'type' => 'image', 'directory' => 'about'],
                ['key' => 'about_history', 'label' => 'Historia', 'type' => 'textarea'],
                ['key' => 'mission', 'label' => 'Misión', 'type' => 'textarea'],
                ['key' => 'vision', 'label' => 'Visión', 'type' => 'textarea'],
                ['key' => 'founded_year', 'label' => 'Año fundación', 'type' => 'text'],
                ['key' => 'legal_year', 'label' => 'Año constitución', 'type' => 'text'],
            ],
            'Contacto y redes' => [
                ['key' => 'contact_email', 'label' => 'Email', 'type' => 'text'],
                ['key' => 'contact_phone', 'label' => 'Teléfono', 'type' => 'text'],
                ['key' => 'contact_whatsapp', 'label' => 'WhatsApp', 'type' => 'text'],
                ['key' => 'contact_address', 'label' => 'Dirección', 'type' => 'textarea'],
                ['key' => 'social_facebook', 'label' => 'Facebook', 'type' => 'text'],
                ['key' => 'social_instagram', 'label' => 'Instagram', 'type' => 'text'],
                ['key' => 'social_youtube', 'label' => 'YouTube', 'type' => 'text'],
            ],
            'Donaciones' => [
                ['key' => 'donation_title', 'label' => 'Título', 'type' => 'text'],
                ['key' => 'donation_text', 'label' => 'Texto', 'type' => 'textarea'],
                ['key' => 'donation_bank', 'label' => 'Banco', 'type' => 'text'],
                ['key' => 'donation_clabe', 'label' => 'CLABE', 'type' => 'text'],
                ['key' => 'donation_account', 'label' => 'Cuenta', 'type' => 'text'],
                ['key' => 'donation_paypal', 'label' => 'PayPal', 'type' => 'text'],
            ],
        ];
    }
}
