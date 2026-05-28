<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portal Berita</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap" rel="stylesheet" />
    <style>
        /* ─── Design Tokens ──────────────────────────────────────── */
        :root {
            --bg:          #f8f9fb;
            --surface:     #ffffff;
            --border:      #e4e8ef;
            --border-soft: #eef0f5;

            --ink-900:     #1e2535;
            --ink-700:     #3d4a63;
            --ink-500:     #6b7794;
            --ink-300:     #9aa3b8;

            --accent:      #4a69bd;   /* Slate-blue – pas, tidak silau */
            --accent-soft: #eef1fa;
            --accent-mid:  #7b96d4;

            --tag-bg:      #eef1fa;
            --tag-text:    #3d5a9e;

            --shadow-card: 0 2px 12px rgba(74, 105, 189, 0.07);
            --shadow-hover: 0 8px 32px rgba(74, 105, 189, 0.14);

            --radius-card: 16px;
            --radius-sm:   8px;
        }

        /* ─── Base ───────────────────────────────────────────────── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--bg);
            color: var(--ink-700);
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4 {
            font-family: 'DM Serif Display', serif;
            color: var(--ink-900);
            line-height: 1.2;
        }

        a { text-decoration: none; color: inherit; }
        img { display: block; width: 100%; object-fit: cover; }

        /* ─── Layout ─────────────────────────────────────────────── */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ─── Header / Navbar ────────────────────────────────────── */
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

        .brand-icon svg { color: #fff; }

        .brand-name {
            font-family: 'DM Serif Display', serif;
            font-size: 1.25rem;
            color: var(--ink-900);
            letter-spacing: -0.02em;
        }

        .navbar-tagline {
            font-size: 0.78rem;
            color: var(--ink-300);
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-weight: 500;
        }

        /* ─── Hero / Section Titles ──────────────────────────────── */
        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--accent);
        }

        .section-label::before {
            content: '';
            display: block;
            width: 20px;
            height: 2px;
            background: var(--accent);
            border-radius: 2px;
        }

        /* ─── Featured Post ──────────────────────────────────────── */
        .featured-section {
            padding: 48px 0 40px;
        }

        .featured-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            background: var(--surface);
            border-radius: var(--radius-card);
            border: 1px solid var(--border);
            overflow: hidden;
            box-shadow: var(--shadow-card);
            transition: box-shadow 0.35s ease, transform 0.35s ease;
        }

        .featured-card:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-3px);
        }

        .featured-image-wrap {
            position: relative;
            overflow: hidden;
            height: 420px;
        }

        .featured-image-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.55s ease;
        }

        .featured-card:hover .featured-image-wrap img {
            transform: scale(1.04);
        }

        .featured-image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(74,105,189,0.15) 0%, transparent 60%);
            pointer-events: none;
        }

        .featured-content {
            padding: 44px 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 20px;
        }

        .featured-category {
            display: inline-flex;
            padding: 4px 12px;
            background: var(--accent-soft);
            color: var(--tag-text);
            border-radius: 100px;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            width: fit-content;
        }

        .featured-title {
            font-size: 2rem;
            line-height: 1.18;
            color: var(--ink-900);
            letter-spacing: -0.02em;
        }

        .featured-excerpt {
            font-size: 0.95rem;
            line-height: 1.75;
            color: var(--ink-500);
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .featured-meta {
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 0.8rem;
            color: var(--ink-300);
        }

        .meta-dot {
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background: var(--border);
        }

        .meta-author { color: var(--ink-700); font-weight: 500; }

        .read-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: var(--accent);
            color: #fff;
            border-radius: var(--radius-sm);
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.02em;
            width: fit-content;
            transition: background 0.22s ease, transform 0.22s ease, box-shadow 0.22s ease;
            box-shadow: 0 2px 10px rgba(74, 105, 189, 0.25);
        }

        .read-btn:hover {
            background: #3857a8;
            transform: translateX(2px);
            box-shadow: 0 4px 18px rgba(74, 105, 189, 0.35);
        }

        .read-btn svg { transition: transform 0.22s ease; }
        .read-btn:hover svg { transform: translateX(3px); }

        /* ─── Grid Section ───────────────────────────────────────── */
        .grid-section {
            padding: 8px 0 72px;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 32px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-soft);
        }

        .section-title {
            font-size: 1.4rem;
            letter-spacing: -0.02em;
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        /* ─── Post Card ──────────────────────────────────────────── */
        .post-card {
            background: var(--surface);
            border-radius: var(--radius-card);
            border: 1px solid var(--border);
            overflow: hidden;
            box-shadow: var(--shadow-card);
            display: flex;
            flex-direction: column;
            transition: box-shadow 0.35s ease, transform 0.35s ease;
        }

        .post-card:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-5px);
        }

        .card-image-wrap {
            overflow: hidden;
            height: 200px;
            position: relative;
        }

        .card-image-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.55s ease;
        }

        .post-card:hover .card-image-wrap img {
            transform: scale(1.06);
        }

        .card-image-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--accent-soft) 0%, #dde6f7 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-image-placeholder svg {
            opacity: 0.25;
            color: var(--accent);
        }

        .card-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            flex: 1;
        }

        .card-category {
            display: inline-flex;
            padding: 3px 10px;
            background: var(--tag-bg);
            color: var(--tag-text);
            border-radius: 100px;
            font-size: 0.68rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            width: fit-content;
        }

        .card-title {
            font-size: 1.08rem;
            line-height: 1.35;
            color: var(--ink-900);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.2s;
        }

        .post-card:hover .card-title {
            color: var(--accent);
        }

        .card-excerpt {
            font-size: 0.85rem;
            line-height: 1.7;
            color: var(--ink-500);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 24px;
            border-top: 1px solid var(--border-soft);
            margin-top: auto;
        }

        .card-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.775rem;
            color: var(--ink-300);
        }

        .card-meta .meta-author { color: var(--ink-700); }

        .card-read-link {
            font-size: 0.775rem;
            font-weight: 600;
            color: var(--accent);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: gap 0.2s;
        }

        .card-read-link:hover { gap: 7px; }

        /* ─── Empty State ────────────────────────────────────────── */
        .empty-state {
            text-align: center;
            padding: 96px 24px;
        }

        .empty-icon {
            width: 72px;
            height: 72px;
            border-radius: 20px;
            background: var(--accent-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
        }

        .empty-state h3 {
            font-size: 1.4rem;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: var(--ink-300);
            font-size: 0.9rem;
        }

        /* ─── Footer ─────────────────────────────────────────────── */
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

        /* ─── Responsive ─────────────────────────────────────────── */
        @media (max-width: 1024px) {
            .posts-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 768px) {
            .featured-card { grid-template-columns: 1fr; }
            .featured-image-wrap { height: 260px; }
            .featured-content { padding: 28px 28px; }
            .featured-title { font-size: 1.5rem; }
            .navbar-tagline { display: none; }
            .posts-grid { grid-template-columns: 1fr; }
            .section-header { flex-direction: column; align-items: flex-start; gap: 12px; }
            .footer-inner { flex-direction: column; gap: 8px; text-align: center; }
        }

        @media (max-width: 480px) {
            .container { padding: 0 16px; }
            .featured-content { padding: 24px 20px; }
        }
    </style>
</head>
<body>

    {{-- ═══════════════════════════════════════════════ HEADER ══ --}}
    <header class="site-header">
        <div class="container">
            <nav class="navbar">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <div class="brand-icon">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                    </div>
                    <span class="brand-name">Portal Berita</span>
                </a>
                <span class="navbar-tagline">Terpercaya &middot; Terkini &middot; Terdepan</span>
            </nav>
        </div>
    </header>

    {{-- ═══════════════════════════════════════════════ MAIN ═══ --}}
    <main>
        <div class="container">

            @if($posts->count() > 0)

                {{-- ──────────────── FEATURED POST ──────────────── --}}
                <section class="featured-section">
                    <div style="margin-bottom: 20px;">
                        <span class="section-label">Berita Utama</span>
                    </div>

                    @php $featured = $posts->first(); @endphp

                    <a href="{{ route('posts.show_public', $featured->slug) }}" class="featured-card" style="display:grid;">
                        <div class="featured-image-wrap">
                            @if($featured->image)
                                <img src="{{ asset('storage/' . $featured->image) }}" alt="{{ $featured->title }}" loading="eager" />
                            @else
                                <div class="card-image-placeholder" style="height:100%;">
                                    <svg width="56" height="56" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3 21h18M3 7.5h18M3 3.75h18"/>
                                    </svg>
                                </div>
                            @endif
                            <div class="featured-image-overlay"></div>
                        </div>

                        <div class="featured-content">
                            @if($featured->category)
                                <span class="featured-category">{{ $featured->category->name }}</span>
                            @endif

                            <h2 class="featured-title">{{ $featured->title }}</h2>

                            <p class="featured-excerpt">
                                {{ Str::limit(strip_tags($featured->body), 160) }}
                            </p>

                            <div class="featured-meta">
                                @if($featured->user)
                                    <span class="meta-author">{{ $featured->user->name }}</span>
                                    <span class="meta-dot"></span>
                                @endif
                                <span>{{ $featured->created_at->diffForHumans() }}</span>
                            </div>

                            <span class="read-btn">
                                Baca Selengkapnya
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                                </svg>
                            </span>
                        </div>
                    </a>
                </section>

                {{-- ──────────────── POSTS GRID ─────────────────── --}}
                @if($posts->count() > 1)
                <section class="grid-section">
                    <div class="section-header">
                        <h3 class="section-title">Berita Terbaru</h3>
                        <span class="section-label">{{ $posts->count() - 1 }} artikel lainnya</span>
                    </div>

                    <div class="posts-grid">
                        @foreach($posts->skip(1) as $post)
                        <article class="post-card">
                            <a href="{{ route('posts.show_public', $post->slug) }}">
                                <div class="card-image-wrap">
                                    @if($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" loading="lazy" />
                                    @else
                                        <div class="card-image-placeholder">
                                            <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            </a>

                            <div class="card-body">
                                @if($post->category)
                                    <span class="card-category">{{ $post->category->name }}</span>
                                @endif

                                <h3 class="card-title">
                                    <a href="{{ route('posts.show_public', $post->slug) }}">{{ $post->title }}</a>
                                </h3>

                                @if($post->body)
                                    <p class="card-excerpt">{{ Str::limit(strip_tags($post->body), 100) }}</p>
                                @endif
                            </div>

                            <div class="card-footer">
                                <div class="card-meta">
                                    @if($post->user)
                                        <span class="meta-author">{{ $post->user->name }}</span>
                                        <span class="meta-dot"></span>
                                    @endif
                                    <span>{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                                <a href="{{ route('posts.show_public', $post->slug) }}" class="card-read-link">
                                    Baca
                                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </section>
                @endif

            @else
                {{-- ──────────────── EMPTY STATE ────────────────── --}}
                <div class="empty-state">
                    <div class="empty-icon">
                        <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="#4a69bd" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                        </svg>
                    </div>
                    <h3>Belum Ada Berita</h3>
                    <p>Belum ada artikel yang diterbitkan. Kunjungi kembali nanti.</p>
                </div>
            @endif

        </div>
    </main>

    {{-- ═══════════════════════════════════════════════ FOOTER ══ --}}
    <footer class="site-footer">
        <div class="container">
            <div class="footer-inner">
                <span class="footer-copy">&copy; {{ date('Y') }} Portal Berita. Semua hak dilindungi.</span>
                <span class="footer-brand">Portal Berita</span>
            </div>
        </div>
    </footer>

</body>
</html>