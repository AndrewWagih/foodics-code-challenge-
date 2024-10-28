<?php
namespace App\Services;

use App\Repositories\IngredientRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;
use Exception;

class OrderService
{
    public $orderRepository;
    public $ingredientRepository;
    public $productRepository;
    
    public function __construct(OrderRepository $orderRepository,IngredientRepository $ingredientRepository,ProductRepository $productRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->ingredientRepository = $ingredientRepository;
        $this->productRepository = $productRepository;
    }

    public function store($data)
    {
        DB::beginTransaction();

        try {
            $order = $this->orderRepository->create([]);
            foreach ($data['products'] as $productData) {

                $order->products()->attach($productData['product_id'], ['quantity' => $productData['quantity']]);
                $product = $this->productRepository->find($productData['product_id']);
                foreach($product->ingredients as $ingredient)
                {
                    $this->ingredientRepository->increaseStock($ingredient->id,$ingredient->pivot->quantity * $productData['quantity']);
                }
            }
            DB::commit();
            return $order;
        } catch (Exception $e) {
            DB::rollBack();
            abort(response()->json(['success' => true,'message' => 'something wrong'], 500));
        }
    }


}