<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desciption',
        'address',
        'email',
        'phone',
        'country',
        'region',
        'product_description',
        'establishment_date',
    ];

    public function admins()
    {
        return $this->hasMany(CompanyAdmin::class, 'company_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'company_id', 'id');
    }

    public function payments()
    {
        return $this->belongsToMany(Payment::class, 'pay_details', 'company_id', 'payment_id');
    }
}
