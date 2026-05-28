<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $post->title }} — Portal Berita</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&family=Lora:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet" />
    <style>
        /* ─── Design Tokens ──────────────────────────────────────── */
        :root {
            --bg:           #f8f9fb;
            --surface:      #ffffff;
            --border:       #e4e8ef;
            --border-soft:  #eef0f5;

            --ink-900:      #1e2535;
            --ink-700:      #3d4a63;
            --ink-500:      #6b7794;
            --ink-300:      #9aa3b8;

            --accent:       #4a69bd;
            --accent-soft:  #eef1fa;
            --accent-mid:   #7b96d4;

            --tag-bg:       #eef1fa;
            --tag-text:     #3d5a9e;

            --article-max:  720px;
        }

        /* ─── Base ───────────────────────────────────────────────── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--bg);
            color: var(--ink-700);
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4 { font-family: 'DM Serif Display', serif; color: var(--ink-900); line-height: 1.2; }
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

        /* ─── Back Button ────────────────────────────────────────── */
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

        .back-btn svg { transition: transform 0.2s ease; }
        .back-btn:hover svg { transform: translateX(-3px); }

        /* ─── Article Wrapper ────────────────────────────────────── */
        .article-wrapper {
            padding: 48px 0 80px;
        }

        .article-inner {
            max-width: var(--article-max);
            margin: 0 auto;
        }

        /* ─── Article Header ─────────────────────────────────────── */
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

        /* ─── Author Bar ─────────────────────────────────────────── */
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

        .author-avatar svg { color: var(--accent); }

        .author-info { display: flex; flex-direction: column; gap: 2px; }

        .author-name {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--ink-900);
        }

        .author-date {
            font-size: 0.78rem;
            color: var(--ink-300);
        }

        /* ─── Divider ────────────────────────────────────────────── */
        .article-divider {
            height: 1px;
            background: var(--border);
            margin: 36px 0;
        }

        /* ─── Hero Image ─────────────────────────────────────────── */
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
            background: linear-gradient(to bottom, transparent 60%, rgba(30,37,53,0.06));
            pointer-events: none;
        }

        /* ─── Article Body Typography ────────────────────────────── */
        .article-body {
            font-family: 'Lora', Georgia, serif;
            font-size: 1.075rem;
            line-height: 1.85;
            color: var(--ink-700);
        }

        .article-body p {
            margin-bottom: 1.6em;
        }

        .article-body p:last-child { margin-bottom: 0; }

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

        .article-body strong { color: var(--ink-900); font-weight: 600; }

        .article-body blockquote {
            border-left: 3px solid var(--accent);
            padding: 12px 0 12px 24px;
            margin: 1.8em 0;
            color: var(--ink-500);
            font-style: italic;
        }

        /* Jika isi body adalah plain text, bukan HTML */
        .article-body-plain {
            font-family: 'Lora', Georgia, serif;
            font-size: 1.075rem;
            line-height: 1.85;
            color: var(--ink-700);
            white-space: pre-wrap;
            word-break: break-word;
        }

        /* ─── Article Footer ─────────────────────────────────────── */
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

        /* ─── Progress Bar ───────────────────────────────────────── */
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

        /* ─── Site Footer ────────────────────────────────────────── */
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
        @media (max-width: 768px) {
            .article-title { font-size: 1.7rem; }
            .article-body, .article-body-plain { font-size: 1rem; }
            .article-nav { flex-direction: column; align-items: flex-start; gap: 12px; }
            .footer-inner { flex-direction: column; gap: 8px; text-align: center; }
        }

        @media (max-width: 480px) {
            .container { padding: 0 16px; }
            .article-wrapper { padding: 32px 0 60px; }
            .article-title { font-size: 1.5rem; }
            .author-bar { padding: 14px 16px; }
        }
    </style>
</head>
<body>

    {{-- ═══════════════════════════════════════════════ PROGRESS ═══ --}}
    <div class="reading-progress" id="readingProgress"></div>

    {{-- ═══════════════════════════════════════════════ HEADER ═════ --}}
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
            </nav>
        </div>
    </header>

    {{-- ═══════════════════════════════════════════════ ARTICLE ════ --}}
    <main class="article-wrapper">
        <div class="container">
            <div class="article-inner">

                {{-- ── Back + Category Navigation ── --}}
                <div class="article-nav">
                    <a href="{{ route('home') }}" class="back-btn">
                        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                        </svg>
                        Kembali ke Beranda
                    </a>

                    @if($post->category)
                        <span class="article-category">{{ $post->category->name }}</span>
                    @endif
                </div>

                {{-- ── Article Header ── --}}
                <header class="article-header">
                    <h1 class="article-title">{{ $post->title }}</h1>

                    <div class="author-bar">
                        <div class="author-avatar">
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
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

                {{-- ── Hero Image ── --}}
                @if($post->image)
                    <figure class="article-hero">
                        <img
                            src="{{ asset('storage/' . $post->image) }}"
                            alt="{{ $post->title }}"
                            loading="eager"
                        />
                        <div class="article-hero-overlay"></div>
                    </figure>
                @else
                    <div class="article-divider"></div>
                @endif

                {{-- ── Article Body ── --}}
                {{-- Gunakan salah satu: --}}
                {{-- Jika $post->body sudah berupa HTML dari rich editor: --}}
                <div class="article-body">
                    {!! $post->body !!}
                </div>

                {{-- Jika $post->body adalah plain text biasa, uncomment baris di bawah --}}
                {{-- dan hapus blok .article-body di atas --}}
                {{--
                <div class="article-body-plain">{{ $post->body }}</div>
                --}}

                {{-- ── Article Footer ── --}}
                <footer class="article-footer">
                    <span class="article-footer-label">
                        Terima kasih telah membaca artikel ini.
                    </span>
                    <a href="{{ route('home') }}" class="back-btn">
                        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                        </svg>
                        Berita lainnya
                    </a>
                </footer>

            </div>
        </div>
    </main>

    {{-- ═══════════════════════════════════════════════ FOOTER ═════ --}}
    <footer class="site-footer">
        <div class="container">
            <div class="footer-inner">
                <span class="footer-copy">&copy; {{ date('Y') }} Portal Berita. Semua hak dilindungi.</span>
                <span class="footer-brand">Portal Berita</span>
            </div>
        </div>
    </footer>

    {{-- ═══════════════════════════════════════════════ JS ══════── --}}
    <script>
        // Reading progress bar
        const bar = document.getElementById('readingProgress');
        window.addEventListener('scroll', () => {
            const doc  = document.documentElement;
            const body = document.body;
            const scrollTop  = doc.scrollTop  || body.scrollTop;
            const scrollHeight = (doc.scrollHeight || body.scrollHeight) - doc.clientHeight;
            const progress = scrollHeight > 0 ? (scrollTop / scrollHeight) * 100 : 0;
            bar.style.width = Math.min(progress, 100) + '%';
        }, { passive: true });
    </script>

</body>
</html>