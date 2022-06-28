<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_name = $this->faker->unique()->words($nb=2, $asTxt = true);
        $slug = Str::slug($category_name);
        return [
            'name' => $category_name,
            'slug' => $slug,
            'image' => 'frontend/category/'.rand(1, 10).'.jpg',
            'details' => $this->faker->text(50),
            'status' => 1,
        ];

    }
}
