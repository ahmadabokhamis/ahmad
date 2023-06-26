<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class CompanyAdmin extends Model implements AuthenticatableContract
{
    use HasFactory , Authenticatable;

    protected $fillable = [
        'company_id',
        'user_name',
        'email',
        'password',
        'address',
        'phone'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
