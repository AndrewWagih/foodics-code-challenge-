<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository extends GenericRepository
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    public function view($id)
    {
        return $this->model->with('products')->find($id);
    }

}
