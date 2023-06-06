<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'size'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_variations', 'size_id', 'product_id');
    }

    public function product_variations()
    {
        return $this->hasMany(ProductVariation::class, 'size_id', 'id');
    }
}
