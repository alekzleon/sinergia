<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index()
    {
        $images     = GalleryImage::active()->get();
        $categories = $images->pluck('category')->unique()->filter()->values();

        return view('pages.gallery', compact('images', 'categories'));
    }
}
