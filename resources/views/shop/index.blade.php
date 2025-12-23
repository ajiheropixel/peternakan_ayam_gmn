<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Peternakan Ayam</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-50">

    <nav class="bg-white shadow-md p-4 flex justify-between items-center sticky top-0 z-50">
        <h1 class="text-2xl font-bold text-green-700">FarmFresh 🐔</h1>
        <div>
            <a href="/" class="mx-3 hover:text-green-600">Home</a>
            <a href="/shop" class="mx-3 font-bold text-green-600">Belanja</a>
            <a href="/login" class="bg-green-600 text-white px-4 py-2 rounded-lg ml-4">Login Admin</a>
        </div>
    </nav>

    <header class="bg-green-100 py-16 text-center">
        <h2 class="text-4xl font-extrabold text-green-900 mb-2" data-aos="zoom-in">Produk Terbaik dari Kandang Kami</h2>
        <p class="text-gray-600" data-aos="fade-up" data-aos-delay="200">Segar, Organik, dan Langsung dari Peternak.</p>
    </header>

    <div class="max-w-6xl mx-auto p-10 grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($products as $product)
        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition duration-500 transform hover:-translate-y-2" data-aos="fade-up">
            <img src="{{ asset('storage/' . $product->gambar) }}" class="h-48 w-full object-cover" alt="Produk">
            <div class="p-5">
                <h3 class="text-xl font-bold mb-2">{{ $product->nama_produk }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ $product->deskripsi }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-green-700 font-bold text-lg">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                    <button onclick="orderNow('{{ $product->nama_produk }}')" class="bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2 rounded-full font-semibold text-sm transition">
                        Beli Sekarang
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        function orderNow(name) {
            alert('Terima kasih! Pesanan untuk ' + name + ' sedang dikembangkan.');
        }
    </script>
</body>
</html>