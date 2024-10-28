<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\ViewOrderProductsWithPivotResource;
use App\Http\Resources\ViewOrderResource;
use App\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
class OrderController extends Controller
{
    public $orderService;
    public $productService;

    public function __construct(OrderService $orderService,ProductService $productService)
    {
        $this->orderService = $orderService;
        $this->productService = $productService;
    }

    public function store(StoreOrderRequest $request)
    {
        $this->productService->checkStock($request->all());
        $order = $this->orderService->store($request->all());
        
        return $this->success(data:new ViewOrderResource($order));
    }
}
