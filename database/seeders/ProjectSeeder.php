<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = config('technologies.key');
        $projects = config('db.projects');
        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->title = $project['title'];
            $newProject->body = $project['body'];
            $newProject->user_id = 1;
            $newProject->slug = Str::slug($project['title'], '-');
            $newProject->image = ProjectSeeder::storeimage(__DIR__ . '/images/' . $newProject->slug . '.png', $newProject->slug);
            $newProject->technologies = ProjectSeeder::storeTechnologies($technologies, $project['technologies']);
            $newProject->save();
        }
    }
    public function storeimage($image, $title)
    {
        $url = $image;
        $contents = file_get_contents($url);
        // $name = Str::slug($title, '-') . '.jpg';
        $path = 'images/' . $title . '.png';
        Storage::put($path, $contents);
        return $path;
    }

    public function storeTechnologies($allTechnologies, $usedTechnology)
    {
        $value = '';
        foreach ($allTechnologies as $technology) {
            if (str_contains($usedTechnology, $technology['name'])) {
                $value = $value . $technology['image'] . ', ';
            }
        }
        return $value;
    }
}
