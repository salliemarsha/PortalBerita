<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengaturan Akun — Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=DM+Serif+Display&display=swap" rel="stylesheet" />
    <style>
        /* ════════════════════════════════════════════════════════════
           DESIGN TOKENS (identik dengan dashboard)
         ════════════════════════════════════════════════════════════ */
        :root {
            --bg:            #f4f6fa;
            --surface:       #ffffff;
            --surface-2:     #f9fafc;
            --border:        #e8eaf2;
            --border-soft:   #f0f2f8;

            --ink-900:       #1a1f36;
            --ink-700:       #3d4461;
            --ink-500:       #6b7299;
            --ink-300:       #a0a8c3;
            --ink-100:       #e8eaf2;

            --accent:        #4f46e5;
            --accent-hover:  #4338ca;
            --accent-light:  #eef2ff;
            --accent-mid:    #818cf8;
            --accent-glow:   rgba(79,70,229,0.15);

            --sidebar-bg:    #1e2140;
            --sidebar-w:     260px;
            --sidebar-ink:   #a0a8c3;
            --sidebar-ink-h: #ffffff;
            --sidebar-hover: rgba(255,255,255,0.06);
            --sidebar-active:rgba(79,70,229,0.18);

            --topbar-h:      64px;
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

        .sidebar::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 80% 20%, rgba(79,70,229,0.12) 0%, transparent 50%),
                radial-gradient(circle at 20% 80%, rgba(129,140,248,0.07) 0%, transparent 50%);
            pointer-events: none;
        }

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
        .nav-link.active .nav-icon { opacity: 1; }

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
            color: rgba(160, 168, 195, 0.7);
            transition: background 0.18s, color 0.18s;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.12);
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

        .page-content {
            flex: 1;
            padding: 32px;
        }

        .page-header {
            display: flex;
            flex-direction: column;
            gap: 4px;
            margin-bottom: 28px;
        }

        .page-title {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 1.75rem;
            color: var(--ink-900);
            letter-spacing: -0.02em;
        }

        .page-subtitle {
            font-size: 0.85rem;
            color: var(--ink-300);
        }

        /* ════════════════════════════════════════════════════════════
           RESPONSIVE & MOBILE OVERLAY
         ════════════════════════════════════════════════════════════ */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(26,31,54,0.5);
            z-index: 190;
            backdrop-filter: blur(2px);
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(calc(-1 * var(--sidebar-w))); }
            .sidebar.open { transform: translateX(0); }
            .sidebar-overlay.active { display: block; }
            .main-wrap { margin-left: 0; }
            .mobile-menu-btn { display: flex; }
            .topbar { padding: 0 20px; }
            .page-content { padding: 20px; }
            .page-footer { flex-direction: column; gap: 4px; text-align: center; }
        }

        @media (max-width: 480px) {
            .page-content { padding: 16px; }
            .topbar { padding: 0 16px; }
            .user-name { display: none; }
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .profile-container { animation: fadeUp 0.4s ease both; }
    </style>
</head>
<body>

    {{-- SIDEBAR --}}
    <aside class="sidebar" id="sidebar">
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

    {{-- MAIN WRAP --}}
    <div class="main-wrap">

        {{-- Topbar --}}
        <header class="topbar">
            <div class="topbar-left">
                <button class="mobile-menu-btn" onclick="openSidebar()" aria-label="Buka menu">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <nav class="page-breadcrumb">
                    <span>Pengaturan</span>
                    <span class="breadcrumb-sep">›</span>
                    <span>Profil</span>
                </nav>
            </div>
            <div class="topbar-right">
                <div class="topbar-user">
                    <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
                    <span class="user-name">{{ auth()->user()->name }}</span>
                </div>
            </div>
        </header>

        {{-- Page Content --}}
        <main class="page-content">
            <div class="profile-container">

                <div class="page-header">
                    <h1 class="page-title">Pengaturan Akun</h1>
                    <p class="page-subtitle">Kelola profil dan keamanan akun Anda</p>
                </div>

                <!-- Modern SaaS Layout Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    <!-- Left Column: Premium Profile Summary Card -->
                    <div class="lg:col-span-1 space-y-6">
                        <div class="saas-card relative overflow-hidden bg-white p-6 flex flex-col items-center text-center">
                            <!-- Decorative Top Accent Line -->
                            <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-[#4a69bd] to-[#7b96d4]"></div>
                            
                            <!-- Initialized Avatar Bubble -->
                            <div class="mt-4 mb-4 relative">
                                <div class="w-24 h-24 rounded-full bg-gradient-to-tr from-[#eef1fa] to-[#dde6f7] flex items-center justify-center border-4 border-white shadow-md">
                                    <span class="text-3xl font-serif-brand font-bold text-[#3d5a9e]">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </span>
                                </div>
                                <span class="absolute bottom-1 right-1 w-5 h-5 bg-green-500 border-4 border-white rounded-full" title="Akun Aktif"></span>
                            </div>

                            <!-- User Identity Info -->
                            <h3 class="text-xl font-bold text-[#1e2535]">{{ $user->name }}</h3>
                            <p class="text-sm text-[#6b7794] mt-1">{{ $user->email }}</p>
                            
                            <!-- Status Badge -->
                            <span class="mt-3 inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-[#eef1fa] text-[#3d5a9e]">
                                Kontributor Portal
                            </span>

                            <div class="w-full border-t border-[#eef0f5] my-6"></div>

                            <!-- Profile Meta Data Info Grid -->
                            <div class="w-full space-y-3 text-left">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="text-[#9aa3b8] uppercase tracking-wider font-semibold">Peran</span>
                                    <span class="font-bold text-[#3d4a63]">Penulis</span>
                                </div>
                                <div class="flex items-center justify-between text-xs">
                                    <span class="text-[#9aa3b8] uppercase tracking-wider font-semibold">Bergabung</span>
                                    <span class="font-bold text-[#3d4a63]">{{ $user->created_at ? $user->created_at->translatedFormat('d M Y') : 'N/A' }}</span>
                                </div>
                                <div class="flex items-center justify-between text-xs">
                                    <span class="text-[#9aa3b8] uppercase tracking-wider font-semibold">Status Email</span>
                                    <span class="font-semibold text-green-600 flex items-center gap-1">
                                        <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                        Terverifikasi
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Quick SaaS Tip Widget -->
                        <div class="saas-card bg-[#eef1fa] p-5 border-l-4 border-[#4a69bd] shadow-none hover:transform-none">
                            <div class="flex gap-3">
                                <svg class="text-[#3d5a9e] w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="text-sm font-bold text-[#3d5a9e] mb-1">Tips Keamanan</h4>
                                    <p class="text-xs text-[#6b7794] leading-relaxed">
                                        Gunakan kombinasi huruf besar, kecil, angka, dan simbol untuk menjaga keamanan kata sandi Anda secara berkala.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Settings Cards -->
                    <div class="lg:col-span-2 space-y-8">
                        
                        <!-- Card 1: Profile Information -->
                        <div class="saas-card bg-white p-6 sm:p-8">
                            @include('profile.partials.update-profile-information-form')
                        </div>

                        <!-- Card 2: Security Credentials -->
                        <div class="saas-card bg-white p-6 sm:p-8">
                            @include('profile.partials.update-password-form')
                        </div>

                        <!-- Card 3: Danger Zone / Account Deletion -->
                        <div class="saas-card bg-white border-red-100 p-6 sm:p-8">
                            @include('profile.partials.delete-user-form')
                        </div>
                        
                    </div>
                </div>

            </div>
        </main>
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
    </script>
</body>
</html>
