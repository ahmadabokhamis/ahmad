<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable= ['name','description','price','company_id','brand_id','weight','dimensions'];


    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id');
    }

    public function product_order()
    {
        return $this->belongsToMany(Order::class, 'product__orders', 'product_id', 'order_id');
    }

    public function product_order2()
    {
        return $this->HasMany(product_order::class, 'product_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function product_variations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function histories()
    {
        return $this->hasMany(ProductHistory::class, 'product_id', 'id');
    }

}
