<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChickenController extends Controller
{
    public function index() {
    $chickens = \App\Models\Chicken::all(); // Ambil semua data ayam
    return view('admin.chickens.index', compact('chickens'));
}

public function store(Request $request)
{
    // Validasi data agar tidak kosong
    $request->validate([
        'kode_kandang' => 'required|unique:chickens',
        'jenis_ayam' => 'required',
        'jumlah_ekor' => 'required|numeric',
        'tanggal_masuk' => 'required|date',
    ]);

    // Simpan ke database
    \App\Models\Chicken::create($request->all());

    return redirect()->route('chickens.index')->with('success', 'Data berhasil ditambahkan!');
}
}
