<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Relasi Many to One: Cart dimiliki oleh satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi Many to One: Cart terkait dengan satu Obat
    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}