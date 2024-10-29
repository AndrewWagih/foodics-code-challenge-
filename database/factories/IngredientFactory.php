<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class IngredientFactory extends Factory
{
    protected $model = \App\Models\Ingredient::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'stock' => rand(1000,10000),
            'total_latest_inserted_stock'  =>rand(1000,10000)
        ];
    }
}
