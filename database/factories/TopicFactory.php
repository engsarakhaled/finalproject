<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'topicsTitle'=>fake()->word(),
             'image'=>basename(fake()->image(public_path('assets/admin/images/topics'))),
             'content'=>fake()->text(),
             'published'=>fake()->boolean(),
             'trending'=>fake()->boolean(),
             'category_id'=>fake()->numberBetween(1,10),//depends on the id in my database 
             'no_of_views'=>fake()->numberBetween(1,1000),
        ];
    }
}
