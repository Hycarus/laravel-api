<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = config('technologies.key');
        foreach ($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->name = $technology['name'];
            $newTechnology->image = $technology['image'];
            $newTechnology->slug = Str::slug($technology['name'], '-');
            $newTechnology->save();
        }
    }
}
