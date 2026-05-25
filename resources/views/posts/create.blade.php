<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tulis Berita Baru — Portal Berita</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;1,400&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&display=swap" rel="stylesheet" />

    <style>
        :root {
            --page-bg:        #f1f4f9;
            --sidebar-bg:     #1b1f3b;
            --surface:        #ffffff;
            --surface-raised: #f8f9fc;
            --surface-hover:  #f4f6fb;

            --border:         #e2e6f0;
            --border-soft:    #edf0f7;
            --border-focus:   #818cf8;

            --ink-950:        #0f1225;
            --ink-800:        #1e2448;
            --ink-600:        #3d4578;
            --ink-400:        #7880a8;
            --ink-200:        #b8becf;
            --ink-100:        #dde1ef;

            --indigo:         #4f46e5;
            --indigo-hover:   #4338ca;
            --indigo-light:   #eef2ff;
            --indigo-mid:     #818cf8;
            --indigo-glow:    rgba(79,70,229,0.16);

            --success:        #059669;
            --success-soft:   #ecfdf5;
            --warn:           #d97706;
            --warn-soft:      #fffbeb;
            --error:          #dc2626;
            --error-soft:     #fef2f2;

            --topbar-h:       60px;
            --sidebar-w:      240px;
            --col-side-w:     300px;

            --r-xl:           16px;
            --r-lg:           12px;
            --r-md:           8px;
            --r-sm:           6px;

            --shadow-xs:      0 1px 3px rgba(15,18,37,0.05);
            --shadow-sm:      0 2px 8px rgba(15,18,37,0.07);
            --shadow-md:      0 6px 24px rgba(15,18,37,0.09);
            --shadow-inset:   inset 0 1px 3px rgba(15,18,37,0.04);

            --transition:     0.2s cubic-bezier(0.4,0,0.2,1);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { height: 100%; scroll-behavior: smooth; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--page-bg);
            color: var(--ink-600);
            min-height: 100vh;
            display: flex;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        a { text-decoration: none; color: inherit; }
        button { font-family: inherit; cursor: pointer; border: none; background: none; }
        img { display: block; }

        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--ink-100); border-radius: 10px; }

        .sidebar {
            width: var(--sidebar-w);
            background: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            z-index: 300;
            transition: transform var(--transition);
            overflow: hidden;
        }

        .sidebar::after {
            content: '';
            position: absolute; inset: 0; pointer-events: none;
            background:
                radial-gradient(ellipse 120% 60% at 50% 0%, rgba(99,102,241,0.14) 0%, transparent 70%),
                radial-gradient(ellipse 80% 80% at 100% 100%, rgba(129,140,248,0.06) 0%, transparent 60%);
        }

        .sidebar-brand {
            display: flex; align-items: center; gap: 11px;
            padding: 0 20px; height: var(--topbar-h);
            border-bottom: 1px solid rgba(255,255,255,0.05);
            flex-shrink: 0; position: relative; z-index: 1;
        }

        .brand-mark {
            width: 34px; height: 34px; border-radius: 9px;
            background: var(--indigo);
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 0 0 1px rgba(255,255,255,0.1), 0 4px 12px rgba(79,70,229,0.45);
            flex-shrink: 0;
        }

        .brand-mark svg { color: #fff; }

        .brand-copy { display: flex; flex-direction: column; }

        .brand-name {
            font-family: 'Lora', serif;
            font-size: 0.92rem; font-weight: 600;
            color: #fff; letter-spacing: -0.01em; line-height: 1.2;
        }

        .brand-role {
            font-size: 0.60rem; font-weight: 500;
            color: rgba(160,170,208,0.55);
            letter-spacing: 0.09em; text-transform: uppercase;
        }

        .sidebar-nav { flex: 1; padding: 18px 0; overflow-y: auto; position: relative; z-index: 1; }

        .nav-group-label {
            font-size: 0.60rem; font-weight: 700; letter-spacing: 0.13em;
            text-transform: uppercase; color: rgba(160,170,208,0.36);
            padding: 12px 22px 6px;
        }

        .nav-item {
            display: flex; align-items: center; gap: 10px;
            padding: 9px 18px; margin: 1px 10px;
            border-radius: var(--r-md);
            font-size: 0.82rem; font-weight: 500;
            color: rgba(160,170,208,0.75);
            transition: background var(--transition), color var(--transition), transform var(--transition);
            position: relative;
        }

        .nav-item svg { width: 16px; height: 16px; flex-shrink: 0; opacity: 0.7; transition: opacity var(--transition); }

        .nav-item:hover {
            background: rgba(255,255,255,0.06); color: #fff; transform: translateX(2px);
        }

        .nav-item:hover svg { opacity: 1; }

        .nav-item.active { background: rgba(79,70,229,0.2); color: #c7d2fe; }

        .nav-item.active::before {
            content: '';
            position: absolute; left: -10px; top: 50%; transform: translateY(-50%);
            width: 3px; height: 18px;
            background: var(--indigo-mid); border-radius: 0 3px 3px 0;
        }

        .nav-item.active svg { opacity: 1; }

        .sidebar-user {
            padding: 14px 10px;
            border-top: 1px solid rgba(255,255,255,0.05);
            flex-shrink: 0; position: relative; z-index: 1;
        }

        .user-card {
            display: flex; align-items: center; gap: 10px;
            padding: 8px 12px; border-radius: var(--r-md);
            transition: background var(--transition); cursor: pointer;
        }

        .user-card:hover { background: rgba(255,255,255,0.05); }

        .user-avatar {
            width: 32px; height: 32px; border-radius: 50%;
            background: linear-gradient(135deg, var(--indigo) 0%, var(--indigo-mid) 100%);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.68rem; font-weight: 700; color: #fff;
            flex-shrink: 0; border: 1.5px solid rgba(255,255,255,0.12);
        }

        .user-info { display: flex; flex-direction: column; gap: 1px; flex: 1; min-width: 0; }

        .user-name {
            font-size: 0.80rem; font-weight: 600; color: rgba(255,255,255,0.85);
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }

        .user-logout-btn {
            width: 100%;
            display: flex; align-items: center; justify-content: flex-start; gap: 8px;
            padding: 0;
            font-size: 0.72rem; color: rgba(160,170,208,0.5);
            transition: color var(--transition); background: none; border: none;
            cursor: pointer; font-family: 'DM Sans', sans-serif;
        }

        .user-logout-btn:hover { color: #fca5a5; }

        .main-wrap {
            margin-left: var(--sidebar-w);
            flex: 1; display: flex; flex-direction: column; min-height: 100vh;
        }

        .topbar {
            height: var(--topbar-h);
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 28px; position: sticky; top: 0; z-index: 200;
        }

        .topbar-left { display: flex; align-items: center; gap: 12px; }

        .mobile-toggle {
            display: none; width: 34px; height: 34px; border-radius: var(--r-sm);
            background: var(--surface-raised); border: 1px solid var(--border);
            align-items: center; justify-content: center;
            cursor: pointer; color: var(--ink-600);
            transition: background var(--transition), border-color var(--transition);
        }

        .mobile-toggle:hover { background: var(--surface-hover); border-color: var(--ink-200); }

        .breadcrumb {
            display: flex; align-items: center; gap: 6px;
            font-size: 0.79rem;
        }

        .breadcrumb a { color: var(--ink-200); transition: color var(--transition); }
        .breadcrumb a:hover { color: var(--indigo); }
        .breadcrumb-sep { color: var(--ink-100); font-size: 0.75rem; }
        .breadcrumb-current { color: var(--ink-800); font-weight: 500; }

        .topbar-right { display: flex; align-items: center; gap: 10px; }

        .save-indicator {
            display: flex; align-items: center; gap: 6px;
            padding: 5px 11px; border-radius: 100px;
            background: var(--surface-raised); border: 1px solid var(--border);
            font-size: 0.73rem; color: var(--ink-200);
            transition: all var(--transition);
        }

        .save-dot {
            width: 6px; height: 6px; border-radius: 50%;
            background: var(--ink-100);
            transition: background var(--transition);
        }

        .save-dot.dirty { background: var(--warn); animation: blink 1.5s infinite; }
        .save-dot.saved { background: var(--success); animation: none; }

        @keyframes blink { 0%,100% { opacity:1; } 50% { opacity:0.35; } }

        .btn {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 8px 18px; border-radius: var(--r-md);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.82rem; font-weight: 600;
            transition: all var(--transition); cursor: pointer; border: none;
            white-space: nowrap; letter-spacing: 0.01em;
        }

        .btn-primary {
            background: var(--indigo); color: #fff;
            box-shadow: 0 2px 8px var(--indigo-glow);
        }

        .btn-primary:hover {
            background: var(--indigo-hover);
            box-shadow: 0 4px 18px rgba(79,70,229,0.35);
            transform: translateY(-1px);
        }

        .btn-primary:active { transform: translateY(0); box-shadow: 0 1px 4px var(--indigo-glow); }

        .btn-outline {
            background: var(--surface); color: var(--ink-600);
            border: 1px solid var(--border);
        }

        .btn-outline:hover {
            background: var(--surface-hover); border-color: var(--ink-200);
            transform: translateY(-1px);
        }

        .btn-ghost {
            background: transparent; color: var(--ink-400);
            border: 1px solid transparent;
        }

        .btn-ghost:hover { background: var(--surface-hover); color: var(--ink-600); }

        .btn-draft {
            background: var(--warn-soft); color: var(--warn);
            border: 1px solid #fcd34d;
        }

        .btn-draft:hover { background: #fef3c7; transform: translateY(-1px); }

        .btn-sm { padding: 6px 13px; font-size: 0.78rem; }

        .btn-icon {
            width: 34px; height: 34px; padding: 0;
            display: inline-flex; align-items: center; justify-content: center;
            border-radius: var(--r-sm);
        }

        .page-body { flex: 1; padding: 28px; }

        .page-header { margin-bottom: 24px; }

        .page-title {
            font-family: 'Lora', serif;
            font-size: 1.45rem; font-weight: 600;
            color: var(--ink-950); letter-spacing: -0.025em;
            display: flex; align-items: center; gap: 12px;
        }

        .page-title-badge {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.68rem; font-weight: 700;
            letter-spacing: 0.08em; text-transform: uppercase;
            padding: 3px 9px; border-radius: 100px;
            background: var(--indigo-light); color: var(--indigo);
        }

        .editor-grid {
            display: grid;
            grid-template-columns: 1fr var(--col-side-w);
            gap: 22px;
            align-items: start;
        }

        .col-main { display: flex; flex-direction: column; gap: 18px; }

        .col-side {
            display: flex; flex-direction: column; gap: 14px;
            position: sticky; top: calc(var(--topbar-h) + 28px);
        }

        .panel {
            background: var(--surface);
            border-radius: var(--r-xl);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-xs);
            overflow: hidden;
            transition: box-shadow var(--transition), border-color var(--transition);
        }

        .panel:focus-within {
            border-color: var(--indigo-mid);
            box-shadow: var(--shadow-sm), 0 0 0 3px rgba(129,140,248,0.08);
        }

        .panel-hd {
            display: flex; align-items: center; gap: 9px;
            padding: 13px 18px;
            border-bottom: 1px solid var(--border-soft);
            background: var(--surface-raised);
        }

        .panel-hd-icon {
            width: 26px; height: 26px; border-radius: 7px;
            background: var(--indigo-light);
            display: flex; align-items: center; justify-content: center;
            color: var(--indigo); flex-shrink: 0;
        }

        .panel-hd-title {
            font-size: 0.79rem; font-weight: 700; color: var(--ink-800);
            letter-spacing: -0.005em;
        }

        .panel-hd-meta {
            margin-left: auto;
            font-size: 0.70rem; color: var(--ink-200);
        }

        .panel-bd { padding: 18px; }

        .panel-bd-flush { padding: 0; }

        .field { display: flex; flex-direction: column; gap: 6px; margin-bottom: 16px; }
        .field:last-child { margin-bottom: 0; }

        .label {
            font-size: 0.77rem; font-weight: 600;
            color: var(--ink-600); letter-spacing: 0.01em;
        }

        .label-req { color: var(--indigo); margin-left: 2px; }

        .input {
            width: 100%; padding: 10px 13px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.87rem; color: var(--ink-950);
            background: var(--surface); border: 1.5px solid var(--border);
            border-radius: var(--r-md); outline: none;
            transition: border-color var(--transition), box-shadow var(--transition), background var(--transition);
        }

        .input:focus {
            border-color: var(--border-focus);
            box-shadow: 0 0 0 3px rgba(129,140,248,0.13);
            background: #fff;
        }

        .input::placeholder { color: var(--ink-200); }

        .input.is-error { border-color: var(--error); }
        .input.is-error:focus { box-shadow: 0 0 0 3px rgba(220,38,38,0.10); }

        .input-title {
            font-family: 'Lora', serif;
            font-size: 1.3rem; font-weight: 600;
            color: var(--ink-950); letter-spacing: -0.02em;
            padding: 14px 18px; border-radius: 0; border: none;
            border-bottom: 1.5px solid var(--border-soft);
            transition: border-color var(--transition);
            box-shadow: none;
        }

        .input-title:focus {
            border-bottom-color: var(--indigo-mid);
            box-shadow: none; background: transparent;
        }

        .input-slug {
            font-family: 'DM Sans', monospace;
            font-size: 0.82rem; color: var(--ink-400);
            padding: 8px 14px 8px 0; border: none; border-radius: 0;
            border-bottom: 1.5px solid transparent;
            background: transparent; transition: border-color var(--transition);
        }

        .input-slug:focus { border-bottom-color: var(--indigo-mid); box-shadow: none; background: transparent; }

        .slug-wrap {
            display: flex; align-items: center; gap: 0;
            padding: 0 18px 14px;
        }

        .slug-prefix {
            font-size: 0.82rem; color: var(--ink-200);
            white-space: nowrap; flex-shrink: 0;
        }

        select.input {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='11' height='11' viewBox='0 0 24 24' fill='none' stroke='%23b8becf' stroke-width='2.5'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 34px; appearance: none;
        }

        .field-error { font-size: 0.73rem; color: var(--error); display: flex; align-items: center; gap: 5px; }

        .field-hint { font-size: 0.72rem; color: var(--ink-200); line-height: 1.5; }

        .char-counter { font-size: 0.70rem; color: var(--ink-200); margin-top: 4px; text-align: right; }

        .editor-toolbar {
            display: flex; align-items: center; gap: 2px;
            padding: 8px 12px;
            border-bottom: 1px solid var(--border-soft);
            background: var(--surface-raised);
            flex-wrap: wrap;
        }

        .tb-btn {
            width: 28px; height: 28px; border-radius: 6px;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.78rem; font-weight: 700; color: var(--ink-400);
            transition: background var(--transition), color var(--transition);
            cursor: pointer; flex-shrink: 0;
        }

        .tb-btn:hover { background: var(--border-soft); color: var(--ink-800); }
        .tb-btn.active { background: var(--indigo-light); color: var(--indigo); }

        .tb-sep { width: 1px; height: 18px; background: var(--border); margin: 0 4px; }

        .editor-area {
            min-height: 380px; width: 100%;
            padding: 20px 22px;
            font-family: 'Lora', serif;
            font-size: 1rem; line-height: 1.85;
            color: var(--ink-800);
            outline: none; resize: none;
            border: none; background: transparent;
            transition: color var(--transition);
        }

        .editor-area:focus { color: var(--ink-950); }
        .editor-area[contenteditable=true]:empty:before {
            content: attr(data-placeholder);
            color: var(--ink-100); pointer-events: none;
            font-style: italic;
        }

        .editor-footer {
            display: flex; align-items: center; justify-content: space-between;
            padding: 10px 18px;
            border-top: 1px solid var(--border-soft);
            background: var(--surface-raised);
        }

        .editor-footer-left { display: flex; align-items: center; gap: 10px; }

        .word-count { font-size: 0.70rem; color: var(--ink-200); }

        .mode-toggle {
            display: flex; border-radius: 6px; overflow: hidden;
            border: 1px solid var(--border);
        }

        .mode-btn {
            padding: 5px 10px; font-size: 0.70rem; font-weight: 600;
            color: var(--ink-200); cursor: pointer;
            transition: background var(--transition), color var(--transition);
            border: none; background: var(--surface); font-family: 'DM Sans', sans-serif;
        }

        .mode-btn.active { background: var(--indigo-light); color: var(--indigo); }
        .mode-btn:not(.active):hover { background: var(--surface-hover); color: var(--ink-600); }

        .img-zone {
            border: 1.5px dashed var(--border);
            border-radius: var(--r-lg); overflow: hidden;
            transition: border-color var(--transition), background var(--transition);
            position: relative; cursor: pointer;
        }

        .img-zone:hover, .img-zone.drag-over {
            border-color: var(--indigo-mid);
            background: rgba(129,140,248,0.04);
        }

        .img-zone input[type="file"] {
            position: absolute; inset: 0; opacity: 0;
            cursor: pointer; width: 100%; height: 100%; z-index: 2;
        }

        .img-placeholder {
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            gap: 10px; padding: 28px 20px; text-align: center;
        }

        .img-upload-icon {
            width: 44px; height: 44px; border-radius: 12px;
            background: var(--indigo-light);
            display: flex; align-items: center; justify-content: center;
            color: var(--indigo-mid);
        }

        .img-upload-text { font-size: 0.80rem; font-weight: 600; color: var(--ink-600); }
        .img-upload-hint { font-size: 0.70rem; color: var(--ink-200); }

        .img-preview-wrap { position: relative; display: none; }

        .img-preview-wrap img {
            width: 100%; height: 160px; object-fit: cover; display: block;
        }

        .img-preview-bar {
            position: absolute; bottom: 0; left: 0; right: 0;
            padding: 8px 12px;
            background: linear-gradient(to top, rgba(15,18,37,0.65) 0%, transparent 100%);
            display: flex; align-items: center; justify-content: flex-end; gap: 6px;
        }

        .img-action-btn {
            padding: 4px 10px; border-radius: 5px;
            font-size: 0.72rem; font-weight: 600;
            border: none; cursor: pointer; font-family: 'DM Sans', sans-serif;
            transition: all var(--transition);
        }

        .img-action-btn.change { background: rgba(255,255,255,0.9); color: var(--ink-800); }
        .img-action-btn.remove { background: rgba(220,38,38,0.85); color: #fff; }
        .img-action-btn:hover { transform: translateY(-1px); }

        .status-segment {
            display: flex; border-radius: var(--r-md); overflow: hidden;
            border: 1.5px solid var(--border);
        }

        .seg-opt { flex: 1; position: relative; }
        .seg-opt input[type="radio"] { position: absolute; inset: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%; margin: 0; z-index: 2; }

        .seg-face {
            padding: 9px 8px; text-align: center;
            font-size: 0.78rem; font-weight: 600;
            color: var(--ink-200); cursor: pointer;
            transition: background var(--transition), color var(--transition);
            display: flex; flex-direction: column; align-items: center; gap: 3px;
            position: relative; z-index: 1;
            background: var(--surface);
        }

        .seg-opt input[type="radio"]:checked + .seg-face.draft {
            background: var(--warn-soft); color: var(--warn);
        }

        .seg-opt input[type="radio"]:checked + .seg-face.publish {
            background: var(--success-soft); color: var(--success);
        }

        .seg-icon { font-size: 1rem; }
        .seg-label { font-size: 0.70rem; line-height: 1; }

        .seg-opt:not(:last-child) .seg-face { border-right: 1.5px solid var(--border); }

        .tags-field { display: flex; flex-wrap: wrap; gap: 6px; align-items: center; padding: 8px 10px; background: var(--surface); border: 1.5px solid var(--border); border-radius: var(--r-md); min-height: 42px; cursor: text; transition: border-color var(--transition), box-shadow var(--transition); }

        .tags-field:focus-within { border-color: var(--border-focus); box-shadow: 0 0 0 3px rgba(129,140,248,0.13); }

        .tag-chip { display: inline-flex; align-items: center; gap: 4px; padding: 3px 8px; border-radius: 100px; background: var(--indigo-light); color: var(--indigo); font-size: 0.73rem; font-weight: 600; }

        .tag-chip-remove { background: none; border: none; cursor: pointer; color: var(--indigo); opacity: 0.6; padding: 0; font-size: 0.9rem; line-height: 1; transition: opacity var(--transition); }
        .tag-chip-remove:hover { opacity: 1; }

        .tag-chip-input { border: none; outline: none; font-family: 'DM Sans', sans-serif; font-size: 0.82rem; color: var(--ink-950); min-width: 90px; flex: 1; padding: 2px 0; background: transparent; }

        .action-panel {
            background: var(--surface); border-radius: var(--r-xl);
            border: 1px solid var(--border); box-shadow: var(--shadow-xs);
            padding: 16px;
            display: flex; flex-direction: column; gap: 10px;
        }

        .action-panel .btn { width: 100%; justify-content: center; }

        .action-divider { height: 1px; background: var(--border-soft); }

        .back-link {
            display: flex; align-items: center; gap: 6px;
            font-size: 0.78rem; color: var(--ink-200);
            width: 100%; justify-content: center; padding: 4px;
            transition: color var(--transition);
        }

        .back-link:hover { color: var(--indigo); }

        .alert-error {
            display: flex; align-items: flex-start; gap: 10px;
            padding: 13px 16px; margin-bottom: 20px;
            background: var(--error-soft); border: 1px solid #fecaca;
            border-left: 4px solid var(--error);
            border-radius: var(--r-lg); font-size: 0.80rem; color: var(--error);
        }

        .alert-error-list { list-style: none; }
        .alert-error-list li::before { content: '› '; }

        .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(15,18,37,0.45); z-index: 290; backdrop-filter: blur(3px); }

        .page-footer {
            padding: 16px 28px;
            border-top: 1px solid var(--border);
            background: var(--surface);
            font-size: 0.73rem; color: var(--ink-100);
            display: flex; justify-content: space-between; align-items: center;
        }

        @media (max-width: 1100px) {
            :root { --col-side-w: 270px; }
        }

        @media (max-width: 900px) {
            .editor-grid { grid-template-columns: 1fr; }
            .col-side { position: static; }
        }

        @media (max-width: 768px) {
            :root { --sidebar-w: 240px; }
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); box-shadow: 24px 0 80px rgba(15,18,37,0.25); }
            .sidebar-overlay.active { display: block; }
            .main-wrap { margin-left: 0; }
            .mobile-toggle { display: flex; }
            .topbar { padding: 0 18px; }
            .page-body { padding: 18px; }
            .page-footer { flex-direction: column; gap: 4px; text-align: center; }
        }

        @media (max-width: 480px) {
            .page-body { padding: 14px; }
            .topbar { padding: 0 14px; }
            .save-indicator span { display: none; }
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .col-main { animation: fadeUp 0.4s 0.05s ease both; }
        .col-side  { animation: fadeUp 0.4s 0.15s ease both; }
    </style>
</head>
<body>

<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-mark">
            <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
            </svg>
        </div>
        <div class="brand-copy">
            <span class="brand-name">Portal Berita</span>
            <span class="brand-role">Admin Panel</span>
        </div>
    </div>

    <nav class="sidebar-nav">
        <span class="nav-group-label">Utama</span>
        <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Dashboard
        </a>
        <span class="nav-group-label">Konten</span>
        <a href="{{ route('posts.index') }}" class="nav-item {{ request()->routeIs('posts.*') ? 'active' : '' }}">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            Kelola Berita
        </a>
        <a href="{{ route('categories.index') }}" class="nav-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
            Kategori
        </a>
        <span class="nav-group-label">Akun</span>
        <a href="{{ route('profile.edit') }}" class="nav-item {{ request()->routeIs('profile.*') ? 'active' : '' }}">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            Profil &amp; Pengaturan
        </a>
    </nav>

    <div class="sidebar-user">
        <div class="user-card">
            <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
            <div class="user-info">
                <span class="user-name">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="user-logout-btn">
                        <svg width="11" height="11" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7"/></svg>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

<div class="main-wrap">

    <header class="topbar">
        <div class="topbar-left">
            <button class="mobile-toggle" onclick="openSidebar()" aria-label="Buka navigasi">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <nav class="breadcrumb">
                <a href="{{ route('posts.index') }}">Berita</a>
                <span class="breadcrumb-sep">›</span>
                <span class="breadcrumb-current">Tulis Baru</span>
            </nav>
        </div>
        <div class="topbar-right">
            <div class="save-indicator" id="saveIndicator">
                <div class="save-dot" id="saveDot"></div>
                <span id="saveText">Belum ada perubahan</span>
            </div>
        </div>
    </header>

    <main class="page-body">

        <div class="page-header">
            <h1 class="page-title">
                Tulis Berita Baru
                <span class="page-title-badge">Draft</span>
            </h1>
        </div>

        @if($errors->any())
        <div class="alert-error">
            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="flex-shrink:0; margin-top:1px;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
            <ul class="alert-error-list">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form
            method="POST"
            action="{{ route('posts.store') }}"
            enctype="multipart/form-data"
            id="postForm"
            oninput="markDirty()"
        >
            @csrf

            <div class="editor-grid">

                <div class="col-main">

                    <div class="panel" style="overflow:visible;">
                        <input
                            type="text"
                            name="title"
                            id="titleInput"
                            class="input input-title"
                            value="{{ old('title') }}"
                            placeholder="Judul berita yang menarik…"
                            required
                            oninput="handleTitleInput(this.value); updateCharCount(this.value, 'titleCounter', 120)"
                            autocomplete="off"
                        />
                        <div class="slug-wrap">
                            <span class="slug-prefix">portal.com/berita/</span>
                            <input
                                type="text"
                                name="slug"
                                id="slugInput"
                                class="input input-slug"
                                value="{{ old('slug') }}"
                                placeholder="slug-otomatis"
                                autocomplete="off"
                                oninput="slugManuallyEdited = true"
                                style="width:100%;"
                            />
                        </div>
                        <div style="padding: 0 18px 12px; display:flex; justify-content:space-between; align-items:center;">
                            <span class="field-hint">Slug URL artikel (auto-generate dari judul)</span>
                            <span class="char-counter" id="titleCounter">0 / 120</span>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-hd">
                            <div class="panel-hd-icon">
                                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                            </div>
                            <span class="panel-hd-title">Isi Konten</span>
                            <div style="margin-left:auto; display:flex; align-items:center; gap:6px;">
                                <div class="mode-toggle">
                                    <button type="button" class="mode-btn active" id="btnVisual" onclick="switchMode('visual')">Visual</button>
                                    <button type="button" class="mode-btn" id="btnMarkdown" onclick="switchMode('markdown')">Markdown</button>
                                </div>
                            </div>
                        </div>

                        <div id="toolbarVisual" class="editor-toolbar">
                            <button type="button" class="tb-btn" onclick="fmt('bold')" title="Tebal"><b>B</b></button>
                            <button type="button" class="tb-btn" onclick="fmt('italic')" title="Miring"><i>I</i></button>
                            <button type="button" class="tb-btn" onclick="fmt('underline')" title="Garis bawah"><u>U</u></button>
                            <div class="tb-sep"></div>
                            <button type="button" class="tb-btn" onclick="fmt('formatBlock','h2')" title="Judul H2" style="font-size:0.70rem; font-weight:800;">H2</button>
                            <button type="button" class="tb-btn" onclick="fmt('formatBlock','h3')" title="Judul H3" style="font-size:0.70rem; font-weight:800;">H3</button>
                            <div class="tb-sep"></div>
                            <button type="button" class="tb-btn" onclick="fmt('insertUnorderedList')" title="Daftar bulat">
                                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><circle cx="3" cy="6" r="1" fill="currentColor"/><circle cx="3" cy="12" r="1" fill="currentColor"/><circle cx="3" cy="18" r="1" fill="currentColor"/></svg>
                            </button>
                            <button type="button" class="tb-btn" onclick="fmt('insertOrderedList')" title="Daftar angka">
                                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><line x1="10" y1="6" x2="21" y2="6"/><line x1="10" y1="12" x2="21" y2="12"/><line x1="10" y1="18" x2="21" y2="18"/><path d="M4 6h1v4" stroke="currentColor" stroke-width="1.5"/><path d="M4 10h2" stroke="currentColor" stroke-width="1.5"/><path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1" stroke="currentColor" stroke-width="1.5"/></svg>
                            </button>
                            <div class="tb-sep"></div>
                            <button type="button" class="tb-btn" onclick="insertLink()" title="Tautan">
                                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                            </button>
                            <button type="button" class="tb-btn" onclick="fmt('formatBlock','blockquote')" title="Kutipan">
                                <svg width="13" height="13" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.748-9.57 8.983-10.609l.995 2.151c-2.433.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 8.983-10.609l.995 2.151c-2.433.917-3.995 3.638-3.995 5.849h3.983v10h-9.966z"/></svg>
                            </button>
                        </div>

                        <div
                            id="editorVisual"
                            class="editor-area"
                            contenteditable="true"
                            data-placeholder="Mulai menulis isi berita di sini… gunakan toolbar di atas untuk memformat teks."
                            oninput="syncToHidden(); countWords()"
                        ></div>

                        <textarea
                            id="editorMarkdown"
                            class="editor-area"
                            name="body_markdown"
                            placeholder="# Judul&#10;&#10;Tulis konten dalam format Markdown di sini…"
                            style="display:none; font-family: 'Geist Mono', 'Fira Code', monospace; font-size:0.85rem;"
                            oninput="syncMarkdownToHidden(); countWords()"
                        >{{ old('body_markdown') }}</textarea>

                        <textarea name="body" id="bodyHidden" style="display:none;">{{ old('body') }}</textarea>

                        <div class="editor-footer">
                            <div class="editor-footer-left">
                                <span class="word-count" id="wordCount">0 kata</span>
                                <span style="color:var(--border); font-size:0.75rem;">·</span>
                                <span class="word-count" id="readTime">0 menit baca</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-side">

                    <div class="action-panel">
                        <button type="submit" name="status_submit" value="published" class="btn btn-primary" onclick="setStatus('published')">
                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            Publish Sekarang
                        </button>
                        <button type="submit" name="status_submit" value="draft" class="btn btn-draft" onclick="setStatus('draft')">
                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                            Simpan sebagai Draft
                        </button>
                        <input type="hidden" name="status" id="statusInput" value="draft" />
                        <div class="action-divider"></div>
                        <a href="{{ route('posts.index') }}" class="back-link">
                            <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            Kembali ke Daftar Berita
                        </a>
                    </div>

                    <div class="panel">
                        <div class="panel-hd">
                            <div class="panel-hd-icon">
                                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                            </div>
                            <span class="panel-hd-title">Kategori</span>
                        </div>
                        <div class="panel-bd">
                            <div class="field" style="margin-bottom:0;">
                                <label class="label" for="category_id">Pilih Kategori <span class="label-req">*</span></label>
                                <select name="category_id" id="category_id" class="input" required>
                                    <option value="">— Pilih Kategori —</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-hd">
                            <div class="panel-hd-icon">
                                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <span class="panel-hd-title">Gambar Utama</span>
                        </div>
                        <div class="panel-bd">
                            <div class="img-zone" id="imgZone">
                                <input type="file" name="image" id="imageInput" accept="image/jpeg,image/png,image/webp,image/gif" onchange="handleImageChange(this)" />
                                <div class="img-placeholder" id="imgPlaceholder">
                                    <div class="img-upload-icon">
                                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                    </div>
                                    <p class="img-upload-text">Klik atau seret gambar</p>
                                    <p class="img-upload-hint">JPG, PNG, WebP · Maks 2 MB</p>
                                </div>
                                <div class="img-preview-wrap" id="imgPreviewWrap">
                                    <img id="imgPreview" src="" alt="Preview" />
                                    <div class="img-preview-bar">
                                        <button type="button" class="img-action-btn change" onclick="triggerFileInput()">Ganti</button>
                                        <button type="button" class="img-action-btn remove" onclick="removeImage()">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-hd">
                            <div class="panel-hd-icon">
                                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 8v4l3 3"/></svg>
                            </div>
                            <span class="panel-hd-title">Status Publikasi</span>
                        </div>
                        <div class="panel-bd">
                            <div class="status-segment">
                                <label class="seg-opt">
                                    <input type="radio" name="status_display" value="draft" checked onchange="syncStatusDisplay(this.value)" />
                                    <div class="seg-face draft">
                                        <span class="seg-icon">📝</span>
                                        <span class="seg-label">Draft</span>
                                    </div>
                                </label>
                                <label class="seg-opt">
                                    <input type="radio" name="status_display" value="published" onchange="syncStatusDisplay(this.value)" />
                                    <div class="seg-face publish">
                                        <span class="seg-icon">🌐</span>
                                        <span class="seg-label">Publish</span>
                                    </div>
                                </label>
                            </div>
                            <p class="field-hint" style="margin-top:8px;" id="statusHint">Post disimpan sebagai draft — tidak tampil di publik.</p>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-hd">
                            <div class="panel-hd-icon">
                                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/></svg>
                            </div>
                            <span class="panel-hd-title">Tag</span>
                        </div>
                        <div class="panel-bd">
                            <div class="tags-field" id="tagsField" onclick="document.getElementById('tagTextInput').focus()">
                                <input
                                    type="text"
                                    id="tagTextInput"
                                    class="tag-chip-input"
                                    placeholder="Ketik tag lalu Enter…"
                                    onkeydown="handleTagKey(event)"
                                />
                            </div>
                            <input type="hidden" name="tags" id="tagsHidden" value="{{ old('tags') }}" />
                            <p class="field-hint" style="margin-top:6px;">Enter atau koma untuk menambah tag.</p>
                        </div>
                    </div>

                </div>

            </div>

        </form>
    </main>

    <footer class="page-footer">
        <span>&copy; {{ date('Y') }} Portal Berita</span>
        <span>Admin Panel</span>
    </footer>
</div>

<script>
    let slugManuallyEdited = false;
    let isDirty = false;
    const tagList = [];

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

    function toSlug(s) {
        return s.toLowerCase().trim()
            .replace(/[àáâãäå]/g,'a').replace(/[èéêë]/g,'e')
            .replace(/[ìíîï]/g,'i').replace(/[òóôõö]/g,'o')
            .replace(/[ùúûü]/g,'u').replace(/[ñ]/g,'n')
            .replace(/[^a-z0-9\s-]/g,'')
            .replace(/\s+/g,'-').replace(/-+/g,'-');
    }

    function handleTitleInput(val) {
        if (!slugManuallyEdited) {
            document.getElementById('slugInput').value = toSlug(val);
        }
        document.getElementById('postForm').querySelector('.page-title-badge').textContent =
            document.querySelector('[name="status_display"]:checked').value === 'published' ? 'Publish' : 'Draft';
    }

    function updateCharCount(val, targetId, max) {
        const el = document.getElementById(targetId);
        const len = val.length;
        el.textContent = len + ' / ' + max;
        el.style.color = len > max ? 'var(--error)' : 'var(--ink-200)';
    }

    function markDirty() {
        if (!isDirty) {
            isDirty = true;
            document.getElementById('saveDot').className = 'save-dot dirty';
            document.getElementById('saveText').textContent = 'Ada perubahan belum tersimpan';
        }
    }

    function markSaved() {
        isDirty = false;
        document.getElementById('saveDot').className = 'save-dot saved';
        document.getElementById('saveText').textContent = 'Perubahan tersimpan';
    }

    function syncToHidden() {
        const content = document.getElementById('editorVisual').innerHTML;
        document.getElementById('bodyHidden').value = content;
        markDirty();
    }

    function syncMarkdownToHidden() {
        const content = document.getElementById('editorMarkdown').value;
        document.getElementById('bodyHidden').value = content;
        markDirty();
    }

    function countWords() {
        const isMarkdown = document.getElementById('editorMarkdown').style.display !== 'none';
        const raw = isMarkdown
            ? document.getElementById('editorMarkdown').value
            : document.getElementById('editorVisual').innerText || '';
        const words = raw.trim() ? raw.trim().split(/\s+/).length : 0;
        const mins = Math.ceil(words / 200);
        document.getElementById('wordCount').textContent = words + ' kata';
        document.getElementById('readTime').textContent = (mins || 1) + ' menit baca';
    }

    let currentMode = 'visual';

    function switchMode(mode) {
        currentMode = mode;
        const visual = document.getElementById('editorVisual');
        const markdown = document.getElementById('editorMarkdown');
        const toolbar = document.getElementById('toolbarVisual');
        const btnV = document.getElementById('btnVisual');
        const btnM = document.getElementById('btnMarkdown');

        if (mode === 'visual') {
            visual.style.display = '';
            markdown.style.display = 'none';
            toolbar.style.display = '';
            btnV.classList.add('active');
            btnM.classList.remove('active');
        } else {
            visual.style.display = 'none';
            markdown.style.display = '';
            toolbar.style.display = 'none';
            btnM.classList.add('active');
            btnV.classList.remove('active');
        }
    }

    function fmt(cmd, val) {
        document.execCommand(cmd, false, val || null);
        document.getElementById('editorVisual').focus();
        syncToHidden();
    }

    function insertLink() {
        const url = prompt('Masukkan URL tautan:');
        if (url) fmt('createLink', url);
    }

    function handleImageChange(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file melebihi 2 MB. Pilih gambar yang lebih kecil.');
                input.value = '';
                return;
            }
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imgPreview').src = e.target.result;
                document.getElementById('imgPlaceholder').style.display = 'none';
                document.getElementById('imgPreviewWrap').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }

    function triggerFileInput() {
        document.getElementById('imageInput').click();
    }

    function removeImage() {
        document.getElementById('imgPreview').src = '';
        document.getElementById('imgPlaceholder').style.display = '';
        document.getElementById('imgPreviewWrap').style.display = 'none';
        document.getElementById('imageInput').value = '';
    }

    const imgZone = document.getElementById('imgZone');
    imgZone.addEventListener('dragover', function(e) { e.preventDefault(); this.classList.add('drag-over'); });
    imgZone.addEventListener('dragleave', function() { this.classList.remove('drag-over'); });
    imgZone.addEventListener('drop', function(e) {
        e.preventDefault(); this.classList.remove('drag-over');
        const file = e.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) {
            const dt = new DataTransfer();
            dt.items.add(file);
            document.getElementById('imageInput').files = dt.files;
            handleImageChange(document.getElementById('imageInput'));
        }
    });

    function setStatus(val) {
        document.getElementById('statusInput').value = val;
        document.getElementById('bodyHidden').value = document.getElementById('editorVisual').innerHTML;
    }

    function syncStatusDisplay(val) {
        document.getElementById('statusInput').value = val;
        const hint = document.getElementById('statusHint');
        if (val === 'published') {
            hint.textContent = 'Post akan langsung tampil di halaman publik.';
        } else {
            hint.textContent = 'Post disimpan sebagai draft — tidak tampil di publik.';
        }
        markDirty();
    }

    function handleTagKey(e) {
        if (e.key === 'Enter' || e.key === ',') {
            e.preventDefault();
            const val = e.target.value.replace(',', '').trim();
            if (val && !tagList.includes(val)) {
                tagList.push(val);
                renderTags();
            }
            e.target.value = '';
        }
        if (e.key === 'Backspace' && !e.target.value && tagList.length) {
            tagList.pop();
            renderTags();
        }
    }

    function renderTags() {
        const field = document.getElementById('tagsField');
        const input = document.getElementById('tagTextInput');
        field.querySelectorAll('.tag-chip').forEach(function(el) { el.remove(); });
        tagList.forEach(function(tag) {
            const chip = document.createElement('span');
            chip.className = 'tag-chip';
            chip.innerHTML = tag + '<button type="button" class="tag-chip-remove" onclick="removeTag(\'' + tag + '\')">×</button>';
            field.insertBefore(chip, input);
        });
        document.getElementById('tagsHidden').value = tagList.join(',');
        markDirty();
    }

    function removeTag(tag) {
        const idx = tagList.indexOf(tag);
        if (idx > -1) { tagList.splice(idx, 1); renderTags(); }
    }

    document.getElementById('postForm').addEventListener('submit', function() {
        if (currentMode === 'visual') {
            document.getElementById('bodyHidden').value = document.getElementById('editorVisual').innerHTML;
        }
        markSaved();
    });

    document.getElementById('titleInput').dispatchEvent(new Event('input'));
</script>
</body>
</html>