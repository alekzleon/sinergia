<?php

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
