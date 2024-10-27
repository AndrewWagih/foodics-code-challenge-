<?php

namespace App\Repositories;

use App\Models\User;

class OrderRepository extends GenericRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
