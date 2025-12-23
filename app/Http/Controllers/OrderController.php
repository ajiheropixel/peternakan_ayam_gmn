<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
    // Ambil semua pesanan terbaru beserta data user dan produknya
    $orders = \App\Models\Order::with(['user', 'product'])->latest()->get();
    return view('admin.orders.index', compact('orders'));
}
public function updateStatus(Request $request, $id) {
    $order = \App\Models\Order::findOrFail($id);
    $order->update(['status' => $request->status]);
    return redirect()->back()->with('success', 'Status pesanan diperbarui!');
}
}
