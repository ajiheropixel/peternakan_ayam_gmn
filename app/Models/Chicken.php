<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chicken extends Model
{
    protected $fillable = ['kode_kandang', 'jenis_ayam', 'jumlah_ekor', 'tanggal_masuk'];
}