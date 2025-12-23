<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Pesanan Masuk</h2>
                    <p class="mt-1 text-sm text-gray-500">Pantau dan kelola semua transaksi dari pelanggan Anda secara real-time.</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none transition-all">
                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Dashboard
                    </a>
                </div>
            </div>

            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Info Pesanan</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Pelanggan</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Produk</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Harga</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($orders as $order)
                            <tr class="hover:bg-blue-50/50 transition-colors group">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm font-bold text-blue-600 group-hover:text-blue-700">#ORD-{{ sprintf('%03d', $order->id) }}</span>
                                    <div class="text-xs text-gray-400">Terdaftar di Sistem</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 font-medium">
                                    {{ $order->user->name ?? 'Pelanggan Umum' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 font-semibold">{{ $order->product->nama_produk ?? 'Produk' }}</div>
                                    <div class="text-xs text-gray-500 italic">{{ $order->jumlah }} Qty</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm font-bold text-gray-900">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                    @php
                                        $statusClass = [
                                            'Pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                            'Selesai' => 'bg-green-100 text-green-800 border-green-200',
                                            'Dibatalkan' => 'bg-red-100 text-red-800 border-red-200'
                                        ][$order->status] ?? 'bg-gray-100 text-gray-800 border-gray-200';
                                    @endphp
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full border {{ $statusClass }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                    <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    <p class="text-lg font-medium">Belum ada pesanan masuk hari ini.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>