<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard — Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=DM+Serif+Display&display=swap" rel="stylesheet" />
    <style>
        /* ════════════════════════════════════════════════════════════
           DESIGN TOKENS
        ════════════════════════════════════════════════════════════ */
        :root {
            /* Core palette */
            --bg:            #f4f6fa;
            --surface:       #ffffff;
            --surface-2:     #f9fafc;
            --border:        #e8eaf2;
            --border-soft:   #f0f2f8;

            /* Ink */
            --ink-900:       #1a1f36;
            --ink-700:       #3d4461;
            --ink-500:       #6b7299;
            --ink-300:       #a0a8c3;
            --ink-100:       #e8eaf2;

            /* Accent — Indigo */
            --accent:        #4f46e5;
            --accent-hover:  #4338ca;
            --accent-light:  #eef2ff;
            --accent-mid:    #818cf8;
            --accent-glow:   rgba(79,70,229,0.15);

            /* Sidebar */
            --sidebar-bg:    #1e2140;
            --sidebar-w:     260px;
            --sidebar-ink:   #a0a8c3;
            --sidebar-ink-h: #ffffff;
            --sidebar-hover: rgba(255,255,255,0.06);
            --sidebar-active:rgba(79,70,229,0.18);

            /* Topbar */
            --topbar-h:      64px;

            /* Cards */
            --radius-lg:     16px;
            --radius-md:     12px;
            --radius-sm:     8px;
            --radius-xs:     6px;

            --shadow-sm:     0 1px 4px rgba(26,31,54,0.06);
            --shadow-md:     0 4px 20px rgba(26,31,54,0.08);
            --shadow-lg:     0 8px 40px rgba(79,70,229,0.12);
        }

        /* ════════════════════════════════════════════════════════════
           RESET & BASE
        ════════════════════════════════════════════════════════════ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { height: 100%; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--ink-700);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
            display: flex;
        }

        a { text-decoration: none; color: inherit; }
        button { font-family: inherit; cursor: pointer; border: none; background: none; }

        /* ════════════════════════════════════════════════════════════
           SIDEBAR
        ════════════════════════════════════════════════════════════ */
        .sidebar {
            width: var(--sidebar-w);
            min-height: 100vh;
            background: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 200;
            transition: transform 0.3s cubic-bezier(0.4,0,0.2,1);
            overflow: hidden;
        }

        /* Subtle grid texture on sidebar */
        .sidebar::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 80% 20%, rgba(79,70,229,0.12) 0%, transparent 50%),
                radial-gradient(circle at 20% 80%, rgba(129,140,248,0.07) 0%, transparent 50%);
            pointer-events: none;
        }

        /* ── Brand ── */
        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 24px;
            height: var(--topbar-h);
            border-bottom: 1px solid rgba(255,255,255,0.06);
            flex-shrink: 0;
            position: relative;
        }

        .brand-logo {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(79,70,229,0.4);
            flex-shrink: 0;
        }

        .brand-logo svg { color: #fff; }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-name {
            font-size: 0.95rem;
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.01em;
            line-height: 1.2;
        }

        .brand-sub {
            font-size: 0.68rem;
            color: rgba(160,168,195,0.7);
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        /* ── Nav ── */
        .sidebar-nav {
            flex: 1;
            padding: 20px 0;
            overflow-y: auto;
            position: relative;
        }

        .nav-section-label {
            font-size: 0.63rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: rgba(160,168,195,0.45);
            padding: 16px 24px 8px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 20px;
            margin: 2px 12px;
            border-radius: var(--radius-sm);
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--sidebar-ink);
            transition: background 0.18s ease, color 0.18s ease, transform 0.18s ease;
            position: relative;
        }

        .nav-link:hover {
            background: var(--sidebar-hover);
            color: var(--sidebar-ink-h);
            transform: translateX(2px);
        }

        .nav-link.active {
            background: var(--sidebar-active);
            color: #c7d2fe;
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            left: -12px;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 20px;
            background: var(--accent-mid);
            border-radius: 0 3px 3px 0;
        }

        .nav-link .nav-icon {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            opacity: 0.75;
            transition: opacity 0.18s;
        }

        .nav-link:hover .nav-icon,
        .nav-link.active .nav-icon { opacity: 1; }

        /* ── Sidebar Footer ── */
        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid rgba(255,255,255,0.06);
            flex-shrink: 0;
            position: relative;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 10px 20px;
            border-radius: var(--radius-sm);
            font-size: 0.85rem;
            font-weight: 500;
            color: rgba(160,168,195,0.7);
            transition: background 0.18s, color 0.18s;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: rgba(239,68,68,0.12);
            color: #fca5a5;
        }

        /* ════════════════════════════════════════════════════════════
           MAIN CONTENT
        ════════════════════════════════════════════════════════════ */
        .main-wrap {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ── Topbar ── */
        .topbar {
            height: var(--topbar-h);
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .mobile-menu-btn {
            display: none;
            width: 36px;
            height: 36px;
            border-radius: var(--radius-xs);
            background: var(--bg);
            border: 1px solid var(--border);
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--ink-700);
        }

        .page-breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.82rem;
            color: var(--ink-300);
        }

        .page-breadcrumb span:last-child { color: var(--ink-700); font-weight: 500; }
        .breadcrumb-sep { font-size: 0.7rem; }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 12px 6px 6px;
            border-radius: 100px;
            border: 1px solid var(--border);
            background: var(--surface-2);
            transition: border-color 0.2s, background 0.2s;
        }

        .topbar-user:hover { border-color: var(--accent-mid); background: var(--accent-light); }

        .user-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-mid) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.72rem;
            font-weight: 700;
            color: #fff;
            flex-shrink: 0;
        }

        .user-name {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--ink-900);
            max-width: 120px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ── Page Content ── */
        .page-content {
            flex: 1;
            padding: 32px;
        }

        /* ════════════════════════════════════════════════════════════
           WELCOME BANNER
        ════════════════════════════════════════════════════════════ */
        .welcome-banner {
            background: var(--sidebar-bg);
            border-radius: var(--radius-lg);
            padding: 32px 36px;
            margin-bottom: 28px;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .welcome-banner::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at 90% 50%, rgba(79,70,229,0.25) 0%, transparent 60%),
                radial-gradient(ellipse at 10% 100%, rgba(129,140,248,0.12) 0%, transparent 50%);
            pointer-events: none;
        }

        /* Decorative circles */
        .welcome-banner::after {
            content: '';
            position: absolute;
            right: -40px;
            top: -40px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.05);
        }

        .banner-deco-ring {
            position: absolute;
            right: 60px;
            top: -80px;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            border: 1px solid rgba(129,140,248,0.1);
            pointer-events: none;
        }

        .welcome-content { position: relative; }

        .welcome-eyebrow {
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--accent-mid);
            margin-bottom: 10px;
        }

        .welcome-title {
            font-family: 'DM Serif Display', serif;
            font-size: 1.75rem;
            color: #fff;
            letter-spacing: -0.02em;
            margin-bottom: 8px;
        }

        .welcome-sub {
            font-size: 0.85rem;
            color: rgba(160,168,195,0.75);
            line-height: 1.6;
        }

        /* ════════════════════════════════════════════════════════════
           STATS CARDS
        ════════════════════════════════════════════════════════════ */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: var(--surface);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            padding: 24px 24px 22px;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            position: relative;
            overflow: hidden;
            transition: box-shadow 0.25s ease, transform 0.25s ease, border-color 0.25s ease;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            border-radius: var(--radius-lg) var(--radius-lg) 0 0;
            opacity: 0;
            transition: opacity 0.25s;
        }

        .stat-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
            border-color: transparent;
        }

        .stat-card:hover::after { opacity: 1; }

        /* Card color accents */
        .stat-card.card-blue::after  { background: linear-gradient(90deg, #4f46e5, #818cf8); }
        .stat-card.card-teal::after  { background: linear-gradient(90deg, #0d9488, #2dd4bf); }
        .stat-card.card-amber::after { background: linear-gradient(90deg, #d97706, #fbbf24); }

        .stat-info { display: flex; flex-direction: column; gap: 6px; }

        .stat-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--ink-300);
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .stat-value {
            font-family: 'DM Serif Display', serif;
            font-size: 2.2rem;
            color: var(--ink-900);
            letter-spacing: -0.03em;
            line-height: 1;
        }

        .stat-hint {
            font-size: 0.75rem;
            color: var(--ink-300);
        }

        .stat-icon-wrap {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .icon-blue  { background: #eef2ff; color: #4f46e5; }
        .icon-teal  { background: #f0fdfa; color: #0d9488; }
        .icon-amber { background: #fffbeb; color: #d97706; }

        /* ════════════════════════════════════════════════════════════
           QUICK ACTIONS
        ════════════════════════════════════════════════════════════ */
        .section-card {
            background: var(--surface);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }

        .section-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-soft);
        }

        .section-card-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.92rem;
            font-weight: 700;
            color: var(--ink-900);
        }

        .title-icon {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            background: var(--accent-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
        }

        .section-card-body { padding: 24px; }

        .quick-actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
        }

        .action-card {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 18px 20px;
            border-radius: var(--radius-md);
            border: 1px solid var(--border);
            background: var(--surface-2);
            transition: all 0.22s ease;
            cursor: pointer;
        }

        .action-card:hover {
            background: var(--accent-light);
            border-color: var(--accent-mid);
            transform: translateY(-2px);
            box-shadow: 0 4px 16px var(--accent-glow);
        }

        .action-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: var(--surface);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: background 0.22s, border-color 0.22s, color 0.22s;
        }

        .action-card:hover .action-icon {
            background: var(--accent);
            border-color: var(--accent);
            color: #fff;
        }

        .action-icon svg { color: var(--accent); transition: color 0.22s; }
        .action-card:hover .action-icon svg { color: #fff; }

        .action-text { display: flex; flex-direction: column; gap: 3px; }

        .action-title {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--ink-900);
        }

        .action-desc {
            font-size: 0.75rem;
            color: var(--ink-300);
        }

        /* ════════════════════════════════════════════════════════════
           BUTTONS
        ════════════════════════════════════════════════════════════ */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 18px;
            border-radius: var(--radius-sm);
            font-size: 0.82rem;
            font-weight: 600;
            letter-spacing: 0.01em;
            transition: all 0.2s ease;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-primary {
            background: var(--accent);
            color: #fff;
            box-shadow: 0 2px 8px rgba(79,70,229,0.3);
        }

        .btn-primary:hover {
            background: var(--accent-hover);
            box-shadow: 0 4px 16px rgba(79,70,229,0.4);
            transform: translateY(-1px);
        }

        .btn-ghost {
            background: transparent;
            color: var(--ink-500);
            border: 1px solid var(--border);
        }

        .btn-ghost:hover {
            background: var(--bg);
            border-color: var(--accent-mid);
            color: var(--accent);
        }

        /* ════════════════════════════════════════════════════════════
           FOOTER
        ════════════════════════════════════════════════════════════ */
        .page-footer {
            padding: 20px 32px;
            border-top: 1px solid var(--border);
            background: var(--surface);
            font-size: 0.77rem;
            color: var(--ink-300);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* ════════════════════════════════════════════════════════════
           MOBILE OVERLAY
        ════════════════════════════════════════════════════════════ */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(26,31,54,0.5);
            z-index: 190;
            backdrop-filter: blur(2px);
        }

        /* ════════════════════════════════════════════════════════════
           RESPONSIVE
        ════════════════════════════════════════════════════════════ */
        @media (max-width: 1024px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(calc(-1 * var(--sidebar-w)));
            }
            .sidebar.open { transform: translateX(0); }
            .sidebar-overlay.active { display: block; }
            .main-wrap { margin-left: 0; }
            .mobile-menu-btn { display: flex; }
            .topbar { padding: 0 20px; }
            .page-content { padding: 20px; }
            .stats-grid { grid-template-columns: 1fr; }
            .welcome-banner { padding: 24px; }
            .welcome-title { font-size: 1.4rem; }
            .page-footer { flex-direction: column; gap: 4px; text-align: center; }
        }

        @media (max-width: 480px) {
            .page-content { padding: 16px; }
            .topbar { padding: 0 16px; }
            .user-name { display: none; }
        }

        /* ════════════════════════════════════════════════════════════
           ANIMATIONS
        ════════════════════════════════════════════════════════════ */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .welcome-banner  { animation: fadeUp 0.4s ease both; }
        .stat-card:nth-child(1) { animation: fadeUp 0.4s 0.08s ease both; }
        .stat-card:nth-child(2) { animation: fadeUp 0.4s 0.16s ease both; }
        .stat-card:nth-child(3) { animation: fadeUp 0.4s 0.24s ease both; }
        .section-card    { animation: fadeUp 0.4s 0.32s ease both; }
    </style>
</head>
<body>

{{-- ═══════════════════════════════════════════════ SIDEBAR ═══════════════ --}}
<aside class="sidebar" id="sidebar">
    {{-- Brand --}}
    <div class="sidebar-brand">
        <div class="brand-logo">
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
            </svg>
        </div>
        <div class="brand-text">
            <span class="brand-name">Portal Berita</span>
            <span class="brand-sub">Admin Panel</span>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="sidebar-nav">
        <span class="nav-section-label">Menu Utama</span>

        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            Dashboard
        </a>

        <span class="nav-section-label">Kelola Konten</span>

        <a href="{{ route('posts.index') }}" class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Kelola Berita
        </a>

        <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
            </svg>
            Kategori
        </a>

        <span class="nav-section-label">Akun</span>

        <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            Pengaturan Profil
        </a>
    </nav>

    {{-- Logout --}}
    <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Keluar dari Akun
            </button>
        </form>
    </div>
</aside>

{{-- Mobile Overlay --}}
<div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

{{-- ═══════════════════════════════════════════════ MAIN WRAP ═════════════ --}}
<div class="main-wrap">

    {{-- ── Topbar ── --}}
    <header class="topbar">
        <div class="topbar-left">
            <button class="mobile-menu-btn" onclick="openSidebar()" aria-label="Buka menu">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <div class="page-breadcrumb">
                <span>Admin</span>
                <span class="breadcrumb-sep">›</span>
                <span>Dashboard</span>
            </div>
        </div>

        <div class="topbar-right">
            <a href="{{ route('home') }}" class="btn btn-ghost" target="_blank" style="font-size:0.78rem; padding:7px 14px;">
                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                Live Site
            </a>

            <a href="{{ route('profile.edit') }}" class="topbar-user">
                <div class="user-avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                </div>
                <span class="user-name">{{ auth()->user()->name }}</span>
            </a>
        </div>
    </header>

    {{-- ── Page Content ── --}}
    <main class="page-content">

        {{-- ── Welcome Banner ── --}}
        <div class="welcome-banner">
            <div class="banner-deco-ring"></div>
            <div class="welcome-content">
                <p class="welcome-eyebrow">✦ Ringkasan Hari Ini</p>
                <h1 class="welcome-title">Selamat Datang Kembali, {{ auth()->user()->name }}!</h1>
                <p class="welcome-sub">Pantau dan kelola semua konten portal berita Anda dari sini.</p>
            </div>
        </div>

        {{-- ── Stats Cards ── --}}
        <div class="stats-grid">

            {{-- Total Berita --}}
            <div class="stat-card card-blue">
                <div class="stat-info">
                    <span class="stat-label">Total Berita</span>
                    <span class="stat-value">{{ \App\Models\Post::count() }}</span>
                    <span class="stat-hint">Artikel dipublikasikan</span>
                </div>
                <div class="stat-icon-wrap icon-blue">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>

            {{-- Total Kategori --}}
            <div class="stat-card card-teal">
                <div class="stat-info">
                    <span class="stat-label">Total Kategori</span>
                    <span class="stat-value">{{ \App\Models\Category::count() }}</span>
                    <span class="stat-hint">Kategori aktif</span>
                </div>
                <div class="stat-icon-wrap icon-teal">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
            </div>

            {{-- Total Komentar --}}
            <div class="stat-card card-amber">
                <div class="stat-info">
                    <span class="stat-label">Total Komentar</span>
                    <span class="stat-value">{{ \App\Models\Comment::count() ?? 0 }}</span>
                    <span class="stat-hint">Komentar masuk</span>
                </div>
                <div class="stat-icon-wrap icon-amber">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                </div>
            </div>

        </div>

        {{-- ── Quick Actions ── --}}
        <div class="section-card">
            <div class="section-card-header">
                <div class="section-card-title">
                    <div class="title-icon">
                        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    Kendali Cepat Administrasi
                </div>
            </div>
            <div class="section-card-body">
                <div class="quick-actions-grid">

                    <a href="{{ route('posts.create') }}" class="action-card">
                        <div class="action-icon">
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <div class="action-text">
                            <span class="action-title">Buat Berita Baru</span>
                            <span class="action-desc">Tulis dan publikasikan artikel</span>
                        </div>
                    </a>

                    <a href="{{ route('posts.index') }}" class="action-card">
                        <div class="action-icon">
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                            </svg>
                        </div>
                        <div class="action-text">
                            <span class="action-title">Kelola Semua Berita</span>
                            <span class="action-desc">Edit, hapus, atau atur konten</span>
                        </div>
                    </a>

                    <a href="{{ route('categories.index') }}" class="action-card">
                        <div class="action-icon">
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <div class="action-text">
                            <span class="action-title">Atur Kategori</span>
                            <span class="action-desc">Tambah atau ubah kategori</span>
                        </div>
                    </a>

                    <a href="{{ route('home') }}" target="_blank" class="action-card">
                        <div class="action-icon">
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9"/>
                            </svg>
                        </div>
                        <div class="action-text">
                            <span class="action-title">Lihat Website Live</span>
                            <span class="action-desc">Buka tampilan publik portal</span>
                        </div>
                    </a>

                </div>
            </div>
        </div>

    </main>

    {{-- ── Footer ── --}}
    <footer class="page-footer">
        <span>&copy; {{ date('Y') }} Portal Berita — Admin Panel</span>
        <span>v1.0.0</span>
    </footer>
</div>

{{-- ═══════════════════════════════════════════════ JS ════════════════════ --}}
<script>
    function openSidebar() {
        document.getElementById('sidebar').classList.add('open');
        document.getElementById('sidebarOverlay').classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    function closeSidebar() {
        document.getElementById('sidebar').classList.remove('open');
        document.getElementById('sidebarOverlay').classList.remove('active');
        document.body.style.overflow = '';
    }
</script>
</body>
</html>