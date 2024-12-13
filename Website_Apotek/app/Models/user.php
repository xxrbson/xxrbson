<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Perubahan disini
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Menambahkan kolom yang dapat diisi massal
    protected $fillable = [
        'name',
        'email',
        'password',
        'dob',
        'phone',
        'role',
    ];

    // Relasi One to Many: User memiliki banyak Cart
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // Relasi One to Many: User memiliki banyak Wishlist
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    // Relasi One to Many: User memiliki banyak Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}