<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(1);
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }
    public function show($slug)
    {
        $project = Project::where('id', $slug)->with(['category', 'technologies'])->first();
        return response()->json([
            'success' => true,
            'results' => $project
        ]);
    }
}
