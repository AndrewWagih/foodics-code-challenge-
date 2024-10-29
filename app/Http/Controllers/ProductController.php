<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        $products = $this->productService->getAllProducts();
        return $this->successWithPagination(data:$products);
    }

    public function show($id)
    {
        $product = $this->productService->findWithIngredients($id);
        return $this->success(data:$product);
        
    }

}
