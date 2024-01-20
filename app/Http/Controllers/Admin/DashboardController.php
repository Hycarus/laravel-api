<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Models\Category;


class DashboardController extends Controller
{
    public function index()
    {
        // $technologies = Technology::all();
        // $categories = Category::all();
        // $countTechonolgies = [];
        // foreach ($technologies as $technology) {
        //     array_push($countTechonolgies, $technology->name);
        // };
        return view('admin.dashboard');
    }
}
