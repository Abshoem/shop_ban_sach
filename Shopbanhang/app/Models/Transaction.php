<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'customer_name', 'customer_phone', 'customer_address', 'total_price', 'payment_time'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
