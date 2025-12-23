<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false; // Mencegah error 'updated_at' tidak ditemukan

    protected $fillable = ['user_id', 'product_id', 'jumlah', 'total_harga', 'status'];

    // Menghubungkan pesanan ke tabel users
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Menghubungkan pesanan ke tabel products
    public function product() {
        return $this->belongsTo(Product::class);
    }
}