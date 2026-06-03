<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationIcon  = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Blog / Noticias';
    protected static ?string $navigationGroup = 'Contenido';
    protected static ?int    $navigationSort  = 1;
    protected static ?string $modelLabel      = 'Artículo';
    protected static ?string $pluralModelLabel = 'Blog / Noticias';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Contenido')->schema([
                TextInput::make('title')->label('Título')->required()->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($set, $state) => $set('slug', \Str::slug($state))),
                TextInput::make('slug')->label('Slug (URL)')->required()->unique(ignoreRecord: true),
                Textarea::make('excerpt')->label('Resumen/Extracto')->rows(3)->maxLength(500),
                RichEditor::make('content')->label('Contenido')->required()->columnSpanFull(),
            ])->columns(2),

            Section::make('Imagen y Categoría')->schema([
                FileUpload::make('image')->label('Imagen destacada')->image()->directory('posts')->disk('public'),
                Select::make('category')->label('Categoría')->options([
                    'noticias'    => 'Noticias',
                    'actividades' => 'Actividades',
                    'programas'   => 'Programas',
                    'testimonios' => 'Testimonios',
                    'blog'        => 'Blog',
                ]),
                TagsInput::make('tags')->label('Etiquetas')->separator(','),
                TextInput::make('author_name')->label('Autor')->default('Sinergia A.C.'),
            ])->columns(2),

            Section::make('Publicación')->schema([
                Toggle::make('is_published')->label('Publicado')->default(false),
                DateTimePicker::make('published_at')->label('Fecha de publicación')->default(now()),
                Textarea::make('meta_description')->label('Meta descripción (SEO)')->rows(2)->maxLength(160),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Imagen')->disk('public')->width(60)->height(40),
                TextColumn::make('title')->label('Título')->searchable()->sortable()->limit(50),
                TextColumn::make('category')->label('Categoría')->badge()->color('primary'),
                IconColumn::make('is_published')->label('Publicado')->boolean(),
                TextColumn::make('published_at')->label('Fecha')->dateTime('d/m/Y')->sortable(),
                TextColumn::make('created_at')->label('Creado')->dateTime('d/m/Y')->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_published')->label('Publicados'),
            ])
            ->actions([EditAction::make()])
            ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit'   => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
