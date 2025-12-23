<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin Peternakan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    {{ __("Selamat Datang, ") }} <span class="font-bold text-green-600">{{ Auth::user()->name }}</span>!
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-green-500 hover:shadow-lg transition cursor-pointer">
                    <div class="flex items-center mb-4">
                        <div class="p-3 bg-green-100 rounded-full text-green-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg text-gray-800">Stok Ayam</h3>
                    </div>
                    <p class="text-gray-500 text-sm mb-4">Kelola data populasi ayam di setiap kandang secara real-time.</p>
                    <a href="{{ route('chickens.index') }}" class="inline-block w-full text-center bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700 transition">
                        Buka Manajemen
                    </a>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-blue-500 hover:shadow-lg transition">
                    <div class="flex items-center mb-4">
                        <div class="p-3 bg-blue-100 rounded-full text-blue-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg text-gray-800">Katalog Produk</h3>
                    </div>
                    <p class="text-gray-500 text-sm mb-4">Update harga, stok, dan foto produk ayam/telur untuk pembeli.</p>
                    <a href="{{ route('products.index') }}" class="inline-block w-full text-center bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                        Kelola Produk
                    </a>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border-t-4 border-yellow-500 hover:shadow-lg transition">
                    <div class="flex items-center mb-4">
                        <div class="p-3 bg-yellow-100 rounded-full text-yellow-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg text-gray-800">Pesanan Masuk</h3>
                    </div>
                    <p class="text-gray-500 text-sm mb-4">Lihat daftar pesanan terbaru dari pelanggan website Anda.</p>
                    <a href="{{ route('orders.index') }}" class="inline-block w-full text-center bg-yellow-500 text-white py-2 rounded-lg font-semibold hover:bg-yellow-600 transition">
                        Cek Pesanan
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>