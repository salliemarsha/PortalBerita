<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $post->title }} — Portal Berita</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&family=Lora:ital,wght@0,400;0,500;1,400&display=swap"
        rel="stylesheet" />
    <style>
        :root {
            --bg: #f8f9fb;
            --surface: #ffffff;
            --border: #e4e8ef;
            --border-soft: #eef0f5;

            --ink-900: #1e2535;
            --ink-700: #3d4a63;
            --ink-500: #6b7794;
            --ink-300: #9aa3b8;

            --accent: #4a69bd;
            --accent-soft: #eef1fa;
            --accent-mid: #7b96d4;

            --tag-bg: #eef1fa;
            --tag-text: #3d5a9e;

            --article-max: 720px;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--bg);
            color: var(--ink-700);
            -webkit-font-smoothing: antialiased;
        }

        h1,
        h2,
        h3,
        h4 {
            font-family: 'DM Serif Display', serif;
            color: var(--ink-900);
            line-height: 1.2;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            display: block;
            width: 100%;
            object-fit: cover;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .site-header {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-icon svg {
            color: #fff;
        }

        .brand-name {
            font-family: 'DM Serif Display', serif;
            font-size: 1.25rem;
            color: var(--ink-900);
            letter-spacing: -0.02em;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 16px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 100px;
            font-size: 0.82rem;
            font-weight: 500;
            color: var(--ink-700);
            transition: background 0.2s ease, color 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
        }

        .back-btn:hover {
            background: var(--accent-soft);
            border-color: var(--accent-mid);
            color: var(--accent);
            transform: translateX(-2px);
        }

        .back-btn svg {
            transition: transform 0.2s ease;
        }

        .back-btn:hover svg {
            transform: translateX(-3px);
        }

        .article-wrapper {
            padding: 48px 0 80px;
        }

        .article-inner {
            max-width: var(--article-max);
            margin: 0 auto;
        }

        .article-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        .article-header {
            margin-bottom: 36px;
        }

        .article-meta-top {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .article-category {
            display: inline-flex;
            padding: 4px 14px;
            background: var(--tag-bg);
            color: var(--tag-text);
            border-radius: 100px;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .article-title {
            font-size: 2.4rem;
            line-height: 1.15;
            letter-spacing: -0.025em;
            color: var(--ink-900);
            margin-bottom: 24px;
        }

        .author-bar {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 18px 24px;
            background: var(--bg);
            border: 1px solid var(--border-soft);
            border-radius: 12px;
        }

        .author-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent-soft) 0%, #cdd9f5 100%);
            border: 2px solid var(--accent-mid);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .author-avatar svg {
            color: var(--accent);
        }

        .author-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .author-name {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--ink-900);
        }

        .author-date {
            font-size: 0.78rem;
            color: var(--ink-300);
        }

        .article-divider {
            height: 1px;
            background: var(--border);
            margin: 36px 0;
        }

        .article-hero {
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 44px;
            position: relative;
            box-shadow: 0 4px 24px rgba(74, 105, 189, 0.1);
        }

        .article-hero img {
            width: 100%;
            aspect-ratio: 16 / 9;
            object-fit: cover;
        }

        .article-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, transparent 60%, rgba(30, 37, 53, 0.06));
            pointer-events: none;
        }

        .article-body {
            font-family: 'Lora', Georgia, serif;
            font-size: 1.075rem;
            line-height: 1.85;
            color: var(--ink-700);
        }

        .article-body p {
            margin-bottom: 1.6em !important;
        }

        .article-body p:last-child {
            margin-bottom: 0 !important;
        }

        .article-body h2 {
            font-family: 'DM Serif Display', serif;
            font-size: 1.5rem;
            color: var(--ink-900);
            margin: 2em 0 0.8em;
        }

        .article-body h3 {
            font-family: 'DM Serif Display', serif;
            font-size: 1.2rem;
            color: var(--ink-900);
            margin: 1.6em 0 0.6em;
        }

        .article-body a {
            color: var(--accent);
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        .article-body strong {
            color: var(--ink-900);
            font-weight: 600;
        }

        .article-body blockquote {
            border-left: 3px solid var(--accent);
            padding: 12px 0 12px 24px;
            margin: 1.8em 0;
            color: var(--ink-500);
            font-style: italic;
        }

        .article-body-plain {
            font-family: 'Lora', Georgia, serif;
            font-size: 1.075rem;
            line-height: 1.55;
            color: var(--ink-700);
            white-space: pre-wrap;
            word-break: break-word;
        }

        .article-footer {
            margin-top: 56px;
            padding-top: 32px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }

        .article-footer-label {
            font-size: 0.8rem;
            color: var(--ink-300);
        }

        .reading-progress {
            position: fixed;
            top: 64px;
            left: 0;
            width: 0%;
            height: 3px;
            background: linear-gradient(90deg, var(--accent) 0%, var(--accent-mid) 100%);
            z-index: 99;
            transition: width 0.1s linear;
        }

        .site-footer {
            background: var(--surface);
            border-top: 1px solid var(--border);
            padding: 32px 0;
        }

        .footer-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .footer-copy {
            font-size: 0.8rem;
            color: var(--ink-300);
        }

        .footer-brand {
            font-family: 'DM Serif Display', serif;
            font-size: 1rem;
            color: var(--ink-700);
        }

        .action-bar {
            display: flex;
            gap: 15px;
            margin: 30px 0;
            padding: 15px 0;
            border-top: 1px solid var(--border-soft);
            border-bottom: 1px solid var(--border-soft);
        }

        .btn-action {
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--surface);
            border: 1px solid var(--border);
            padding: 8px 20px;
            border-radius: 100px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-action:hover {
            background: var(--bg);
        }

        .btn-liked {
            color: #e74c3c;
            border-color: #fab1a0;
            background: #fff5f5;
        }

        .btn-favorited {
            color: #f1c40f;
            border-color: #fceea7;
            background: #fefcf0;
        }

        @media (max-width: 768px) {
            .article-title {
                font-size: 1.7rem;
            }

            .article-body,
            .article-body-plain {
                font-size: 1rem;
            }

            .article-nav {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .footer-inner {
                flex-direction: column;
                gap: 8px;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 16px;
            }

            .article-wrapper {
                padding: 32px 0 60px;
            }

            .article-title {
                font-size: 1.5rem;
            }

            .author-bar {
                padding: 14px 16px;
            }
        }
    </style>
</head>

<body>

    <div class="reading-progress" id="readingProgress"></div>

    <header class="site-header">
        <div class="container">
            <nav class="navbar">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <div class="brand-icon">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <span class="brand-name">Portal Berita</span>
                </a>
            </nav>
        </div>
    </header>

    <main class="article-wrapper">
        <div class="container">
            <div class="article-inner">

                <div class="article-nav">
                    <a href="{{ route('home') }}" class="back-btn">
                        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Kembali ke Beranda
                    </a>

                    @if($post->category)
                        <span class="article-category">{{ $post->category->name }}</span>
                    @endif
                </div>

                <header class="article-header">
                    <h1 class="article-title">{{ $post->title }}</h1>

                    <div class="author-bar">
                        <div class="author-avatar">
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        <div class="author-info">
                            @if($post->user)
                                <span class="author-name">{{ $post->user->name }}</span>
                            @endif
                            <span class="author-date">
                                Dipublikasikan pada {{ $post->created_at->translatedFormat('d F Y') }}
                            </span>
                        </div>
                    </div>
                </header>

                @if($post->image)
                    <figure class="article-hero">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" loading="eager" />
                        <div class="article-hero-overlay"></div>
                    </figure>
                    <div class="article-divider"></div>
                @endif

                <div class="article-body-plain" style="margin-bottom: 2rem;">
                    {!! nl2br(e($post->body)) !!}
                </div>

                <div class="action-bar">
                    @auth
                        <form action="{{ route('post.like', $post->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn-action {{ $post->isLikedBy(auth()->user()) ? 'btn-liked' : '' }}">
                                <svg width="18" height="18" fill="{{ $post->isLikedBy(auth()->user()) ? 'currentColor' : 'none' }}" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 000-7.78z" />
                                </svg>
                                <span>{{ $post->likes->count() }} Suka</span>
                            </button>
                        </form>

                        <form action="{{ route('post.favorite', $post->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn-action {{ $post->isFavoritedBy(auth()->user()) ? 'btn-favorited' : '' }}">
                                <svg width="18" height="18" fill="{{ $post->isFavoritedBy(auth()->user()) ? 'currentColor' : 'none' }}" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z" />
                                </svg>
                                <span>{{ $post->isFavoritedBy(auth()->user()) ? 'Tersimpan' : 'Simpan' }}</span>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn-action">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 000-7.78z" />
                            </svg>
                            <span>{{ $post->likes->count() }} Suka</span>
                        </a>
                        <a href="{{ route('login') }}" class="btn-action">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z" />
                            </svg>
                            <span>Simpan</span>
                        </a>
                    @endauth
                </div>

                <footer class="article-footer">
                    <span class="article-footer-label">
                        Terima kasih telah membaca artikel ini.
                    </span>
                    <a href="{{ route('home') }}" class="back-btn">
                        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Berita lainnya
                    </a>
                </footer>

            </div>
        </div>
        <div class="container">
            <div class="article-inner">
                <section class="comments-section"
                    style="margin-top: 48px; border-top: 1px solid var(--border); padding-top: 32px;">
                    <h3 style="margin-bottom: 24px;">Komentar ({{ $post->comments->count() }})</h3>

                    @auth
                        <form action="{{ route('comments.store', $post->id) }}" method="POST"
                            style="margin-bottom: 32px; display: flex; flex-direction: column; gap: 12px;">
                            @csrf
                            <textarea name="body" rows="3" placeholder="Tulis opini atau komentar kamu di sini..." required
                                style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid var(--border); font-family: inherit; resize: none;"></textarea>

                            <button type="submit" class="back-btn" style="align-self: flex-start; cursor: pointer;">
                                Kirim Komentar
                            </button>
                        </form>
                    @else
                        <div
                            style="background: var(--border-soft); padding: 16px; border-radius: 6px; text-align: center; margin-bottom: 32px;">
                            <p style="font-size: 0.9rem;">Kamu harus <a href="{{ route('login') }}"
                                    style="color: var(--accent); font-weight: 600;">Log in</a> terlebih dahulu untuk
                                memberikan komentar.</p>
                        </div>
                    @endauth

                    <div class="comments-list" style="display: flex; flex-direction: column; gap: 20px;">
                        @forelse($post->comments()->latest()->get() as $comment)
                            <div class="comment-item"
                                style="background: var(--surface); padding: 16px; border-radius: 8px; border: 1px solid var(--border);">
                                <div
                                    style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; font-size: 0.8rem;">
                                    <span style="font-weight: 600; color: var(--ink-900);">{{ $comment->user->name }}</span>
                                    <span style="color: var(--ink-300);">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <p style="font-size: 0.9rem; line-height: 1.6; color: var(--ink-700);">{{ $comment->body }}
                                </p>
                            </div>
                        @empty
                            <p style="color: var(--ink-300); font-size: 0.9rem; text-align: center; padding: 20px 0;">Belum
                                ada komentar. Jadilah yang pertama berkomentar!</p>
                        @endforelse
                    </div>
                </section>
            </div>
        </div>
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-inner">
                <span class="footer-copy">&copy; {{ date('Y') }} Portal Berita. Semua hak dilindungi.</span>
                <span class="footer-brand">Portal Berita</span>
            </div>
        </div>
    </footer>

    <script>
        const bar = document.getElementById('readingProgress');
        window.addEventListener('scroll', () => {
            const doc = document.documentElement;
            const body = document.body;
            const scrollTop = doc.scrollTop || body.scrollTop;
            const scrollHeight = (doc.scrollHeight || body.scrollHeight) - doc.clientHeight;
            const progress = scrollHeight > 0 ? (scrollTop / scrollHeight) * 100 : 0;
            bar.style.width = Math.min(progress, 100) + '%';
        }, { passive: true });
    </script>

</body>

</html>