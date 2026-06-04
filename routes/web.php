<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Support\Facades\Route;

// ── Páginas principales ────────────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/quienes-somos', [HomeController::class, 'about'])->name('about');

Route::get('/mision-vision', [HomeController::class, 'misionVision'])->name('mision-vision');

// ── Programas ─────────────────────────────────────────────────────────────────
Route::get('/programas', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/programas/{slug}', [ProgramController::class, 'show'])->name('programs.show');

// ── Blog ──────────────────────────────────────────────────────────────────────
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// ── Galería ───────────────────────────────────────────────────────────────────
Route::get('/galeria', [GalleryController::class, 'index'])->name('gallery.index');

// ── Donaciones ────────────────────────────────────────────────────────────────
Route::get('/donaciones', [HomeController::class, 'donations'])->name('donations');

// ── Contacto ──────────────────────────────────────────────────────────────────
Route::get('/contacto', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');

// ── Voluntarios ───────────────────────────────────────────────────────────────
Route::get('/voluntarios', [VolunteerController::class, 'index'])->name('volunteer.index');
Route::post('/voluntarios', [VolunteerController::class, 'store'])->name('volunteer.store');

// ── Admin nativo ─────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::redirect('/site-settings-page', '/admin/settings')->name('site-settings-page');

        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');

        Route::get('/messages', [AdminController::class, 'messages'])->name('messages');
        Route::get('/messages/{message}', [AdminController::class, 'showMessage'])->name('messages.show');

        Route::get('/volunteers', [AdminController::class, 'volunteers'])->name('volunteers');
        Route::patch('/volunteers/{volunteer}', [AdminController::class, 'updateVolunteer'])->name('volunteers.update');

        foreach (['posts', 'programs', 'team', 'gallery'] as $resource) {
            Route::get("/{$resource}", [AdminController::class, 'index'])->defaults('resource', $resource)->name("{$resource}.index");
            Route::get("/{$resource}/create", [AdminController::class, 'create'])->defaults('resource', $resource)->name("{$resource}.create");
            Route::post("/{$resource}", [AdminController::class, 'store'])->defaults('resource', $resource)->name("{$resource}.store");
            Route::get("/{$resource}/{id}/edit", [AdminController::class, 'edit'])->defaults('resource', $resource)->name("{$resource}.edit");
            Route::put("/{$resource}/{id}", [AdminController::class, 'update'])->defaults('resource', $resource)->name("{$resource}.update");
            Route::delete("/{$resource}/{id}", [AdminController::class, 'destroy'])->defaults('resource', $resource)->name("{$resource}.destroy");
        }
    });
});
