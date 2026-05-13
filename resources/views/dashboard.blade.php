<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">
                Dashboard
            </h1>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="bg-white rounded-xl shadow p-6">
                <div class="text-sm text-gray-500">Total Produk</div>
                <div class="mt-2 text-3xl font-bold text-gray-800">
                    {{ $totalProducts ?? 0 }}
                </div>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <div class="text-sm text-gray-500">Total Kategori</div>
                <div class="mt-2 text-3xl font-bold text-gray-800">
                    {{ $totalCategories ?? 0 }}
                </div>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <div class="text-sm text-gray-500">Stok Menipis</div>
                <div class="mt-2 text-3xl font-bold text-gray-800">
                    {{ $lowStock ?? 0 }}
                </div>
            </div>

        </div>

        <div class="mt-8 flex flex-col sm:flex-row gap-4">

            <a href="{{ route('products.index') }}"
               class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Kelola Produk
            </a>

            <a href="{{ route('categories.index') }}"
               class="inline-flex items-center justify-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                Kelola Kategori
            </a>

        </div>

    </div>
</x-app-layout>