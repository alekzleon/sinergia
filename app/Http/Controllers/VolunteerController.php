<?php

namespace App\Http\Controllers;

use App\Models\VolunteerApplication;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index()
    {
        return view('pages.volunteer');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone'        => 'nullable|string|max:20',
            'age'          => 'nullable|integer|min:15|max:99',
            'city'         => 'nullable|string|max:100',
            'occupation'   => 'nullable|string|max:150',
            'availability' => 'nullable|array',
            'skills'       => 'nullable|array',
            'motivation'   => 'required|string|max:2000',
        ], [
            'name.required'       => 'El nombre es obligatorio.',
            'email.required'      => 'El correo electrónico es obligatorio.',
            'motivation.required' => 'Cuéntanos tu motivación para ser voluntario.',
        ]);

        VolunteerApplication::create($validated);

        return redirect()->route('volunteer.index')
            ->with('success', '¡Gracias por tu interés en ser voluntario! Revisaremos tu solicitud y te contactaremos pronto. ✨');
    }
}
