<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Relasi Many to One: Order dimiliki oleh satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi One to Many: Order memiliki banyak OrderDetail
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}