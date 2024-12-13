<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    // Relasi Many to One: OrderDetail dimiliki oleh satu Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi Many to One: OrderDetail terkait dengan satu Obat
    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}