<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manajemen Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex">
        <div class="w-64 h-screen bg-green-900 text-white p-5 fixed">
            <h2 class="text-2xl font-bold mb-10 flex items-center">
                <i class="fas fa-egg mr-2 text-yellow-400"></i> Farm Admin
            </h2>
            <ul>
                <li class="mb-4 text-gray-400 uppercase text-xs font-bold">Menu Utama</li>
                <li class="mb-4">
                    <a href="/chickens" class="flex items-center hover:text-yellow-400 transition">
                        <i class="fas fa-home mr-3"></i> Stok Ayam
                    </a>
                </li>
                <li class="mb-4">
                    <a href="/admin/products" class="flex items-center text-yellow-400 font-bold">
                        <i class="fas fa-shopping-basket mr-3"></i> Produk Jualan
                    </a>
                </li>
                <li class="mb-4">
                    <a href="#" class="flex items-center hover:text-yellow-400 transition">
                        <i class="fas fa-file-invoice-dollar mr-3"></i> Pesanan
                    </a>
                </li>
                <li class="mt-20">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-400 hover:text-red-500 flex items-center">
                            <i class="fas fa-sign-out-alt mr-3"></i> Keluar
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <div class="ml-64 p-10 w-full">
            <div class="flex justify-between items-center mb-10" data-aos="fade-down">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Manajemen Produk</h1>
                    <p class="text-gray-500">Kelola katalog jualan website Anda</p>
                </div>
                <button onclick="toggleModal()" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl shadow-lg transition transform hover:scale-105">
                    <i class="fas fa-plus mr-2"></i> Tambah Produk Baru
                </button>
            </div>

            <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-200" data-aos="fade-up">
                <table class="w-full text-left">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-4 font-bold text-gray-600 border-b">Gambar</th>
                            <th class="p-4 font-bold text-gray-600 border-b">Nama Produk</th>
                            <th class="p-4 font-bold text-gray-600 border-b">Harga</th>
                            <th class="p-4 font-bold text-gray-600 border-b text-center">Stok</th>
                            <th class="p-4 font-bold text-gray-600 border-b text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($products as $p)
                        <tr class="hover:bg-green-50/50 transition">
                            <td class="p-4">
                                <img src="{{ asset('storage/' . $p->gambar) }}" class="w-20 h-20 object-cover rounded-lg shadow-sm border">
                            </td>
                            <td class="p-4">
                                <span class="font-bold text-gray-800 block">{{ $p->nama_produk }}</span>
                                <span class="text-xs text-gray-400 italic">{{ Str::limit($p->deskripsi, 40) }}</span>
                            </td>
                            <td class="p-4 text-green-700 font-semibold">Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                            <td class="p-4 text-center">
                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-bold">
                                    {{ $p->stok }} Pcs
                                </span>
                            </td>
                            <td class="p-4 text-center">
                                <form action="{{ route('products.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:bg-red-50 p-2 rounded-lg transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-20 text-center text-gray-400">
                                <i class="fas fa-box-open text-5xl mb-4 block"></i>
                                Belum ada produk jualan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="modalTambah" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-[100] backdrop-blur-sm">
        <div class="bg-white rounded-2xl w-full max-w-md p-8 shadow-2xl transform transition-all scale-95 opacity-0" id="modalContent">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-green-800">Tambah Produk</h2>
                <button onclick="toggleModal()" class="text-gray-400 hover:text-gray-600"><i class="fas fa-times text-xl"></i></button>
            </div>
            
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Nama Produk</label>
                        <input type="text" name="nama_produk" class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-green-500 outline-none transition" placeholder="Ayam Broiler Segar" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="deskripsi" rows="3" class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-green-500 outline-none transition" placeholder="Detail produk..."></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Harga (Rp)</label>
                            <input type="number" name="harga" class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-green-500 outline-none transition" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Stok</label>
                            <input type="number" name="stok" class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-green-500 outline-none transition" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Foto Produk</label>
                        <input type="file" name="gambar" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 cursor-pointer" required>
                    </div>
                </div>
                
                <div class="mt-8 flex gap-3">
                    <button type="button" onclick="toggleModal()" class="flex-1 bg-gray-100 text-gray-600 py-3 rounded-xl font-bold hover:bg-gray-200 transition">Batal</button>
                    <button type="submit" class="flex-1 bg-green-600 text-white py-3 rounded-xl font-bold hover:bg-green-700 shadow-lg shadow-green-200 transition">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800 });

        function toggleModal() {
            const modal = document.getElementById('modalTambah');
            const content = document.getElementById('modalContent');
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                setTimeout(() => {
                    content.classList.remove('scale-95', 'opacity-0');
                    content.classList.add('scale-100', 'opacity-100');
                }, 10);
            } else {
                content.classList.remove('scale-100', 'opacity-100');
                content.classList.add('scale-95', 'opacity-0');
                setTimeout(() => {
                    modal.classList.remove('flex');
                    modal.classList.add('hidden');
                }, 200);
            }
        }
    </script>
</body>
</html>