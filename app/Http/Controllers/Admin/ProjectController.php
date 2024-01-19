<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Technology;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $currentUserId = Auth::id();
        if ($currentUserId == 1) {
            $projects = Project::paginate(1);
        } else {
            $projects = Project::where('user_id', $currentUserId)->paginate(1);
        }
        $technologies = config('technologies.key');

        if (!empty($request->query('search'))) {
            $search = $request->query('search');
            $projects = Project::where('title', 'like', '%' . $search . '%')->get();
        } else if (!empty($request->query('technologies'))) {
            $projects = Project::where('technologies', 'like', '%' . $request->query('technologies') . '%')->get();
        } else {
            $projects = Project::where('user_id', $currentUserId)->paginate(5);
        }
        return view('admin.projects.index', compact('projects', 'technologies', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('technologies', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $formData = $request->validated();
        $slug = Project::getSlug($formData['title'], '-');
        $formData['slug'] = $slug;
        $user_id = Auth::id();
        $formData['user_id'] = $user_id;
        if ($request->hasFile('image')) {
            $img_path = Storage::put('uploads', $formData['image']);
            $formData['image'] = $img_path;
        }
        $project = Project::create($formData);
        if ($request->has('technologies')) {
            $project->technologies()->attach($request->technologies);
        }
        // $img_path = Storage::disk('public')->put('uploads', $formData['image']);
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, Technology $technology)
    {
        $currentUserId = Auth::id();
        if ($currentUserId == $project->user_id || $currentUserId == 1) {
            return view('admin.projects.show', compact('project', 'technology'));
        }
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $currentUserId = Auth::id();
        if ($currentUserId != $project->user_id && $currentUserId != 1) {
            abort(403);
        }
        $categories = Category::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'technologies', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $formData = $request->validated();
        if ($project->title !== $formData['title']) {
            $slug = Project::getSlug($formData['title'], '-');
        } else {
            $slug = $project->slug;
        }
        $formData['slug'] = $slug;
        $formData['user_id'] = $project->user_id;
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::delete($project->image);
            }
            $img_path = Storage::put('uploads', $request->image);
            $formData['image'] = $img_path;
        }
        $project->update($formData);
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        } else {
            $project->technologies()->detach();
        }
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $currentUserId = Auth::id();
        if ($currentUserId != $project->user_id && $currentUserId != 1) {
            abort(403);
        }
        $project->technologies()->detach();
        if ($project->image) {
            Storage::delete($project->image);
        }
        $project->delete();
        return to_route('admin.projects.index')->with('message', "Project: $project->title was deleted");
    }
}
