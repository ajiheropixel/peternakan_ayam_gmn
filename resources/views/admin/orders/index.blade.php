<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Pesanan Masuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <div class="ml-64 p-10 w-full">
        <h1 class="text-3xl font-bold mb-8" data-aos="fade-down">Daftar Pesanan Masuk</h1>
        
        <div class="bg-white rounded-2xl shadow overflow-hidden" data-aos="fade-up">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-600">
                    <tr>
                        <th class="p-4 border-b">Pembeli</th>
                        <th class="p-4 border-b">Produk</th>
                        <th class="p-4 border-b">Jumlah</th>
                        <th class="p-4 border-b">Total</th>
                        <th class="p-4 border-b">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr class="border-b">
                        <td class="p-4 font-bold">{{ $order->user->name }}</td>
                        <td class="p-4">{{ $order->product->nama_produk }}</td>
                        <td class="p-4">{{ $order->jumlah }}</td>
                        <td class="p-4 text-green-600 font-bold">Rp {{ number_format($order->total_harga) }}</td>
                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-xs font-bold 
                                {{ $order->status == 'Pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' }}">
                                {{ $order->status }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
</body>
</html>