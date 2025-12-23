<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Produk Jualan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-6">
    <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600 transition">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Kembali ke Dashboard
    </a>
    
    <button onclick="toggleModal()" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-700 shadow-lg shadow-blue-100 transition">
        + Tambah Produk
    </button>
</div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-600 uppercase text-sm">
                                <th class="p-4 border-b">Gambar</th>
                                <th class="p-4 border-b">Nama Produk</th>
                                <th class="p-4 border-b">Harga</th>
                                <th class="p-4 border-b">Stok</th>
                                <th class="p-4 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $p)
                            <tr class="hover:bg-gray-50 border-b">
                                <td class="p-4">
                                    <img src="{{ asset('storage/' . $p->gambar) }}" class="w-16 h-16 object-cover rounded-lg border">
                                </td>
                                <td class="p-4 font-bold text-gray-800">{{ $p->nama_produk }}</td>
                                <td class="p-4 text-green-600 font-bold">Rp {{ number_format($p->harga) }}</td>
                                <td class="p-4">{{ $p->stok }} Pcs</td>
                                <td class="p-4">
                                    <form action="{{ route('products.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="modalTambah" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl p-8 max-w-md w-full mx-4">
            <h2 class="text-2xl font-bold mb-4">Tambah Produk Baru</h2>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <input type="text" name="nama_produk" placeholder="Nama Produk" class="w-full border rounded-lg p-2" required>
                    <textarea name="deskripsi" placeholder="Deskripsi" class="w-full border rounded-lg p-2"></textarea>
                    <div class="grid grid-cols-2 gap-2">
                        <input type="number" name="harga" placeholder="Harga" class="w-full border rounded-lg p-2" required>
                        <input type="number" name="stok" placeholder="Stok" class="w-full border rounded-lg p-2" required>
                    </div>
                    <input type="file" name="gambar" class="w-full border rounded-lg p-2" required>
                </div>
                <div class="mt-6 flex gap-2">
                    <button type="button" onclick="toggleModal()" class="flex-1 bg-gray-200 py-2 rounded-lg">Batal</button>
                    <button type="submit" class="flex-1 bg-green-600 text-white py-2 rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal() {
            const modal = document.getElementById('modalTambah');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }
    </script>
</x-app-layout>