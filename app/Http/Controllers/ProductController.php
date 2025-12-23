<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller {
    public function index() {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Simpan gambar ke folder storage/app/public/produk
        $path = $request->file('gambar')->store('produk', 'public');

        Product::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $path,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambah!');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }
        $product->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus!');
    }
}