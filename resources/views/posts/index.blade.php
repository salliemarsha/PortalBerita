<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Berita — Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=DM+Serif+Display&display=swap"
        rel="stylesheet" />
    <style>
        /* ════════════════════════════════════════════════════════════
           DESIGN TOKENS  (identik dengan dashboard)
        ════════════════════════════════════════════════════════════ */
        :root {
            --bg: #f4f6fa;
            --surface: #ffffff;
            --surface-2: #f9fafc;
            --border: #e8eaf2;
            --border-soft: #f0f2f8;

            --ink-900: #1a1f36;
            --ink-700: #3d4461;
            --ink-500: #6b7299;
            --ink-300: #a0a8c3;
            --ink-100: #e8eaf2;

            --accent: #4f46e5;
            --accent-hover: #4338ca;
            --accent-light: #eef2ff;
            --accent-mid: #818cf8;
            --accent-glow: rgba(79, 70, 229, 0.15);

            --sidebar-bg: #1e2140;
            --sidebar-w: 260px;
            --sidebar-ink: #a0a8c3;
            --sidebar-ink-h: #ffffff;
            --sidebar-hover: rgba(255, 255, 255, 0.06);
            --sidebar-active: rgba(79, 70, 229, 0.18);

            --topbar-h: 64px;
            --radius-lg: 16px;
            --radius-md: 12px;
            --radius-sm: 8px;
            --radius-xs: 6px;

            --shadow-sm: 0 1px 4px rgba(26, 31, 54, 0.06);
            --shadow-md: 0 4px 20px rgba(26, 31, 54, 0.08);

            /* Table */
            --table-row-hover: #f5f7ff;
            --table-head-bg: #f9fafc;
        }

        /* ════════════════════════════════════════════════════════════
           RESET & BASE
        ════════════════════════════════════════════════════════════ */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            height: 100%;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--ink-700);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
            display: flex;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font-family: inherit;
            cursor: pointer;
            border: none;
            background: none;
        }

        /* ════════════════════════════════════════════════════════════
           SIDEBAR  (identical structure to dashboard)
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
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        .sidebar::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 80% 20%, rgba(79, 70, 229, 0.12) 0%, transparent 50%),
                radial-gradient(circle at 20% 80%, rgba(129, 140, 248, 0.07) 0%, transparent 50%);
            pointer-events: none;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 24px;
            height: var(--topbar-h);
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
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
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.4);
            flex-shrink: 0;
        }

        .brand-logo svg {
            color: #fff;
        }

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
            color: rgba(160, 168, 195, 0.7);
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

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
            color: rgba(160, 168, 195, 0.45);
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
        .nav-link.active .nav-icon {
            opacity: 1;
        }

        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
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
            color: rgba(160, 168, 195, 0.7);
            transition: background 0.18s, color 0.18s;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.12);
            color: #fca5a5;
        }

        /* ════════════════════════════════════════════════════════════
           MAIN
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

        .page-breadcrumb span:last-child {
            color: var(--ink-700);
            font-weight: 500;
        }

        .breadcrumb-sep {
            font-size: 0.7rem;
        }

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

        .topbar-user:hover {
            border-color: var(--accent-mid);
            background: var(--accent-light);
        }

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
           PAGE HEADER
        ════════════════════════════════════════════════════════════ */
        .page-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .page-header-left {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .page-title {
            font-family: 'DM Serif Display', serif;
            font-size: 1.6rem;
            color: var(--ink-900);
            letter-spacing: -0.02em;
        }

        .page-subtitle {
            font-size: 0.82rem;
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
            font-family: 'Plus Jakarta Sans', sans-serif;
            border: none;
        }

        .btn-primary {
            background: var(--accent);
            color: #fff;
            box-shadow: 0 2px 8px rgba(79, 70, 229, 0.3);
        }

        .btn-primary:hover {
            background: var(--accent-hover);
            box-shadow: 0 4px 16px rgba(79, 70, 229, 0.4);
            transform: translateY(-1px);
        }

        .btn-ghost {
            background: var(--surface);
            color: var(--ink-500);
            border: 1px solid var(--border);
        }

        .btn-ghost:hover {
            background: var(--bg);
            border-color: var(--accent-mid);
            color: var(--accent);
        }

        .btn-icon-edit {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 12px;
            border-radius: var(--radius-xs);
            font-size: 0.76rem;
            font-weight: 600;
            background: var(--accent-light);
            color: var(--accent);
            border: 1px solid #c7d2fe;
            transition: all 0.18s ease;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-icon-edit:hover {
            background: var(--accent);
            color: #fff;
            border-color: var(--accent);
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(79, 70, 229, 0.25);
        }

        .btn-icon-delete {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 12px;
            border-radius: var(--radius-xs);
            font-size: 0.76rem;
            font-weight: 600;
            background: #fff5f5;
            color: #e53e3e;
            border: 1px solid #fed7d7;
            transition: all 0.18s ease;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-icon-delete:hover {
            background: #e53e3e;
            color: #fff;
            border-color: #e53e3e;
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(229, 62, 62, 0.25);
        }

        /* ════════════════════════════════════════════════════════════
           FLASH MESSAGE
        ════════════════════════════════════════════════════════════ */
        .flash-success {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 18px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-left: 4px solid #22c55e;
            border-radius: var(--radius-md);
            margin-bottom: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            color: #166534;
            animation: slideDown 0.3s ease;
        }

        .flash-icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #22c55e;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .flash-icon svg {
            color: #fff;
        }

        .flash-close {
            margin-left: auto;
            color: #166534;
            opacity: 0.5;
            transition: opacity 0.2s;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
        }

        .flash-close:hover {
            opacity: 1;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ════════════════════════════════════════════════════════════
           TABLE CARD
        ════════════════════════════════════════════════════════════ */
        .table-card {
            background: var(--surface);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            animation: fadeUp 0.35s ease both;
        }

        .table-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 24px;
            border-bottom: 1px solid var(--border);
            flex-wrap: wrap;
            gap: 12px;
        }

        .table-card-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.88rem;
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

        .table-count-badge {
            display: inline-flex;
            padding: 2px 10px;
            background: var(--accent-light);
            color: var(--accent);
            border-radius: 100px;
            font-size: 0.72rem;
            font-weight: 700;
        }

        /* ── Scroll Wrapper ── */
        .table-scroll {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        /* ── Table ── */
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        thead tr {
            background: var(--table-head-bg);
        }

        thead th {
            padding: 12px 20px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--ink-300);
            text-align: left;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        thead th:last-child {
            text-align: right;
        }

        tbody tr {
            border-bottom: 1px solid var(--border-soft);
            transition: background 0.15s ease;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        tbody tr:hover {
            background: var(--table-row-hover);
        }

        tbody td {
            padding: 14px 20px;
            vertical-align: middle;
        }

        /* ── Post Cell (thumbnail + title + author) ── */
        .post-cell {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .post-thumb {
            width: 52px;
            height: 40px;
            border-radius: 8px;
            object-fit: cover;
            border: 1px solid var(--border);
            flex-shrink: 0;
            background: var(--bg);
        }

        .post-thumb-placeholder {
            width: 52px;
            height: 40px;
            border-radius: 8px;
            background: var(--accent-light);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border: 1px solid #c7d2fe;
        }

        .post-thumb-placeholder svg {
            color: var(--accent-mid);
            opacity: 0.6;
        }

        .post-info {
            display: flex;
            flex-direction: column;
            gap: 3px;
            min-width: 0;
        }

        .post-title-link {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--ink-900);
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.18s;
        }

        .post-title-link:hover {
            color: var(--accent);
        }

        .post-author {
            font-size: 0.73rem;
            color: var(--ink-300);
        }

        /* ── Category Badge ── */
        .category-badge {
            display: inline-flex;
            padding: 3px 10px;
            border-radius: 100px;
            font-size: 0.70rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            background: var(--accent-light);
            color: var(--accent);
            border: 1px solid #c7d2fe;
            white-space: nowrap;
        }

        /* ── Date Cell ── */
        .date-cell {
            font-size: 0.78rem;
            color: var(--ink-500);
            white-space: nowrap;
        }

        /* ── Action Cell ── */
        .action-cell {
            display: flex;
            align-items: center;
            gap: 8px;
            justify-content: flex-end;
        }

        /* ── Empty State ── */
        .empty-state {
            text-align: center;
            padding: 72px 32px;
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            border-radius: 18px;
            background: var(--accent-light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .empty-state h3 {
            font-family: 'DM Serif Display', serif;
            font-size: 1.2rem;
            color: var(--ink-900);
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 0.83rem;
            color: var(--ink-300);
            margin-bottom: 20px;
        }

        /* ── Pagination area ── */
        .table-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .table-footer-info {
            font-size: 0.78rem;
            color: var(--ink-300);
        }

        /* ════════════════════════════════════════════════════════════
           PAGE FOOTER
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
            background: rgba(26, 31, 54, 0.5);
            z-index: 190;
            backdrop-filter: blur(2px);
        }

        /* ════════════════════════════════════════════════════════════
           RESPONSIVE
        ════════════════════════════════════════════════════════════ */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(calc(-1 * var(--sidebar-w)));
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .sidebar-overlay.active {
                display: block;
            }

            .main-wrap {
                margin-left: 0;
            }

            .mobile-menu-btn {
                display: flex;
            }

            .topbar {
                padding: 0 20px;
            }

            .page-content {
                padding: 20px;
            }

            .page-footer {
                flex-direction: column;
                gap: 4px;
                text-align: center;
            }

            .table-card-header {
                padding: 14px 16px;
            }
        }

        @media (max-width: 480px) {
            .page-content {
                padding: 16px;
            }

            .topbar {
                padding: 0 16px;
            }

            .user-name {
                display: none;
            }

            .page-header {
                flex-direction: column;
            }
        }

        /* ════════════════════════════════════════════════════════════
           ANIMATION
        ════════════════════════════════════════════════════════════ */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(14px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    {{-- ═══════════════════════════════════════════════ SIDEBAR ═══════════════ --}}
    <aside class="sidebar" id="sidebar">
        {{-- Brand --}}
        <div class="sidebar-brand">
            <div class="brand-logo">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
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
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>

            <span class="nav-section-label">Kelola Konten</span>

            <a href="{{ route('posts.index') }}" class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}">
                <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Kelola Berita
            </a>

            <a href="{{ route('categories.index') }}"
                class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                Kategori
            </a>

            <span class="nav-section-label">Akun</span>

            <a href="{{ route('profile.edit') }}"
                class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Pengaturan Profil
            </a>
        </nav>

        {{-- Logout --}}
        <div class="sidebar-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
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
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="page-breadcrumb">
                    <span>Admin</span>
                    <span class="breadcrumb-sep">›</span>
                    <span>Kelola Berita</span>
                </div>
            </div>

            <div class="topbar-right">
                <a href="{{ route('posts.create') }}" class="btn btn-primary">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Berita
                </a>

                <a href="{{ auth()->check() ? route('profile.edit') : '#' }}" class="topbar-user">
                    <div class="user-avatar">
                        @auth
                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                        @else
                            GU
                        @endauth
                    </div>
                    <span class="user-name">
                        @auth
                            {{ auth()->user()->name }}
                        @else
                            Guest
                        @endauth
                    </span>
                </a>
        </header>

        {{-- ── Page Content ── --}}
        <main class="page-content">

            {{-- ── Page Header ── --}}
            <div class="page-header">
                <div class="page-header-left">
                    <h1 class="page-title">Daftar Berita</h1>
                    <p class="page-subtitle">Kelola semua artikel dan konten yang dipublikasikan.</p>
                </div>
                <a href="{{ route('posts.create') }}" class="btn btn-primary">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Berita Baru
                </a>
            </div>

            {{-- ── Flash Message ── --}}
            @if(session('success'))
                <div class="flash-success" id="flashMsg">
                    <div class="flash-icon">
                        <svg width="11" height="11" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <span>{{ session('success') }}</span>
                    <button class="flash-close" onclick="document.getElementById('flashMsg').remove()" aria-label="Tutup">
                        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endif

            {{-- ── Table Card ── --}}
            <div class="table-card">
                <div class="table-card-header">
                    <div class="table-card-title">
                        <div class="title-icon">
                            <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        Semua Artikel
                        <span class="table-count-badge">{{ $posts->total() ?? $posts->count() }} berita</span>
                    </div>
                </div>

                <div class="table-scroll">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 40%;">Judul Berita</th>
                                <th>Kategori</th>
                                <th>Tanggal Rilis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                                <tr>
                                    {{-- Thumbnail + Judul + Penulis --}}
                                    <td>
                                        <div class="post-cell">
                                            @if($post->image)
                                                <img class="post-thumb" src="{{ asset('storage/' . $post->image) }}"
                                                    alt="{{ $post->title }}" loading="lazy" />
                                            @else
                                                <div class="post-thumb-placeholder">
                                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909" />
                                                    </svg>
                                                </div>
                                            @endif
                                            <div class="post-info">
                                                <a href="{{ route('posts.show_public', $post->slug) }}" target="_blank"
                                                    class="post-title-link">{{ $post->title }}</a>
                                                @if($post->user)
                                                    <span class="post-author">oleh {{ $post->user->name }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Kategori --}}
                                    <td>
                                        @if($post->category)
                                            <span class="category-badge">{{ $post->category->name }}</span>
                                        @else
                                            <span style="font-size:0.75rem; color:var(--ink-300);">—</span>
                                        @endif
                                    </td>

                                    {{-- Tanggal --}}
                                    <td>
                                        <span class="date-cell">{{ $post->created_at->translatedFormat('d M Y') }}</span>
                                    </td>

                                    {{-- Aksi --}}
                                    <td>
                                        <div class="action-cell">
                                            {{-- Edit --}}
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn-icon-edit">
                                                <svg width="12" height="12" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus berita ini? Tindakan ini tidak dapat dibatalkan.')"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-icon-delete">
                                                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor" stroke-width="2.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="empty-state">
                                            <div class="empty-icon">
                                                <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="#818cf8"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                            <h3>Belum Ada Berita</h3>
                                            <p>Mulai dengan membuat artikel pertama Anda.</p>
                                            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                                                <svg width="13" height="13" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4v16m8-8H4" />
                                                </svg>
                                                Buat Berita Pertama
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if($posts->hasPages())
                    <div class="table-footer">
                        <span class="table-footer-info">
                            Menampilkan {{ $posts->firstItem() }}–{{ $posts->lastItem() }} dari {{ $posts->total() }} berita
                        </span>
                        <div>
                            {{ $posts->links() }}
                        </div>
                    </div>
                @endif
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

        // Auto-dismiss flash message setelah 5 detik
        setTimeout(() => {
            const flash = document.getElementById('flashMsg');
            if (flash) {
                flash.style.transition = 'opacity 0.4s ease';
                flash.style.opacity = '0';
                setTimeout(() => flash.remove(), 400);
            }
        }, 5000);
    </script>
</body>

</html>