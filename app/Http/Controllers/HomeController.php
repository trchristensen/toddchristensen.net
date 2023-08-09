<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // get the latest 6 projects from the db
        $projects = Project::latest()->take(6)->get();
        $posts = Post::latest()->take(6)->get();

        return view('welcome', [
            'projects' => $projects,
            'posts' => $posts
        ]);
    }
}