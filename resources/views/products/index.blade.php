<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">
                Produk
            </h1>

            <a href="{{ route('products.create') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                + Tambah Produk
            </a>
        </div>

        <div class="bg-white shadow rounded-xl overflow-hidden">

            <table class="w-full text-sm text-left">

                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Stok</th>
                        <th class="px-6 py-4">Harga</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($products as $product)
                    <tr class="border-t hover:bg-gray-50">

                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $product->name }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $product->category->name ?? '-' }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $product->stock }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </td>

                        <td class="px-6 py-4 text-right space-x-2">

                            <a href="{{ route('products.edit', $product->id) }}"
                               class="px-3 py-1 bg-yellow-400 text-white rounded-md hover:bg-yellow-500 transition">
                                Edit
                            </a>

                            <form action="{{ route('products.destroy', $product->id) }}"
                                  method="POST"
                                  class="inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>
</x-app-layout>