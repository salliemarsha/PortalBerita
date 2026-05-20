<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita Terkini</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600 tracking-wider">
                        PORTAL<span class="text-gray-800">BERITA</span>
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-gray-700 hover:text-blue-600 transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-700 hover:text-blue-600 transition">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded-md hover:bg-blue-700 transition">Daftar</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-12 mb-10 shadow-inner">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Informasi Terupdate & Terpercaya</h1>
            <p class="text-blue-100 text-lg max-w-2xl mx-auto">Menyajikan berita hangat seputar teknologi, olahraga, dan informasi menarik lainnya langsung ke layar Anda.</p>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b-4 border-blue-600 inline-block pb-1">Berita Terbaru</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 flex flex-col h-full border border-gray-100">
                    <div class="relative h-48 bg-gray-200">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover" alt="{{ $post->title }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">No Image</div>
                        @endif
                        <span class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase">
                            {{ $post->category->name }}
                        </span>
                    </div>

                    <div class="p-6 flex flex-col flex-grow">
                        <div class="text-xs text-gray-500 mb-2 flex justify-between">
                            <span>Oleh: <strong>{{ $post->user->name }}</strong></span>
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-blue-600 transition">
                            <a href="#">{{ $post->title }}</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3 flex-grow">
                            {{ $post->body }}
                        </p>
                        <div class="mt-auto">
                            <a href="#" class="inline-block text-sm font-bold text-blue-600 hover:text-blue-800 transition">
                                Baca Selengkapnya &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white p-8 rounded-xl shadow-sm text-center text-gray-500">
                    Belum ada berita yang diterbitkan untuk saat ini.
                </div>
            @endforelse
        </div>
    </main>

    <footer class="bg-gray-900 text-gray-400 py-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 text-center text-sm">
            <p>&copy; 2026 PortalBerita. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>