# 🌱 Sinergia de Amor y Esperanza A.C. — Sitio Web

Sitio web oficial desarrollado en **Laravel 12** con panel de administración **Filament v3**.

---

## 🛠️ Tecnologías

| Tecnología | Versión | Uso |
|---|---|---|
| Laravel | 12.x | Framework backend |
| Filament | 3.x | Panel de administración |
| Tailwind CSS | 3.x | Estilos frontend |
| Alpine.js | 3.x | Interactividad |
| SQLite | — | Base de datos (local) |
| Vite | 6.x | Bundler de assets |

---

## 🚀 Instalación Local (paso a paso)

### 1. Requisitos previos
- PHP 8.2 o superior
- Composer
- Node.js 18+ y npm
- Git

### 2. Clonar el proyecto (o descomprimir)
```bash
cd /tu/directorio
# Si tienes git:
git clone <repo> sinergia-web
cd sinergia-web
```

### 3. Instalar dependencias PHP
```bash
composer install
```

### 4. Instalar dependencias Node.js
```bash
npm install
```

### 5. Configurar el entorno
```bash
# Copiar archivo de entorno
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate
```

### 6. Editar el archivo `.env`
Abre `.env` y configura al menos:
```env
APP_URL=http://localhost:8000

# Si usas SQLite (recomendado para empezar):
DB_CONNECTION=sqlite
# Deja comentadas las líneas DB_HOST, DB_DATABASE, etc.

# Si usas MySQL:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=sinergia_db
# DB_USERNAME=root
# DB_PASSWORD=tu_password

# WhatsApp (tu número con código de país)
WHATSAPP_NUMBER=521XXXXXXXXXX

# Correo (configura con tu proveedor)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tu@gmail.com
MAIL_PASSWORD=tu_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=contacto@sinergiadamoriesperanza.org
```

### 7. Crear base de datos SQLite (si usas SQLite)
```bash
touch database/database.sqlite
```

### 8. Ejecutar migraciones y datos iniciales
```bash
php artisan migrate --seed
```

Esto creará todas las tablas y cargará:
- Usuario administrador: `admin@sinergiadamoriesperanza.org` / `SinergiaAdmin2024!`
- Configuraciones iniciales del sitio
- Los 3 miembros del equipo
- Los 4 programas iniciales

### 9. Crear enlace de almacenamiento de imágenes
```bash
php artisan storage:link
```

### 10. Compilar assets frontend
```bash
# Para desarrollo (con recarga automática):
npm run dev

# Para producción:
npm run build
```

### 11. Iniciar el servidor local
```bash
php artisan serve
```

Ahora visita:
- **Sitio web:** http://localhost:8000
- **Panel admin:** http://localhost:8000/admin
  - Email: `admin@sinergiadamoriesperanza.org`
  - Contraseña: `SinergiaAdmin2024!`

---

## 🔧 Uso del Panel de Administración

Accede a `/admin` para gestionar todo el sitio:

### Configuración del Sitio (⚙️)
Cambia desde el admin: nombre, slogan, logo, imágenes de fondo, textos, datos de contacto, redes sociales, datos bancarios para donaciones y estadísticas.

### Contenido
| Sección | Qué puedes hacer |
|---|---|
| **Blog / Noticias** | Crear, editar y publicar artículos con imagen, categoría, etiquetas y editor rico |
| **Programas** | Gestionar los programas/servicios con descripción, imagen y orden |
| **Equipo** | Agregar o editar miembros del equipo con foto y redes sociales |
| **Galería** | Subir imágenes organizadas por categoría, reordenables |

### Formularios
| Sección | Qué puedes hacer |
|---|---|
| **Mensajes de Contacto** | Ver mensajes recibidos, marcar como leídos (badge contador) |
| **Solicitudes de Voluntariado** | Revisar solicitudes y cambiar su estado (pendiente/revisión/aceptado/rechazado) |

---

## 📁 Estructura del Proyecto

```
sinergia-web/
├── app/
│   ├── Filament/
│   │   ├── Pages/
│   │   │   └── SiteSettingsPage.php    ← Admin: configuración del sitio
│   │   └── Resources/
│   │       ├── PostResource.php         ← Admin: blog
│   │       ├── ProgramResource.php      ← Admin: programas
│   │       ├── TeamMemberResource.php   ← Admin: equipo
│   │       ├── GalleryImageResource.php ← Admin: galería
│   │       ├── ContactMessageResource.php
│   │       └── VolunteerApplicationResource.php
│   ├── Http/Controllers/               ← Controladores del frontend
│   ├── Models/                         ← Modelos de datos
│   └── Providers/
│       ├── AppServiceProvider.php      ← Comparte $siteSettings en todas las vistas
│       └── Filament/AdminPanelProvider.php
├── database/
│   ├── migrations/                     ← Estructura de tablas
│   └── seeders/DatabaseSeeder.php      ← Datos iniciales
├── resources/
│   ├── css/app.css                     ← Estilos con Tailwind
│   ├── js/app.js                       ← Alpine.js + interactividad
│   └── views/
│       ├── layouts/app.blade.php       ← Layout principal (navbar + footer)
│       ├── filament/pages/             ← Vistas del admin
│       └── pages/                      ← Todas las páginas del sitio
├── routes/web.php                      ← Rutas del frontend
├── tailwind.config.js                  ← Paleta de colores personalizada
└── .env.example                        ← Plantilla de configuración
```

---

## 🎨 Paleta de Colores

| Color | Hex | Uso |
|---|---|---|
| Azul institucional | `#4A7DB5` | Encabezados, menú, botones principales |
| Verde esperanza | `#7CB342` | Llamadas a acción, detalles positivos |
| Naranja humano | `#FF8C00` | Secciones cálidas, donaciones |
| Lila inclusión | `#9575CD` | Detalles suaves, fondos secundarios |

---

## 🌐 Despliegue en Producción

### Opción A: Shared Hosting (cPanel)
1. Sube los archivos (excepto `node_modules` y `.env`)
2. Apunta el DocumentRoot a la carpeta `public/`
3. Configura el `.env` con tu base de datos MySQL
4. Ejecuta `composer install --optimize-autoloader --no-dev`
5. Ejecuta `php artisan migrate --seed`
6. Ejecuta `php artisan storage:link`
7. Compila los assets localmente con `npm run build` y sube la carpeta `public/build/`

### Opción B: VPS / Servidor
```bash
# En el servidor:
git pull origin main
composer install --optimize-autoloader --no-dev
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build
```

### Opción C: Laravel Forge / Ploi (recomendado)
Usa un servicio de despliegue que automatiza todo con un solo click.

---

## 📞 Soporte

Para preguntas sobre el sitio web o el panel de administración, contacta al desarrollador o abre un issue en el repositorio.

---

*Desarrollado con ❤️ para Sinergia de Amor y Esperanza A.C.*
