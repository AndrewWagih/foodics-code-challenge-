<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['name', 'stock','total_latest_inserted_stock'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
