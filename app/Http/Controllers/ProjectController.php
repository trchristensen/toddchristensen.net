<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {

        return view('project.index');
    }

    public function show(Project $project)
    {

        return view('project.show', [
            'project' => $project
        ]);
    }

}