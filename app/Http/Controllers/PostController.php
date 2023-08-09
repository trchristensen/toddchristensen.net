<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index()
    {
        $posts = DB::table('posts')->paginate(20);

        return view('blog.index', [
            'posts' => $posts
        ]);

    }

    public function show($slug)
    {
        $post = DB::table('posts')->where('slug', $slug)->first();

        return view('post', [
            'post' => $post
        ]);
    }
}