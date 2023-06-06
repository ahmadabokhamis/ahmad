<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'admin_id',
        'description',
        'parent_id',
        'last_layar',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

}
