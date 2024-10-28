<?php

namespace App\Repositories;

use App\Mail\LowStockAlert;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Mail;

class IngredientRepository extends GenericRepository
{
    public function __construct(Ingredient $model)
    {
        parent::__construct($model);
    }

    public function increaseStock($id,$quantityUsed)
    {
        $ingredient = $this->find($id);
        $ingredient->stock -= $quantityUsed;
        $ingredient->save();
        $this->checkStockAlert($ingredient);
    }

    protected function checkStockAlert(Ingredient $ingredient)
    {
        if ($ingredient->stock <= $ingredient->total_latest_inserted_stock * 0.5) {
            Mail::to('merchant@foodics.com')->send(new LowStockAlert($ingredient));
        }
    }
    

}
