<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $minus = [0,120,10];
        $product = Product::first();
        $ingredients = Ingredient::all();
        foreach($ingredients as $index =>  $ingredient){
            $product->ingredients()->attach($ingredient->id, ['quantity' => 150 - $minus[$index]]);
        }
    }
}
