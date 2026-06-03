<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ], [
            'name.required'    => 'El nombre es obligatorio.',
            'email.required'   => 'El correo electrónico es obligatorio.',
            'email.email'      => 'El correo electrónico no es válido.',
            'message.required' => 'El mensaje es obligatorio.',
        ]);

        ContactMessage::create($validated);

        return redirect()->route('contact.index')
            ->with('success', '¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.');
    }
}
