<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chicken extends Model {
    public $timestamps = false; // Tambahkan baris ini
    protected $fillable = ['nama_kandang', 'jenis_ayam', 'jumlah', 'status'];
}