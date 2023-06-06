<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'company_id',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
