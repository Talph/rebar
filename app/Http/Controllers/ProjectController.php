<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ProjectController extends Controller
{
    public function index(): Factory|View|Application
    {
        try{
            $projects = Project::all();
        } catch (\Exception $e) {
            $projects = [];
        }

        return view('website.projects', [
            'projects' => $projects
        ]);
    }
}
