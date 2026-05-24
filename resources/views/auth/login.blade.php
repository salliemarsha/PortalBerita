<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masuk — Portal Berita</title>
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
            width: 42%;
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
            font-size: 2.4rem;
            color: #fff;
            line-height: 1.15;
            letter-spacing: -0.025em;
            margin-bottom: 16px;
        }

        .panel-headline em {
            font-style: italic;
            color: var(--accent-mid);
        }

        .panel-desc {
            font-size: 0.9rem;
            color: rgba(160,168,195,0.75);
            line-height: 1.7;
            max-width: 300px;
        }

        .panel-stats {
            display: flex;
            gap: 32px;
            margin-top: 40px;
            position: relative;
        }

        .stat-item { display: flex; flex-direction: column; gap: 2px; }

        .stat-num {
            font-family: 'DM Serif Display', serif;
            font-size: 1.5rem;
            color: #fff;
        }

        .stat-lbl {
            font-size: 0.72rem;
            color: rgba(160,168,195,0.6);
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .panel-footer { position: relative; font-size: 0.75rem; color: rgba(160,168,195,0.4); }

        .auth-form-side {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 32px;
            background: var(--bg);
        }

        .form-box {
            width: 100%;
            max-width: 420px;
            animation: fadeUp 0.4s ease both;
        }

        .form-header { margin-bottom: 36px; }

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

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 20px;
        }

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

        .form-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 20px 0 24px;
        }

        .checkbox-wrap {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .checkbox-wrap input[type="checkbox"] {
            width: 16px;
            height: 16px;
            border-radius: 5px;
            border: 1.5px solid var(--border);
            accent-color: var(--accent);
            cursor: pointer;
            padding: 0;
        }

        .checkbox-label {
            font-size: 0.8rem;
            color: var(--ink-500);
            cursor: pointer;
        }

        .forgot-link {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--accent);
            transition: color 0.18s;
        }

        .forgot-link:hover { color: var(--accent-h); }

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

        .btn-submit:active { transform: translateY(0); }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 24px 0;
        }

        .divider-line { flex: 1; height: 1px; background: var(--border); }

        .divider-text { font-size: 0.72rem; color: var(--ink-300); white-space: nowrap; }

        .register-link-wrap {
            text-align: center;
            margin-top: 24px;
            font-size: 0.83rem;
            color: var(--ink-500);
        }

        .register-link-wrap a {
            font-weight: 700;
            color: var(--accent);
        }

        .register-link-wrap a:hover { color: var(--accent-h); text-decoration: underline; }

        .alert-error {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 12px 16px;
            background: var(--error-bg);
            border: 1px solid var(--error-border);
            border-radius: var(--r-md);
            margin-bottom: 20px;
            font-size: 0.82rem;
            color: var(--error);
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 900px) {
            .auth-panel { display: none; }
            .auth-form-side { padding: 32px 20px; }
        }

        @media (max-width: 480px) {
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
            <h1 class="panel-headline">Berita <em>Terpercaya,</em><br />Selalu Terkini.</h1>
            <p class="panel-desc">Masuk ke akun Anda untuk melanjutkan membaca, memberikan apresiasi, dan berinteraksi dengan pembaca lainnya.</p>
        </div>

        <div class="panel-footer">
            &copy; {{ date('Y') }} Portal Berita. Hak cipta dilindungi.
        </div>
    </div>

    <div class="auth-form-side">
        <div class="form-box">
            <div class="form-header">
                <p class="form-eyebrow">Selamat Datang Kembali</p>
                <h2 class="form-title">Masuk ke Akun</h2>
            </div>

            <div class="form-card">

                @if($errors->any())
                <div class="alert-error">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:1px">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>{{ $errors->first() }}</span>
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}" id="loginForm" novalidate>
                    @csrf

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
                                placeholder="••••••••"
                                autocomplete="current-password"
                                class="{{ $errors->has('password') ? 'is-error' : '' }}"
                            />
                            <button type="button" class="password-toggle" onclick="togglePassword('password', this)" tabindex="-1">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="eye-icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                        <div class="field-error">
                            <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <label class="checkbox-wrap">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                            <span class="checkbox-label">Ingat saya</span>
                        </label>
                        @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">Lupa kata sandi?</a>
                        @endif
                    </div>

                    <button type="submit" class="btn-submit" id="submitBtn">
                        <span id="btnText">Masuk</span>
                        <svg id="btnArrow" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                        </svg>
                    </button>
                </form>
            </div>

            <div class="register-link-wrap">
                Belum punya akun? <a href="{{ route('register') }}">Daftar gratis sekarang</a>
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

document.getElementById('loginForm').addEventListener('submit', function(e) {
    const btn = document.getElementById('submitBtn');
    btn.style.opacity = '0.7';
    btn.style.pointerEvents = 'none';
    document.getElementById('btnText').textContent = 'Memproses...';
});

document.getElementById('email').addEventListener('blur', function() {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (this.value && !re.test(this.value)) {
        this.classList.add('is-error');
        this.classList.remove('is-valid');
    } else if (this.value) {
        this.classList.remove('is-error');
        this.classList.add('is-valid');
    }
});
</script>
</body>
</html>