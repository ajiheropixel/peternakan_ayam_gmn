<?php

namespace App\Http\Controllers;

use App\Models\Order; // WAJIB ADA
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Mengambil data dari DB beserta relasi User dan Product
        $orders = Order::with(['user', 'product'])->get();
        
        // Mengirim ke View
        return view('admin.orders.index', compact('orders'));
        $orders = Order::all();
        
         return $orders; // Jika muncul tulisan teks (JSON) di browser, berarti SUDAH nyambung.
    }
}