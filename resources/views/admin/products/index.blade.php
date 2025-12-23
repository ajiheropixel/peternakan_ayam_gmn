<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Katalog Produk</h2>
                    <p class="mt-1 text-sm text-gray-500">Update harga, stok, dan foto produk ayam untuk pelanggan Anda.</p>
                </div>
                <div class="mt-4 md:mt-0 flex gap-3">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-xl shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-all">
                        ← Kembali
                    </a>
                    <button onclick="toggleModal()" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white hover:bg-blue-700 transition-all">
                        + Tambah Produk
                    </button>
                </div>
            </div>

            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Gambar</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Nama Produk</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Harga</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Stok</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($products as $product)
                        <tr class="hover:bg-blue-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/' . $product->gambar) }}" class="w-16 h-16 object-cover rounded-xl shadow-sm border border-gray-200">
                            </td>
                            <td class="px-6 py-4 font-bold text-gray-800 text-lg">{{ $product->nama_produk }}</td>
                            <td class="px-6 py-4 font-bold text-green-600">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-gray-100 rounded-full text-xs font-bold text-gray-600">
                                    {{ $product->stok }} Pcs
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-bold text-sm transition">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>