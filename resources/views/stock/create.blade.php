<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

        <h1 class="text-2xl font-semibold text-gray-800 mb-6">
            Tambah Stok
        </h1>

        <div class="bg-white shadow rounded-xl p-6">

            <form method="POST" action="{{ route('stock.store') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Produk
                    </label>

                    <select name="product_id"
                            class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                        @foreach($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Jenis
                    </label>

                    <select name="type"
                            class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                        <option value="masuk">Stok Masuk</option>
                        <option value="keluar">Stok Keluar</option>

                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Jumlah
                    </label>

                    <input type="number"
                           name="quantity"
                           class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div class="flex justify-end gap-3">

                    <a href="{{ route('stock.index') }}"
                       class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                        Batal
                    </a>

                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>
</x-app-layout>