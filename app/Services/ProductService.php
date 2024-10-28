<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    public $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function checkStock($data)
    {
        $products = [];
        foreach($data['products'] as $index =>  $product)
        {

            $check = $this->checkProductAvailability($product['product_id'], $product['quantity']);
            if(!$check)
            {
                $products["product.{$index}.product_id"] = 'ths product is not available currently';
            }
        }
        if(count($products) > 0 )
        {
            abort(response()->json(['success' => false,'errors' => $products], 500));
        }
        
    }

    public function checkProductAvailability($productId, $quantity)
    {
        $product = $this->productRepository->find($productId);
        $ingredients = $product->ingredients;
        foreach($ingredients as $ingredient)
        {
            $ingredientNeeded = $ingredient->pivot->quantity * $quantity;
            if($ingredient->stock < $ingredientNeeded)
            {
                return false;
            }
        }
        return true;

    }
}