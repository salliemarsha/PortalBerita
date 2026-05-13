<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

        <h1 class="text-2xl font-semibold text-gray-800 mb-6">
            Edit Kategori
        </h1>

        <div class="bg-white shadow rounded-xl p-6">

            <form method="POST" action="{{ route('categories.update', $category->id) }}" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Kategori
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ old('name', $category->name) }}"
                           class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                           placeholder="Masukkan nama kategori">

                    @error('name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-3">

                    <a href="{{ route('categories.index') }}"
                       class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                        Batal
                    </a>

                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Update
                    </button>

                </div>

            </form>

        </div>

    </div>
</x-app-layout>