<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technology;
use App\Models\Category;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $technologies = Technology::all();
        $categories = Category::all();
        $nameOfTechnolgies = [];
        $numOfTechnolgy = [];
        $numOfCategory = [];
        $nameOfCategory = [];
        foreach ($technologies as $technology) {
            array_push($nameOfTechnolgies, $technology->name);
            array_push($numOfTechnolgy, Project::whereHas('technologies', fn ($query) => $query->where('technologies.name', $technology->name))->count());
        };
        foreach ($categories as $category) {
            array_push($nameOfCategory, $category->name);
            array_push($numOfCategory, Project::where('category_id', $category->id)->count());
        }
        return view('home', compact('categories', 'nameOfTechnolgies', 'numOfCategory', 'numOfTechnolgy', 'nameOfCategory'));
    }
}
