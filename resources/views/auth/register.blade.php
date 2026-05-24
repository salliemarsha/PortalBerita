<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Akun — Portal Berita</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet" />
    <style>
        :root {
            --bg: #f4f6fb;
            --surface: #ffffff;
            --border: #e3e8f4;
            --ink-900: #1a1f36;
            --ink-700: #3d4461;
            --ink-500: #6b7299;
            --ink-300: #a0a8c3;
            --accent: #4f46e5;
            --accent-h: #4338ca;
            --accent-light: #eef2ff;
            --accent-mid: #818cf8;
            --error: #dc2626;
            --error-bg: #fef2f2;
            --error-border: #fecaca;
            --success: #16a34a;
            --warn: #d97706;
            --warn-bg: #fffbeb;
            --panel-bg: #1e2140;
            --r-md: 12px;
            --r-lg: 16px;
            --r-xl: 24px;
            --shadow: 0 8px 40px rgba(79,70,229,0.10);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--ink-700);
            min-height: 100vh;
            display: flex;
            -webkit-font-smoothing: antialiased;
        }

        a { text-decoration: none; color: inherit; }

        .auth-split {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        .auth-panel {
            width: 38%;
            background: var(--panel-bg);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 48px;
        }

        .auth-panel::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at 20% 30%, rgba(79,70,229,0.25) 0%, transparent 55%),
                radial-gradient(ellipse at 85% 80%, rgba(129,140,248,0.12) 0%, transparent 50%);
            pointer-events: none;
        }

        .panel-deco-1 {
            position: absolute;
            right: -60px;
            top: -60px;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            border: 1px solid rgba(129,140,248,0.1);
            pointer-events: none;
        }

        .panel-deco-2 {
            position: absolute;
            left: -80px;
            bottom: -80px;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            border: 1px solid rgba(79,70,229,0.12);
            pointer-events: none;
        }

        .panel-top { position: relative; }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            border-radius: 11px;
            background: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 14px rgba(79,70,229,0.45);
        }

        .brand-icon svg { color: #fff; }

        .brand-name {
            font-family: 'DM Serif Display', serif;
            font-size: 1.15rem;
            color: #fff;
            letter-spacing: -0.01em;
        }

        .panel-body {
            position: relative;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px 0;
        }

        .panel-headline {
            font-family: 'DM Serif Display', serif;
            font-size: 2.2rem;
            color: #fff;
            line-height: 1.18;
            letter-spacing: -0.025em;
            margin-bottom: 16px;
        }

        .panel-headline em {
            font-style: italic;
            color: var(--accent-mid);
        }

        .panel-desc {
            font-size: 0.88rem;
            color: rgba(160,168,195,0.75);
            line-height: 1.7;
            max-width: 280px;
        }

        .benefit-list {
            list-style: none;
            margin-top: 32px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            position: relative;
        }

        .benefit-item {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.83rem;
            color: rgba(160,168,195,0.8);
        }

        .benefit-dot {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: rgba(79,70,229,0.25);
            border: 1px solid rgba(129,140,248,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .benefit-dot svg { color: var(--accent-mid); }

        .panel-footer { position: relative; font-size: 0.75rem; color: rgba(160,168,195,0.4); }

        .auth-form-side {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 32px;
            background: var(--bg);
            overflow-y: auto;
        }

        .form-box {
            width: 100%;
            max-width: 440px;
            animation: fadeUp 0.4s ease both;
            padding: 8px 0;
        }

        .form-header { margin-bottom: 32px; }

        .form-eyebrow {
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 10px;
        }

        .form-title {
            font-family: 'DM Serif Display', serif;
            font-size: 1.85rem;
            color: var(--ink-900);
            letter-spacing: -0.025em;
            margin-bottom: 6px;
        }

        .form-sub { font-size: 0.85rem; color: var(--ink-300); }
        .form-sub a { color: var(--accent); font-weight: 600; }
        .form-sub a:hover { color: var(--accent-h); text-decoration: underline; }

        .form-card {
            background: var(--surface);
            border-radius: var(--r-xl);
            border: 1px solid var(--border);
            padding: 36px;
            box-shadow: var(--shadow);
        }

        .form-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 18px;
        }

        .form-group.full { grid-column: 1 / -1; }
        .form-group:last-of-type { margin-bottom: 0; }

        label {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--ink-700);
            letter-spacing: 0.02em;
        }

        .input-wrap { position: relative; }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--ink-300);
            pointer-events: none;
            transition: color 0.2s;
        }

        .input-wrap:focus-within .input-icon { color: var(--accent); }

        input[type="email"],
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 11px 14px 11px 40px;
            border-radius: var(--r-md);
            border: 1.5px solid var(--border);
            background: var(--bg);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.88rem;
            color: var(--ink-900);
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            outline: none;
        }

        input:focus {
            border-color: var(--accent-mid);
            box-shadow: 0 0 0 3px rgba(79,70,229,0.10);
            background: #fff;
        }

        input.is-error {
            border-color: var(--error);
            box-shadow: 0 0 0 3px rgba(220,38,38,0.08);
        }

        input.is-valid {
            border-color: var(--success);
        }

        .field-error {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.75rem;
            color: var(--error);
            margin-top: 4px;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--ink-300);
            cursor: pointer;
            background: none;
            border: none;
            padding: 4px;
            transition: color 0.2s;
        }

        .password-toggle:hover { color: var(--ink-700); }

        .password-strength {
            margin-top: 8px;
        }

        .strength-bar-track {
            height: 4px;
            background: var(--border);
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 4px;
        }

        .strength-bar-fill {
            height: 100%;
            border-radius: 4px;
            transition: width 0.3s ease, background 0.3s ease;
            width: 0%;
        }

        .strength-label {
            font-size: 0.72rem;
            color: var(--ink-300);
            transition: color 0.3s;
        }

        .terms-wrap {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin: 20px 0 24px;
            cursor: pointer;
        }

        .terms-wrap input[type="checkbox"] {
            width: 16px;
            height: 16px;
            border-radius: 5px;
            border: 1.5px solid var(--border);
            accent-color: var(--accent);
            cursor: pointer;
            padding: 0;
            margin-top: 1px;
            flex-shrink: 0;
        }

        .terms-text {
            font-size: 0.8rem;
            color: var(--ink-500);
            line-height: 1.5;
        }

        .terms-text a { color: var(--accent); font-weight: 600; }
        .terms-text a:hover { text-decoration: underline; }

        .btn-submit {
            width: 100%;
            padding: 13px;
            border-radius: var(--r-md);
            background: var(--accent);
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 0.02em;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 16px rgba(79,70,229,0.28);
            transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
        }

        .btn-submit:hover {
            background: var(--accent-h);
            transform: translateY(-1px);
            box-shadow: 0 6px 24px rgba(79,70,229,0.36);
        }

        .login-link-wrap {
            text-align: center;
            margin-top: 24px;
            font-size: 0.83rem;
            color: var(--ink-500);
        }

        .login-link-wrap a {
            font-weight: 700;
            color: var(--accent);
        }

        .login-link-wrap a:hover { color: var(--accent-h); text-decoration: underline; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 900px) {
            .auth-panel { display: none; }
            .auth-form-side { padding: 32px 20px; }
        }

        @media (max-width: 560px) {
            .form-grid-2 { grid-template-columns: 1fr; }
            .form-card { padding: 24px 20px; }
            .auth-form-side { padding: 24px 16px; align-items: flex-start; padding-top: 48px; }
        }
    </style>
</head>
<body>
<div class="auth-split">

    <div class="auth-panel">
        <div class="panel-deco-1"></div>
        <div class="panel-deco-2"></div>

        <div class="panel-top">
            <div class="brand">
                <div class="brand-icon">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <span class="brand-name">Portal Berita</span>
            </div>
        </div>

        <div class="panel-body">
            <h1 class="panel-headline">Menjadi<br /><em>Bagian dari Komunitas Kami</em></h1>
            <p class="panel-desc">Daftarkan akun Anda untuk menikmati pengalaman membaca berita yang lebih interaktif dan personal..</p>
            <ul class="benefit-list">
                <li class="benefit-item">
                    <span class="benefit-dot">
                        <svg width="10" height="10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    </span>
                    Berikan apresiasi pada artikel favorit Anda dengan fitur Like
                </li>
                <li class="benefit-item">
                    <span class="benefit-dot">
                        <svg width="10" height="10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    </span>
                    Simpan berita penting untuk dibaca kembali kapan saja tanpa takut hilang
                </li>
                <li class="benefit-item">
                    <span class="benefit-dot">
                        <svg width="10" height="10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    </span>
                    Suarakan pendapat Anda dan berdiskusi sehat di kolom Komentar
                </li>
            </ul>
        </div>

        <div class="panel-footer">
            &copy; {{ date('Y') }} Portal Berita. Hak cipta dilindungi.
        </div>
    </div>

    <div class="auth-form-side">
        <div class="form-box">
            <div class="form-header">
                <p class="form-eyebrow">Buat Akun Baru</p>
                <h2 class="form-title">Daftar Sekarang</h2>
            </div>

            <div class="form-card">
                <form method="POST" action="{{ route('register') }}" id="registerForm" novalidate>
                    @csrf

                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </span>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Nama lengkap Anda"
                                autocomplete="name"
                                class="{{ $errors->has('name') ? 'is-error' : '' }}"
                            />
                        </div>
                        @error('name')
                        <div class="field-error">
                            <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </span>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="nama@email.com"
                                autocomplete="email"
                                class="{{ $errors->has('email') ? 'is-error' : '' }}"
                            />
                        </div>
                        @error('email')
                        <div class="field-error">
                            <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </span>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Min. 8 karakter"
                                autocomplete="new-password"
                                class="{{ $errors->has('password') ? 'is-error' : '' }}"
                                oninput="checkPasswordStrength(this.value)"
                            />
                            <button type="button" class="password-toggle" onclick="togglePassword('password', this)" tabindex="-1">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="password-strength" id="strengthWrap" style="display:none;">
                            <div class="strength-bar-track">
                                <div class="strength-bar-fill" id="strengthBar"></div>
                            </div>
                            <span class="strength-label" id="strengthLabel">Kata sandi lemah</span>
                        </div>
                        @error('password')
                        <div class="field-error">
                            <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </span>
                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="Ulangi kata sandi"
                                autocomplete="new-password"
                                oninput="checkPasswordMatch()"
                            />
                            <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation', this)" tabindex="-1">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        <div id="matchMsg" style="display:none; font-size:0.75rem; margin-top:4px;"></div>
                    </div>

                    <label class="terms-wrap">
                        <input type="checkbox" name="terms" id="terms" required />
                        <span class="terms-text">
                            Saya telah membaca dan menyetujui <a href="#">Syarat & Ketentuan</a> serta <a href="#">Kebijakan Privasi</a> Portal Berita.
                        </span>
                    </label>

                    <button type="submit" class="btn-submit" id="submitBtn">
                        Buat Akun Sekarang
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                        </svg>
                    </button>
                </form>
            </div>

            <div class="login-link-wrap">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk sekarang</a>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword(fieldId, btn) {
    const input = document.getElementById(fieldId);
    const isHidden = input.type === 'password';
    input.type = isHidden ? 'text' : 'password';
    btn.style.color = isHidden ? 'var(--accent)' : 'var(--ink-300)';
}

function checkPasswordStrength(val) {
    const wrap = document.getElementById('strengthWrap');
    const bar  = document.getElementById('strengthBar');
    const lbl  = document.getElementById('strengthLabel');

    if (!val) { wrap.style.display = 'none'; return; }
    wrap.style.display = 'block';

    let score = 0;
    if (val.length >= 8)               score++;
    if (/[A-Z]/.test(val))             score++;
    if (/[0-9]/.test(val))             score++;
    if (/[^A-Za-z0-9]/.test(val))      score++;

    const map = [
        { w: '25%', bg: '#ef4444', t: 'Kata sandi lemah', c: '#ef4444' },
        { w: '50%', bg: '#f97316', t: 'Kata sandi cukup', c: '#f97316' },
        { w: '75%', bg: '#eab308', t: 'Kata sandi baik',  c: '#d97706' },
        { w: '100%',bg: '#22c55e', t: 'Kata sandi kuat',  c: '#16a34a' },
    ];
    const s = map[score - 1] || map[0];
    bar.style.width      = s.w;
    bar.style.background = s.bg;
    lbl.textContent      = s.t;
    lbl.style.color      = s.c;
}

function checkPasswordMatch() {
    const p1  = document.getElementById('password').value;
    const p2  = document.getElementById('password_confirmation').value;
    const msg = document.getElementById('matchMsg');
    if (!p2) { msg.style.display = 'none'; return; }
    msg.style.display = 'flex';
    if (p1 === p2) {
        msg.innerHTML = '<span style="color:#16a34a;display:flex;align-items:center;gap:4px;"><svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>Kata sandi cocok</span>';
        document.getElementById('password_confirmation').classList.remove('is-error');
        document.getElementById('password_confirmation').classList.add('is-valid');
    } else {
        msg.innerHTML = '<span style="color:#dc2626;display:flex;align-items:center;gap:4px;"><svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>Kata sandi tidak cocok</span>';
        document.getElementById('password_confirmation').classList.add('is-error');
        document.getElementById('password_confirmation').classList.remove('is-valid');
    }
}

document.getElementById('registerForm').addEventListener('submit', function(e) {
    const btn = document.getElementById('submitBtn');
    btn.style.opacity = '0.7';
    btn.style.pointerEvents = 'none';
    btn.innerHTML = '<span>Memproses...</span>';
});
</script>
</body>
</html>