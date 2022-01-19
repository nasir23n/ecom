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
        return [
            'name' => $this->faker->words($nb=5, $asTxt = true),
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(10, 500),
            'quantity' => $this->faker->numberBetween(100, 400),
            'image' => 'product'.$this->faker->numberBetween(1, 5).'.jpg',
            'is_active' => 1,
            'category_id' => $this->faker->numberBetween(1, 5),
        ];
        // name
        // slug
        // short_description
        // description
        // regular_price
        // sale_price
        // SKU
        // stock_status
        // featured
        // quantity
        // image
        // images
        // category_id
        // category_id
    }
}
