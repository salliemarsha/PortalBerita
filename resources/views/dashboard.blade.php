<x-app-layout>
    <div class="p-6">

        <h1 class="text-2xl font-semibold mb-6">
            Dashboard
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-gray-600">Total Produk</h2>
                <p class="text-2xl font-bold">{{ $totalProducts ?? 0 }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-gray-600">Total Kategori</h2>
                <p class="text-2xl font-bold">{{ $totalCategories ?? 0 }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-gray-600">Stok Menipis</h2>
                <p class="text-2xl font-bold">{{ $lowStock ?? 0 }}</p>
            </div>

        </div>

        <div class="mt-6 flex gap-4">
            <a href="{{ route('products.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg">
                Kelola Produk
            </a>

            <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-green-500 text-white rounded-lg">
                Kelola Kategori
            </a>
        </div>

    </div>
</x-app-layout>