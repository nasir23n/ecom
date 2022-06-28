<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->words($nb=2, $asTxt = true);
        $slug = Str::slug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            'image' => 'frontend/category/category'.rand(0, 4).'.jpg',
            'details' => $this->faker->text(30),
            'status' => 1,
        ];
    }
}
