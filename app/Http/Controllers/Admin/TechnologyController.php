<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Technology;
use App\Http\Controllers\Controller;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $formData = $request->validated();
        $slug = Technology::getSlug($formData['name'], '-');
        $formData['slug'] = $slug;
        $technology = Technology::create($formData);
        return redirect()->route('admin.technologies.show', $technology);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $formData = $request->validated();
        if ($technology->name !== $formData['name']) {
            $slug = Technology::getSlug($formData['name'], '-');
        } else {
            $slug = $technology->slug;
        }
        $formData['slug'] = $slug;
        $technology->update($formData);
        return redirect()->route('admin.technologies.show', $technology);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return to_route('admin.technologies.index')->with('message', "Technology: $technology->name was deleted");
    }
}
