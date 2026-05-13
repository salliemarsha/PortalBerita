<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">
                Data Stok
            </h1>

            <a href="{{ route('stock.create') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                + Tambah Stok
            </a>
        </div>

        <div class="bg-white shadow rounded-xl overflow-hidden">

            <table class="w-full text-sm text-left">

                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4">Produk</th>
                        <th class="px-6 py-4">Jenis</th>
                        <th class="px-6 py-4">Jumlah</th>
                        <th class="px-6 py-4">Tanggal</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($stocks as $stock)
                    <tr class="border-t hover:bg-gray-50">

                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $stock->product->name ?? '-' }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $stock->type }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $stock->quantity }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $stock->created_at->format('d-m-Y') }}
                        </td>

                    </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>
</x-app-layout>