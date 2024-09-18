<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Testimonial;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        
     //Category::factory(11)->create();
     Topic::factory(15)->create();
       // Testimonial::factory(5)->create();
    }
}
