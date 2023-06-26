<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Model implements AuthenticatableContract
{
    use HasFactory,Authenticatable,HasRoles;

    protected $guard_name = 'admin';

    protected $fillable = [
        'user_name',
        'email',
        'password',
        'address',
        'phone',
    ];

    protected $hidden = [
        'password',
    ];

}
