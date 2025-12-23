<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChickenController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Route Dashboard (Setelah Login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Semua Route yang butuh Login ditaruh di sini
Route::middleware('auth')->group(function () {
    
    // Profile (Bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Modul 1: Manajemen Ayam
    Route::resource('chickens', ChickenController::class);

    // Modul 2: Manajemen Produk
    Route::resource('products', ProductController::class);

    // Modul 3: Manajemen Pesanan
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/admin/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.update');
});

require __DIR__.'/auth.php';