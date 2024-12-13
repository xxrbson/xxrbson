<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id', 
        'category_id', 
        'nama_obat', 
        'deskripsi', 
        'harga', 
        'stok', 
        'image', 
        'terlaris', 
        'weight'
    ];
    // Relasi Many to One: Obat dimiliki oleh satu Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Relasi Many to One: Obat dimiliki oleh satu Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi One to Many: Obat ada di banyak Cart
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // Relasi One to Many: Obat ada di banyak Wishlist
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    // Relasi One to Many: Obat ada di banyak OrderDetail
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}