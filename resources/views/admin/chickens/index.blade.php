<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Stok Ayam</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex">
        <div class="w-64 h-screen bg-green-800 text-white p-5 fixed">
            <h2 class="text-2xl font-bold mb-8">Farm-Tech 🐔</h2>
            <ul>
                <li class="mb-4"><a href="#" class="hover:text-yellow-400 font-semibold">Dashboard</a></li>
                <li class="mb-4"><a href="/chickens" class="text-yellow-400 font-bold border-b-2 border-yellow-400">Data Ayam</a></li>
                <li class="mb-4"><a href="#" class="hover:text-yellow-400 font-semibold">Produk Jualan</a></li>
                <li class="mb-4"><a href="#" class="hover:text-yellow-400 font-semibold">Pesanan</a></li>
            </ul>
        </div>

        <div class="ml-64 p-10 w-full">
            <div class="flex justify-between items-center mb-8" data-aos="fade-down">
                <h1 class="text-3xl font-bold text-gray-800">Manajemen Stok Ayam
                    <div class="mb-6">
    <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-green-600 transition">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Kembali ke Dashboard Utama
    </a>
</div>
                </h1>
               <button onclick="toggleModal()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-300">
                    + Tambah Data Ayam
                </button>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-green-50">
                        <tr>
                            <th class="p-4 border-b font-bold text-green-900">Kode Kandang</th>
                            <th class="p-4 border-b font-bold text-green-900">Jenis Ayam</th>
                            <th class="p-4 border-b font-bold text-green-900">Jumlah (Ekor)</th>
                            <th class="p-4 border-b font-bold text-green-900">Tanggal Masuk</th>
                            <th class="p-4 border-b font-bold text-green-900 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($chickens as $chicken)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 border-b">{{ $chicken->kode_kandang }}</td>
                            <td class="p-4 border-b">{{ $chicken->jenis_ayam }}</td>
                            <td class="p-4 border-b">{{ $chicken->jumlah_ekor }}</td>
                            <td class="p-4 border-b">{{ $chicken->tanggal_masuk }}</td>
                            <td class="p-4 border-b text-center">
                                <button class="text-blue-600 hover:underline mr-2">Edit</button>
                                <button class="text-red-600 hover:underline">Hapus</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-10 text-center text-gray-500">Belum ada data ayam. Silakan tambah data baru.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <p class="mt-6 text-gray-500 text-sm text-center">UAS Pemrograman Web - Sistem Peternakan Ayam © 2025</p>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // Durasi animasi 1 detik
            once: true // Animasi hanya berjalan sekali saat scroll
        });
    </script>
    <div id="modalTambah" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg w-1/3 p-6 transform transition-all duration-300 scale-90" id="modalContent">
        <h2 class="text-xl font-bold mb-4 text-green-800">Tambah Data Stok Ayam</h2>
        <form action="{{ route('chickens.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Kode Kandang</label>
                <input type="text" name="kode_kandang" class="w-full border rounded p-2 focus:outline-green-500" placeholder="Contoh: KND-01" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Jenis Ayam</label>
                <select name="jenis_ayam" class="w-full border rounded p-2 focus:outline-green-500">
                    <option value="Broiler">Broiler</option>
                    <option value="Petelur">Petelur</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Jumlah (Ekor)</label>
                <input type="number" name="jumlah_ekor" class="w-full border rounded p-2 focus:outline-green-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="w-full border rounded p-2 focus:outline-green-500" required>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="toggleModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan Data</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleModal() {
        const modal = document.getElementById('modalTambah');
        const content = document.getElementById('modalContent');
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => content.classList.replace('scale-90', 'scale-100'), 10);
        } else {
            content.classList.replace('scale-100', 'scale-90');
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 200);
        }
    }
</script>
</body>
</html>