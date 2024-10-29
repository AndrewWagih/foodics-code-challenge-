<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends GenericRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function findWithIngredients($id)
    {
        return $this->model->with('ingredients')->find($id);
    }

}
