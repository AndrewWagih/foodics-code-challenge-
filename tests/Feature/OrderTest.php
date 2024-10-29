<?php

namespace Tests\Feature;

use App\Mail\LowStockAlert;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Product;
use App\Models\Ingredient;
use App\Models\Order;
use App\Repositories\IngredientRepository;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use App\Mail\StockAlert;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    public function test_order_is_stored_correctly()
    {
        $product = Product::factory()->create();
        $ingredient = Ingredient::factory()->create();

        $product->ingredients()->attach($ingredient->id, ['quantity' => 150]);

        $response = $this->postJson('/api/order', [
            'products' => [
                ['product_id' => $product->id, 'quantity' => 1],
            ],
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('orders', ['id' => 1]);
    
    }

    public function test_stock_reduction_triggers_alert()
    {
        $ingredient = Ingredient::factory()->create(['stock' => 1000, 'total_latest_inserted_stock' => 2000]);

        if ($ingredient->stock <= $ingredient->total_latest_inserted_stock * 0.5) {
            Mail::fake();
            Mail::assertSent(LowStockAlert::class, function ($mail) {
                return $mail->hasTo('recipient@example.com'); 
            });
        }
    }
}
