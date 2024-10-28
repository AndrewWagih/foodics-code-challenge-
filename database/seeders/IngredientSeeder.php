<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Type\Integer;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = [
            [
                'name' => 'Beef',
                'stock' => 300,
                'total_latest_inserted_stock' => 300
            ],
            [
                'name' => 'Cheese',
                'stock' => 300,
                'total_latest_inserted_stock' => 300
            ],
            [
                'name' => 'Onion',
                'stock' => 300,
                'total_latest_inserted_stock' => 300
            ],
        ];
        foreach($ingredients as $ingredient)
        {
            Ingredient::create($ingredient);
        }
    }
}
