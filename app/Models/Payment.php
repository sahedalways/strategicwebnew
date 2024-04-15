<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_id',
        'service_name',
        'quantity',
        'amount',
        'currency',
        'customer_name',
        'customer_email',
        'payment_status',
        'payment_method',
    ];
}
