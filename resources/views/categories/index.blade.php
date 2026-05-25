<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Kategori — Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Geist:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <style>
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
            --accent: #4f46e5;
            --accent-h: #4338ca;
            --accent-light: #eef2ff;
            --accent-mid: #818cf8;
            --sidebar-bg: #1e2140;
            --sidebar-w: 260px;
            --sidebar-ink: #a0a8c3;
            --topbar-h: 64px;
            --r: 14px;
            --shadow-sm: 0 1px 4px rgba(26, 31, 54, 0.06);
            --shadow-md: 0 4px 20px rgba(26, 31, 54, 0.08);
            --error: #dc2626;
            --error-soft: #fef2f2;
            --success: #16a34a;
            --success-soft: #f0fdf4;
        }

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
            font-family: 'Geist', sans-serif;
            background: var(--bg);
            color: var(--ink-700);
            min-height: 100vh;
            display: flex;
            -webkit-font-smoothing: antialiased;
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
            background:
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
            font-family: 'Instrument Serif', serif;
            font-size: 1rem;
            color: #fff;
            line-height: 1.2;
        }

        .brand-sub {
            font-size: 0.65rem;
            color: rgba(160, 168, 195, 0.65);
            letter-spacing: 0.07em;
            text-transform: uppercase;
        }

        .sidebar-nav {
            flex: 1;
            padding: 20px 0;
            overflow-y: auto;
            position: relative;
        }

        .nav-label {
            font-size: 0.62rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: rgba(160, 168, 195, 0.4);
            padding: 14px 24px 7px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 10px 20px;
            margin: 2px 12px;
            border-radius: 8px;
            font-size: 0.84rem;
            font-weight: 500;
            color: var(--sidebar-ink);
            transition: background 0.18s, color 0.18s, transform 0.18s;
            position: relative;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.06);
            color: #fff;
            transform: translateX(2px);
        }

        .nav-link.active {
            background: rgba(79, 70, 229, 0.18);
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

        .nav-icon {
            width: 17px;
            height: 17px;
            flex-shrink: 0;
            opacity: 0.75;
            transition: opacity 0.18s;
        }

        .nav-link:hover .nav-icon,
        .nav-link.active .nav-icon {
            opacity: 1;
        }

        .sidebar-footer {
            padding: 14px 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            flex-shrink: 0;
            position: relative;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 11px;
            width: 100%;
            padding: 9px 20px;
            border-radius: 8px;
            font-size: 0.84rem;
            font-weight: 500;
            color: rgba(160, 168, 195, 0.65);
            transition: background 0.18s, color 0.18s;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.12);
            color: #fca5a5;
        }

        .main-wrap {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

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
            gap: 14px;
        }

        .hamburger {
            display: none;
            width: 34px;
            height: 34px;
            border-radius: 7px;
            background: var(--bg);
            border: 1px solid var(--border);
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--ink-700);
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 0.8rem;
            color: var(--ink-300);
        }

        .breadcrumb span:last-child {
            color: var(--ink-700);
            font-weight: 500;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 5px 12px 5px 5px;
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
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-mid) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.68rem;
            font-weight: 700;
            color: #fff;
        }

        .user-name {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--ink-900);
        }

        .page-content {
            flex: 1;
            padding: 32px;
        }

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
            font-family: 'Instrument Serif', serif;
            font-size: 1.55rem;
            color: var(--ink-900);
            letter-spacing: -0.02em;
        }

        .page-sub {
            font-size: 0.81rem;
            color: var(--ink-300);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 18px;
            border-radius: 8px;
            font-family: 'Geist', sans-serif;
            font-size: 0.82rem;
            font-weight: 600;
            transition: all 0.2s ease;
            cursor: pointer;
            border: none;
            white-space: nowrap;
        }

        .btn-primary {
            background: var(--accent);
            color: #fff;
            box-shadow: 0 2px 8px rgba(79, 70, 229, 0.28);
        }

        .btn-primary:hover {
            background: var(--accent-h);
            box-shadow: 0 4px 16px rgba(79, 70, 229, 0.38);
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

        .flash-success {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 13px 16px;
            background: var(--success-soft);
            border: 1px solid #bbf7d0;
            border-left: 4px solid var(--success);
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 0.83rem;
            font-weight: 500;
            color: #166534;
            animation: slideIn 0.3s ease;
        }

        .flash-success svg {
            color: var(--success);
            flex-shrink: 0;
        }

        .flash-close {
            margin-left: auto;
            color: #166534;
            opacity: 0.5;
            transition: opacity 0.2s;
            cursor: pointer;
        }

        .flash-close:hover {
            opacity: 1;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .search-wrap {
            position: relative;
            flex: 1;
            max-width: 320px;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--ink-300);
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            padding: 9px 14px 9px 38px;
            font-family: 'Geist', sans-serif;
            font-size: 0.83rem;
            color: var(--ink-900);
            background: var(--surface);
            border: 1.5px solid var(--border);
            border-radius: 8px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .search-input:focus {
            border-color: var(--accent-mid);
            box-shadow: 0 0 0 3px rgba(129, 140, 248, 0.12);
        }

        .search-input::placeholder {
            color: var(--ink-300);
        }

        .card {
            background: var(--surface);
            border-radius: var(--r);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }

        .card-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 24px;
            border-bottom: 1px solid var(--border);
            flex-wrap: wrap;
            gap: 10px;
        }

        .card-head-title {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 0.87rem;
            font-weight: 700;
            color: var(--ink-900);
        }

        .title-dot {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            background: var(--accent-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
        }

        .count-badge {
            padding: 2px 9px;
            background: var(--accent-light);
            color: var(--accent);
            border-radius: 100px;
            font-size: 0.7rem;
            font-weight: 700;
        }

        .table-scroll {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 580px;
        }

        thead tr {
            background: var(--surface-2);
        }

        thead th {
            padding: 11px 20px;
            font-size: 0.68rem;
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
            transition: background 0.14s;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #f5f7ff;
        }

        tbody td {
            padding: 13px 20px;
            vertical-align: middle;
        }

        .cat-name {
            font-size: 0.86rem;
            font-weight: 600;
            color: var(--ink-900);
        }

        .slug-chip {
            font-size: 0.72rem;
            font-weight: 500;
            color: var(--ink-500);
            background: var(--surface-2);
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 2px 8px;
            font-family: 'Geist', monospace;
        }

        .post-count {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.78rem;
            font-weight: 600;
            color: var(--accent);
            background: var(--accent-light);
            padding: 3px 10px;
            border-radius: 100px;
        }

        .date-cell {
            font-size: 0.77rem;
            color: var(--ink-300);
            white-space: nowrap;
        }

        .action-cell {
            display: flex;
            align-items: center;
            gap: 7px;
            justify-content: flex-end;
        }

        .btn-edit {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 5px 11px;
            border-radius: 6px;
            font-size: 0.74rem;
            font-weight: 600;
            background: var(--accent-light);
            color: var(--accent);
            border: 1px solid #c7d2fe;
            transition: all 0.18s;
            cursor: pointer;
            font-family: 'Geist', sans-serif;
        }

        .btn-edit:hover {
            background: var(--accent);
            color: #fff;
            border-color: var(--accent);
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(79, 70, 229, 0.22);
        }

        .btn-delete {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 5px 11px;
            border-radius: 6px;
            font-size: 0.74rem;
            font-weight: 600;
            background: #fff5f5;
            color: #e53e3e;
            border: 1px solid #fed7d7;
            transition: all 0.18s;
            cursor: pointer;
            font-family: 'Geist', sans-serif;
        }

        .btn-delete:hover {
            background: #e53e3e;
            color: #fff;
            border-color: #e53e3e;
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(229, 62, 62, 0.22);
        }

        .empty-state {
            text-align: center;
            padding: 72px 32px;
        }

        .empty-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            background: var(--accent-light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
        }

        .empty-state h3 {
            font-family: 'Instrument Serif', serif;
            font-size: 1.15rem;
            color: var(--ink-900);
            margin-bottom: 7px;
        }

        .empty-state p {
            font-size: 0.82rem;
            color: var(--ink-300);
            margin-bottom: 18px;
        }

        .card-footer {
            padding: 14px 24px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .pagination-info {
            font-size: 0.77rem;
            color: var(--ink-300);
        }

        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(26, 31, 54, 0.45);
            backdrop-filter: blur(4px);
            z-index: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.25s;
        }

        .modal-overlay.open {
            opacity: 1;
            pointer-events: auto;
        }

        .modal {
            background: var(--surface);
            border-radius: var(--r);
            border: 1px solid var(--border);
            box-shadow: 0 20px 60px rgba(26, 31, 54, 0.18);
            width: 100%;
            max-width: 460px;
            padding: 32px;
            transform: translateY(24px) scale(0.97);
            transition: transform 0.28s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .modal-overlay.open .modal {
            transform: translateY(0) scale(1);
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .modal-title {
            font-family: 'Instrument Serif', serif;
            font-size: 1.3rem;
            color: var(--ink-900);
        }

        .modal-close {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            background: var(--bg);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--ink-300);
            cursor: pointer;
            transition: background 0.18s, color 0.18s;
        }

        .modal-close:hover {
            background: var(--border);
            color: var(--ink-700);
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 18px;
        }

        label {
            font-size: 0.79rem;
            font-weight: 600;
            color: var(--ink-700);
        }

        .field input {
            width: 100%;
            padding: 10px 13px;
            font-family: 'Geist', sans-serif;
            font-size: 0.87rem;
            color: var(--ink-900);
            border: 1.5px solid var(--border);
            border-radius: 8px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            background: var(--surface);
        }

        .field input:focus {
            border-color: var(--accent-mid);
            box-shadow: 0 0 0 3px rgba(129, 140, 248, 0.12);
        }

        .field input[readonly] {
            background: var(--surface-2);
            color: var(--ink-500);
            cursor: not-allowed;
        }

        .slug-preview {
            font-size: 0.73rem;
            color: var(--ink-300);
        }

        .slug-preview span {
            color: var(--accent);
            font-weight: 500;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 8px;
        }

        .page-footer {
            padding: 18px 32px;
            border-top: 1px solid var(--border);
            background: var(--surface);
            font-size: 0.76rem;
            color: var(--ink-300);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(26, 31, 54, 0.5);
            z-index: 190;
            backdrop-filter: blur(2px);
        }

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

            .hamburger {
                display: flex;
            }

            .topbar {
                padding: 0 18px;
            }

            .page-content {
                padding: 18px;
            }

            .page-footer {
                flex-direction: column;
                gap: 4px;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .page-content {
                padding: 14px;
            }

            .user-name {
                display: none;
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            animation: fadeUp 0.35s ease both;
        }
    </style>
</head>

<body>

    <aside class="sidebar" id="sidebar">
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

        <nav class="sidebar-nav">
            <span class="nav-label">Menu Utama</span>
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>
            <span class="nav-label">Kelola Konten</span>
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
            <span class="nav-label">Akun</span>
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

        <div class="sidebar-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Keluar dari Akun
                </button>
            </form>
        </div>
    </aside>

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

    <div class="main-wrap">
        <header class="topbar">
            <div class="topbar-left">
                <button class="hamburger" onclick="openSidebar()" aria-label="Menu">
                    <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="breadcrumb">
                    <span>Admin</span>
                    <span>›</span>
                    <span>Kategori</span>
                </div>
            </div>
            <div class="topbar-right">
                <a href="{{ route('profile.edit') }}" class="topbar-user">
                    <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
                    <span class="user-name">{{ auth()->user()->name }}</span>
                </a>
            </div>
        </header>

        <main class="page-content">

            <div class="page-header">
                <div class="page-header-left">
                    <h1 class="page-title">Kelola Kategori</h1>
                    <p class="page-sub">Atur dan organisasi semua kategori berita.</p>
                </div>
                <button class="btn btn-primary" onclick="openModal('modalCreate')">
                    <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Kategori
                </button>
            </div>

            @if(session('success'))
                <div class="flash-success" id="flashMsg">
                    <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>{{ session('success') }}</span>
                    <button class="flash-close" onclick="document.getElementById('flashMsg').remove()">
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endif

            <div class="toolbar">
                <div class="search-wrap">
                    <span class="search-icon">
                        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input type="text" class="search-input" placeholder="Cari kategori…" id="searchInput"
                        oninput="filterTable(this.value)" />
                </div>
            </div>

            <div class="card">
                <div class="card-head">
                    <div class="card-head-title">
                        <div class="title-dot">
                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        Semua Kategori
                        <span class="count-badge">{{ $categories->total() ?? $categories->count() }}</span>
                    </div>
                </div>

                <div class="table-scroll">
                    <table id="categoryTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kategori</th>
                                <th>Slug</th>
                                <th>Jumlah Post</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $index => $category)
                                <tr class="cat-row">
                                    <td style="font-size:0.77rem; color:var(--ink-300);">
                                        {{ $categories->firstItem() + $loop->index }}</td>
                                    <td><span class="cat-name">{{ $category->name }}</span></td>
                                    <td><span class="slug-chip">{{ $category->slug }}</span></td>
                                    <td>
                                        <span class="post-count">
                                            {{ $category->posts->count() }} post
                                        </span>
                                    </td>
                                    <td><span
                                            class="date-cell">{{ $category->created_at->translatedFormat('d M Y') }}</span>
                                    </td>
                                    <td>
                                        <div class="action-cell">
                                            <button class="btn-edit"
                                                onclick="openEditModal({{ $category->id }}, '{{ addslashes($category->name) }}', '{{ $category->slug }}')">
                                                <svg width="11" height="11" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </button>
                                            <form method="POST" action="{{ route('categories.destroy', $category->id) }}"
                                                onsubmit="return confirm('Hapus kategori ini? Semua post terkait akan kehilangan kategorisasinya.')"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete">
                                                    <svg width="11" height="11" fill="none" viewBox="0 0 24 24"
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
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <div class="empty-icon">
                                                <svg width="26" height="26" fill="none" viewBox="0 0 24 24"
                                                    stroke="var(--accent-mid)" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                                </svg>
                                            </div>
                                            <h3>Belum Ada Kategori</h3>
                                            <p>Mulai dengan membuat kategori pertama untuk berita Anda.</p>
                                            <button class="btn btn-primary" onclick="openModal('modalCreate')">
                                                <svg width="13" height="13" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" stroke-width="2.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4v16m8-8H4" />
                                                </svg>
                                                Buat Kategori Pertama
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($categories->hasPages())
                    <div class="card-footer">
                        <span class="pagination-info">
                            Menampilkan {{ $categories->firstItem() }}–{{ $categories->lastItem() }} dari
                            {{ $categories->total() }} kategori
                        </span>
                        {{ $categories->links() }}
                    </div>
                @endif
            </div>

        </main>

        <footer class="page-footer">
            <span>&copy; {{ date('Y') }} Portal Berita — Admin Panel</span>
            <span>v1.0.0</span>
        </footer>
    </div>

    <div class="modal-overlay" id="modalCreate">
        <div class="modal">
            <div class="modal-header">
                <h2 class="modal-title">Tambah Kategori</h2>
                <button class="modal-close" onclick="closeModal('modalCreate')">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form method="POST" action="{{ route('categories.store') }}" id="createForm">
                @csrf
                <div class="field">
                    <label for="create_name">Nama Kategori</label>
                    <input type="text" id="create_name" name="name" placeholder="mis. Teknologi, Olahraga…" required
                        oninput="generateSlug(this.value, 'create_slug')" />
                </div>
                <div class="field">
                    <label for="create_slug">Slug (URL)</label>
                    <input type="text" id="create_slug" name="slug" placeholder="auto-generated" />
                    <span class="slug-preview">Pratinjau: portal.com/kategori/<span
                            id="create_slug_preview">—</span></span>
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn btn-ghost" onclick="closeModal('modalCreate')">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal-overlay" id="modalEdit">
        <div class="modal">
            <div class="modal-header">
                <h2 class="modal-title">Edit Kategori</h2>
                <button class="modal-close" onclick="closeModal('modalEdit')">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form method="POST" id="editForm">
                @csrf
                @method('PUT')
                <div class="field">
                    <label for="edit_name">Nama Kategori</label>
                    <input type="text" id="edit_name" name="name" required
                        oninput="generateSlug(this.value, 'edit_slug')" />
                </div>
                <div class="field">
                    <label for="edit_slug">Slug (URL)</label>
                    <input type="text" id="edit_slug" name="slug" />
                    <span class="slug-preview">Pratinjau: portal.com/kategori/<span
                            id="edit_slug_preview">—</span></span>
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn btn-ghost" onclick="closeModal('modalEdit')">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

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

        function openModal(id) {
            document.getElementById(id).classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('open');
            document.body.style.overflow = '';
        }

        document.querySelectorAll('.modal-overlay').forEach(function (overlay) {
            overlay.addEventListener('click', function (e) {
                if (e.target === overlay) closeModal(overlay.id);
            });
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal-overlay.open').forEach(function (m) {
                    closeModal(m.id);
                });
            }
        });

        function generateSlug(val, targetId) {
            const slug = val
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
            document.getElementById(targetId).value = slug;
            const previewId = targetId.replace('_slug', '_slug_preview');
            const preview = document.getElementById(previewId);
            if (preview) preview.textContent = slug || '—';
        }

        document.getElementById('create_slug').addEventListener('input', function () {
            document.getElementById('create_slug_preview').textContent = this.value || '—';
        });

        document.getElementById('edit_slug').addEventListener('input', function () {
            document.getElementById('edit_slug_preview').textContent = this.value || '—';
        });

        function openEditModal(id, name, slug) {
            const form = document.getElementById('editForm');
            form.action = '/admin/categories/' + id;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_slug').value = slug;
            document.getElementById('edit_slug_preview').textContent = slug;
            openModal('modalEdit');
        }

        function filterTable(query) {
            const rows = document.querySelectorAll('#categoryTable tbody .cat-row');
            const q = query.toLowerCase().trim();
            rows.forEach(function (row) {
                const name = row.querySelector('.cat-name').textContent.toLowerCase();
                const slug = row.querySelector('.slug-chip').textContent.toLowerCase();
                row.style.display = (name.includes(q) || slug.includes(q)) ? '' : 'none';
            });
        }

        setTimeout(function () {
            const flash = document.getElementById('flashMsg');
            if (flash) {
                flash.style.transition = 'opacity 0.4s';
                flash.style.opacity = '0';
                setTimeout(function () { flash.remove(); }, 400);
            }
        }, 5000);
    </script>
</body>

</html>