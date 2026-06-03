<?php

namespace App\Http\Controllers;

use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::active()->get();

        return view('pages.programs.index', compact('programs'));
    }

    public function show(string $slug)
    {
        $program = Program::where('slug', $slug)->where('is_active', true)->firstOrFail();

        return view('pages.programs.show', compact('program'));
    }
}
