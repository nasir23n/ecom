<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->words($nb=5, $asTxt = true);
        $slug = Str::slug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            'short_description' => $this->faker->text(50),
            'description' => $this->faker->text(100),
            'price' => rand(100, 500),
            'image' => 'frontend/products/'.$this->faker->numberBetween(1, 10).'.webp',
            'is_active' => 1,
            'featured' => 1,
            'category_id' => rand(1, 5),
            'brand_id' => rand(1, 5),
            'unit_id' => rand(1, 5),
            'created_by' => 1,
        ];
    }
}
