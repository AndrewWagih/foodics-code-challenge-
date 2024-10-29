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
                'stock' => 50000,
                'total_latest_inserted_stock' => 50000
            ],
            [
                'name' => 'Cheese',
                'stock' => 40000,
                'total_latest_inserted_stock' => 40000
            ],
            [
                'name' => 'Onion',
                'stock' => 30000,
                'total_latest_inserted_stock' => 30000
            ],
        ];
        foreach($ingredients as $ingredient)
        {
            Ingredient::create($ingredient);
        }
    }
}
