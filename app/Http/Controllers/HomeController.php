<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Program;
use App\Models\SiteSetting;
use App\Models\TeamMember;

class HomeController extends Controller
{
    public function index()
    {
        $programs   = Program::active()->take(4)->get();
        $posts      = Post::published()->latest('published_at')->take(3)->get();
        $team       = TeamMember::active()->get();

        return view('pages.home', compact('programs', 'posts', 'team'));
    }

    public function about()
    {
        $team = TeamMember::active()->get();

        return view('pages.about', compact('team'));
    }

    public function misionVision()
    {
        return view('pages.mision-vision');
    }

    public function donations()
    {
        return view('pages.donations');
    }
}
