<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'stock','total_latest_inserted_stock'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
