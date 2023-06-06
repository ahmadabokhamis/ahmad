<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color_code',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_variations', 'color_id', 'product_id');
    }


    public function product_variations()
    {
        return $this->hasMany(ProductVariation::class, 'color_id', 'id');
    }

}
