<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{

    /**
     * Get the user that owns the Product_Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    protected $fillable= ['pro_var_id','order_id','price','quantity'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function produc_variations()
    {
        return $this->belongsTo(ProductVariation::class, 'pro_var_id', 'id');
    }

    public function product()
    {
        return $this->hasOneThrough(
            Product::class,
            ProductVariation::class,
            'order_id',
            'pro_var_id',
            'id',
            'id'
        );
    }

    use HasFactory;
}
