<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id','admin_id','brand_id','name','description','price','weight','dimensions','event'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(CompanyAdmin::class, 'admin_id', 'id');
    }

}
