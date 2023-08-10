<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('status', 'asc')->take(6)->get();

        $posts = Post::get()->take(6);

        return view('welcome', compact('projects', 'posts'));
    }
}