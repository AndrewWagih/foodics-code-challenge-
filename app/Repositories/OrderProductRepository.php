<?php

namespace App\Repositories;

use App\Models\OrderProduct;

class OrderProductRepository extends GenericRepository
{
    public function __construct(OrderProduct $model)
    {
        parent::__construct($model);
    }

}
