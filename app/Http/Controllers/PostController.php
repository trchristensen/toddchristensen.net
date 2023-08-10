<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index()
    {
        $posts = DB::table('posts')->paginate(20);

        return view('blog.index');

    }

    public function show(Post $post)
    {

        return view('blog.show', [
            'post' => $post
        ]);
    }
}