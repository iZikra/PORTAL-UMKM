<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Portal UMKM')); ?> - Layanan Pengaduan UMKM</title>
    <meta name="description" content="Platform terpadu untuk membantu, mendukung, dan memajukan Usaha Mikro, Kecil, dan Menengah di seluruh Indonesia.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --primary-light: #818cf8;
            --secondary: #06b6d4;
            --accent: #f59e0b;
            --success: #10b981;
            --bg: #f8fafc;
            --text: #1e293b;
            --text-muted: #64748b;
            --white: #ffffff;
            --card-bg: rgba(255,255,255,0.85);
            --border: rgba(99,102,241,0.15);
            --shadow: 0 4px 6px -1px rgba(0,0,0,0.07), 0 2px 4px -2px rgba(0,0,0,0.05);
            --shadow-lg: 0 20px 40px -10px rgba(79,70,229,0.25);
        }

        html { scroll-behavior: smooth; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            padding: 0 2rem;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(79,70,229,0.1);
            box-shadow: 0 1px 20px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        .navbar-logo {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: white;
            font-weight: 800;
            box-shadow: 0 4px 12px rgba(79,70,229,0.35);
        }
        .navbar-brand-text {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text);
            letter-spacing: -0.3px;
        }
        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            list-style: none;
        }
        .navbar-nav a {
            text-decoration: none;
            color: var(--text-muted);
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0.45rem 0.85rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .navbar-nav a:hover {
            color: var(--primary);
            background: rgba(79,70,229,0.07);
        }
        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .btn-ghost {
            padding: 0.45rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-muted);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .btn-ghost:hover { color: var(--primary); background: rgba(79,70,229,0.07); }
        .btn-primary {
            padding: 0.5rem 1.15rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(135deg, var(--primary), #6366f1);
            text-decoration: none;
            border-radius: 9px;
            box-shadow: 0 4px 12px rgba(79,70,229,0.3);
            transition: all 0.25s ease;
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(79,70,229,0.4);
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        }

        /* Mobile hamburger */
        .hamburger { display: none; background: none; border: none; cursor: pointer; padding: 6px; }
        .hamburger span { display: block; width: 22px; height: 2px; background: var(--text); margin: 5px 0; border-radius: 2px; transition: all 0.3s; }
        .mobile-menu { display: none; position: fixed; top: 68px; left: 0; right: 0; background: rgba(255,255,255,0.97); backdrop-filter: blur(20px); border-bottom: 1px solid var(--border); padding: 1rem 2rem 1.5rem; z-index: 999; }
        .mobile-menu.open { display: block; }
        .mobile-menu a { display: block; padding: 0.65rem 0; font-size: 0.95rem; font-weight: 500; color: var(--text-muted); text-decoration: none; border-bottom: 1px solid rgba(0,0,0,0.04); }
        .mobile-menu a:hover { color: var(--primary); }
        .mobile-menu .mobile-actions { display: flex; gap: 0.75rem; margin-top: 1rem; }

        /* ===== HERO ===== */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding: 7rem 2rem 4rem;
            background: linear-gradient(145deg, #eef2ff 0%, #e0e7ff 30%, #dbeafe 60%, #e0f2fe 100%);
        }
        .hero::before {
            content: '';
            position: absolute;
            top: -15%;
            right: -10%;
            width: 600px; height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(99,102,241,0.18) 0%, transparent 70%);
            animation: blobFloat 8s ease-in-out infinite;
        }
        .hero::after {
            content: '';
            position: absolute;
            bottom: -10%;
            left: -5%;
            width: 500px; height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(6,182,212,0.15) 0%, transparent 70%);
            animation: blobFloat 10s ease-in-out infinite reverse;
        }
        @keyframes blobFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(20px, -20px) scale(1.05); }
            66% { transform: translate(-15px, 15px) scale(0.95); }
        }
        .hero-grid-bg {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(99,102,241,0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(99,102,241,0.04) 1px, transparent 1px);
            background-size: 50px 50px;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 800px;
            animation: fadeInUp 0.9s ease both;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(79,70,229,0.1);
            color: var(--primary);
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            border: 1px solid rgba(79,70,229,0.2);
            margin-bottom: 1.5rem;
            letter-spacing: 0.3px;
        }
        .hero-badge::before { content: 'star'; font-family: 'Material Icons'; font-size: 0.75rem; }
        .hero-title {
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 900;
            line-height: 1.1;
            letter-spacing: -1.5px;
            color: var(--text);
            margin-bottom: 1.25rem;
        }
        .hero-title span {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .hero-subtitle {
            font-size: 1.1rem;
            color: var(--text-muted);
            max-width: 580px;
            margin: 0 auto 2.5rem;
            line-height: 1.75;
            font-weight: 400;
        }
        .hero-cta {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        .btn-hero-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.9rem 2rem;
            font-size: 1rem;
            font-weight: 700;
            color: white;
            background: linear-gradient(135deg, var(--primary), #6366f1);
            text-decoration: none;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(79,70,229,0.35);
            transition: all 0.3s ease;
        }
        .btn-hero-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(79,70,229,0.45);
        }
        .btn-hero-secondary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.9rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            color: var(--primary);
            background: rgba(79,70,229,0.08);
            text-decoration: none;
            border-radius: 12px;
            border: 1.5px solid rgba(79,70,229,0.2);
            transition: all 0.3s ease;
        }
        .btn-hero-secondary:hover {
            background: rgba(79,70,229,0.15);
            border-color: rgba(79,70,229,0.4);
            transform: translateY(-2px);
        }
        .hero-stats {
            display: flex;
            gap: 2.5rem;
            justify-content: center;
            margin-top: 3.5rem;
            flex-wrap: wrap;
        }
        .stat-item { text-align: center; }
        .stat-number {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: -1px;
        }
        .stat-label {
            font-size: 0.8rem;
            color: var(--text-muted);
            font-weight: 500;
            margin-top: 2px;
        }
        .stat-divider { width: 1px; background: rgba(99,102,241,0.2); align-self: stretch; }

        /* ===== FEATURES SECTION ===== */
        .section { padding: 5rem 2rem; }
        .section-header { text-align: center; margin-bottom: 3.5rem; }
        .section-label {
            display: inline-block;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: 1.5px;
            text-transform: uppercase;
            background: rgba(79,70,229,0.08);
            padding: 0.35rem 1rem;
            border-radius: 50px;
            margin-bottom: 1rem;
        }
        .section-title {
            font-size: clamp(1.75rem, 4vw, 2.5rem);
            font-weight: 800;
            color: var(--text);
            letter-spacing: -0.8px;
            margin-bottom: 0.75rem;
        }
        .section-subtitle {
            font-size: 1rem;
            color: var(--text-muted);
            max-width: 500px;
            margin: 0 auto;
        }
        .features-bg { background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%); }
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            max-width: 1100px;
            margin: 0 auto;
        }
        .feature-card {
            background: var(--card-bg);
            border: 1px solid rgba(255,255,255,0.9);
            border-radius: 20px;
            padding: 2rem;
            backdrop-filter: blur(12px);
            box-shadow: var(--shadow);
            transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            overflow: hidden;
        }
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            border-radius: 20px 20px 0 0;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .feature-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-lg); }
        .feature-card:hover::before { opacity: 1; }
        .card-red::before { background: linear-gradient(90deg, #ef4444, #f97316); }
        .card-blue::before { background: linear-gradient(90deg, #3b82f6, #06b6d4); }
        .card-green::before { background: linear-gradient(90deg, #10b981, #34d399); }
        .card-icon {
            width: 52px; height: 52px;
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1.25rem;
        }
        .icon-red { background: linear-gradient(135deg, #fef2f2, #fee2e2); }
        .icon-blue { background: linear-gradient(135deg, #eff6ff, #dbeafe); }
        .icon-green { background: linear-gradient(135deg, #f0fdf4, #dcfce7); }
        .card-title { font-size: 1.1rem; font-weight: 700; color: var(--text); margin-bottom: 0.6rem; letter-spacing: -0.2px; }
        .card-text { font-size: 0.9rem; color: var(--text-muted); line-height: 1.7; }

        /* ===== HOW IT WORKS ===== */
        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            max-width: 900px;
            margin: 0 auto;
        }
        .step-card {
            text-align: center;
            padding: 2rem 1.5rem;
            background: white;
            border-radius: 20px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }
        .step-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); }
        .step-number {
            width: 48px; height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), #6366f1);
            color: white;
            font-size: 1.1rem;
            font-weight: 800;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1rem;
            box-shadow: 0 4px 12px rgba(79,70,229,0.3);
        }
        .step-title { font-size: 0.95rem; font-weight: 700; color: var(--text); margin-bottom: 0.5rem; }
        .step-text { font-size: 0.83rem; color: var(--text-muted); line-height: 1.6; }

        /* ===== CTA SECTION ===== */
        .cta-section {
            padding: 5rem 2rem;
            background: linear-gradient(135deg, var(--primary) 0%, #6366f1 50%, var(--secondary) 100%);
            position: relative; overflow: hidden; text-align: center;
        }
        .cta-section::before {
            content: ''; position: absolute; top: -50%; left: -20%;
            width: 500px; height: 500px; border-radius: 50%;
            background: rgba(255,255,255,0.06);
        }
        .cta-section::after {
            content: ''; position: absolute; bottom: -30%; right: -10%;
            width: 400px; height: 400px; border-radius: 50%;
            background: rgba(255,255,255,0.05);
        }
        .cta-content { position: relative; z-index: 2; }
        .cta-title { font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 800; color: white; margin-bottom: 1rem; letter-spacing: -0.8px; }
        .cta-subtitle { font-size: 1rem; color: rgba(255,255,255,0.8); margin-bottom: 2rem; max-width: 500px; margin-left: auto; margin-right: auto; }
        .btn-cta-white {
            display: inline-flex; align-items: center; gap: 0.5rem;
            padding: 0.9rem 2.25rem; font-size: 1rem; font-weight: 700;
            color: var(--primary); background: white; text-decoration: none;
            border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        }
        .btn-cta-white:hover { transform: translateY(-3px); box-shadow: 0 14px 32px rgba(0,0,0,0.2); }

        /* ===== FOOTER ===== */
        .footer { background: #0f172a; color: rgba(255,255,255,0.6); padding: 3rem 2rem 2rem; }
        .footer-inner { max-width: 1100px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1.5rem; }
        .footer-brand { display: flex; align-items: center; gap: 10px; }
        .footer-logo { width: 32px; height: 32px; border-radius: 8px; background: linear-gradient(135deg, var(--primary), var(--secondary)); display: flex; align-items: center; justify-content: center; font-size: 14px; color: white; font-weight: 800; }
        .footer-brand-name { color: white; font-weight: 600; font-size: 0.95rem; }
        .footer-links { display: flex; gap: 1.5rem; flex-wrap: wrap; }
        .footer-links a { color: rgba(255,255,255,0.5); text-decoration: none; font-size: 0.85rem; transition: color 0.2s; }
        .footer-links a:hover { color: rgba(255,255,255,0.9); }
        .footer-copy { font-size: 0.8rem; text-align: center; margin-top: 2rem; border-top: 1px solid rgba(255,255,255,0.07); padding-top: 1.5rem; }

        /* ===== ANIMATIONS ===== */
        .animate-on-scroll { opacity: 0; transform: translateY(30px); transition: opacity 0.7s ease, transform 0.7s ease; }
        .animate-on-scroll.visible { opacity: 1; transform: translateY(0); }
        .delay-1 { transition-delay: 0.1s; }
        .delay-2 { transition-delay: 0.2s; }
        .delay-3 { transition-delay: 0.3s; }
        .delay-4 { transition-delay: 0.4s; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .navbar-nav, .navbar-actions { display: none; }
            .hamburger { display: block; }
            .hero { padding: 6rem 1.25rem 3rem; }
            .hero-stats { gap: 1.5rem; }
            .stat-divider { display: none; }
            .section { padding: 3.5rem 1.25rem; }
            .cards-grid { grid-template-columns: 1fr; gap: 1rem; }
            .steps-grid { grid-template-columns: 1fr 1fr; }
            .footer-inner { flex-direction: column; text-align: center; }
        }
        @media (max-width: 480px) {
            .steps-grid { grid-template-columns: 1fr; }
            .hero-cta { flex-direction: column; align-items: center; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar" id="navbar">
        <a href="<?php echo e(route('home')); ?>" class="navbar-brand">
            <div class="navbar-logo">U</div>
            <span class="navbar-brand-text">Portal UMKM</span>
        </a>

        <ul class="navbar-nav">
            <li><a href="<?php echo e(route('home')); ?>">Beranda</a></li>
            <li><a href="<?php echo e(route('knowledge-base.public')); ?>">Basis Pengetahuan</a></li>
            <li><a href="<?php echo e(route('faq.public')); ?>">FAQ</a></li>
        </ul>

        <div class="navbar-actions">
            <a href="<?php echo e(route('login')); ?>" class="btn-ghost">Log in</a>
            <?php if(Route::has('register')): ?>
                <a href="<?php echo e(route('register')); ?>" class="btn-primary">Daftar Gratis &rarr;</a>
            <?php endif; ?>
        </div>

        <button class="hamburger" id="hamburgerBtn" aria-label="Menu">
            <span></span><span></span><span></span>
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <a href="<?php echo e(route('home')); ?>">Beranda</a>
        <a href="<?php echo e(route('knowledge-base.public')); ?>">Basis Pengetahuan</a>
        <a href="<?php echo e(route('faq.public')); ?>">FAQ</a>
        <div class="mobile-actions">
            <a href="<?php echo e(route('login')); ?>" class="btn-ghost">Log in</a>
            <?php if(Route::has('register')): ?>
                <a href="<?php echo e(route('register')); ?>" class="btn-primary">Daftar Sekarang</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-grid-bg"></div>
        <div class="hero-content">
            <div class="hero-badge">&#10022; Platform UMKM Indonesia Terpercaya</div>
            <h1 class="hero-title">
                Portal Layanan<br>
                <span>UMKM Indonesia</span>
            </h1>
            <p class="hero-subtitle">
                Platform terpadu untuk membantu, mendukung, dan memajukan
                Usaha Mikro, Kecil, dan Menengah di seluruh Indonesia.
            </p>
            <div class="hero-cta">
                <a href="<?php echo e(route('register')); ?>" class="btn-hero-primary">
                    &#128640; Daftar Sekarang &mdash; Gratis
                </a>
                <a href="<?php echo e(route('knowledge-base.public')); ?>" class="btn-hero-secondary">
                    &#128218; Lihat Panduan
                </a>
            </div>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">10K+</div>
                    <div class="stat-label">UMKM Terdaftar</div>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Kepuasan Pengguna</div>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Layanan Aktif</div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="section features-bg">
        <div class="section-header animate-on-scroll">
            <div class="section-label">&#10022; Fitur Unggulan</div>
            <h2 class="section-title">Kenapa Pilih Portal UMKM?</h2>
            <p class="section-subtitle">Semua yang Anda butuhkan untuk mengembangkan bisnis dalam satu platform.</p>
        </div>
        <div class="cards-grid">
            <div class="feature-card card-red animate-on-scroll delay-1">
                <div class="card-icon icon-red">
                    <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#ef4444" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="card-title">Mudah &amp; Cepat</h3>
                <p class="card-text">Laporkan masalah atau berikan masukan hanya dalam beberapa langkah melalui formulir yang intuitif dan ramah pengguna.</p>
            </div>

            <div class="feature-card card-blue animate-on-scroll delay-2">
                <div class="card-icon icon-blue">
                    <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#3b82f6" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                </div>
                <h3 class="card-title">Transparan &amp; Terpantau</h3>
                <p class="card-text">Lacak status pengaduan Anda secara real-time hingga mendapatkan tanggapan resmi dari pihak berwenang.</p>
            </div>

            <div class="feature-card card-green animate-on-scroll delay-3">
                <div class="card-icon icon-green">
                    <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#10b981" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="card-title">Solusi Tepat Sasaran</h3>
                <p class="card-text">Dapatkan tanggapan dan solusi langsung dari pihak berwenang untuk membantu menyelesaikan masalah bisnis Anda.</p>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section class="section" style="background: white;">
        <div class="section-header animate-on-scroll">
            <div class="section-label">&#10022; Cara Kerja</div>
            <h2 class="section-title">Hanya 4 Langkah Mudah</h2>
            <p class="section-subtitle">Mulai manfaatkan layanan Portal UMKM dengan langkah-langkah sederhana berikut.</p>
        </div>
        <div class="steps-grid">
            <div class="step-card animate-on-scroll delay-1">
                <div class="step-number">1</div>
                <div class="step-title">Buat Akun</div>
                <p class="step-text">Daftar gratis dengan email aktif Anda dalam hitungan menit.</p>
            </div>
            <div class="step-card animate-on-scroll delay-2">
                <div class="step-number">2</div>
                <div class="step-title">Isi Formulir</div>
                <p class="step-text">Lengkapi formulir pengaduan atau pertanyaan Anda dengan detail.</p>
            </div>
            <div class="step-card animate-on-scroll delay-3">
                <div class="step-number">3</div>
                <div class="step-title">Pantau Status</div>
                <p class="step-text">Lacak perkembangan pengaduan Anda secara real-time di dashboard.</p>
            </div>
            <div class="step-card animate-on-scroll delay-4">
                <div class="step-number">4</div>
                <div class="step-title">Terima Solusi</div>
                <p class="step-text">Dapatkan notifikasi dan solusi langsung dari pihak berwenang.</p>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="cta-section">
        <div class="cta-content animate-on-scroll">
            <h2 class="cta-title">Siap Memajukan Bisnis Anda?</h2>
            <p class="cta-subtitle">Bergabunglah dengan ribuan UMKM yang sudah merasakan manfaat Platform Portal UMKM.</p>
            <a href="<?php echo e(route('register')); ?>" class="btn-cta-white">
                &#127919; Mulai Sekarang &mdash; Gratis
            </a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-inner">
            <div class="footer-brand">
                <div class="footer-logo">U</div>
                <span class="footer-brand-name">Portal UMKM</span>
            </div>
            <div class="footer-links">
                <a href="<?php echo e(route('home')); ?>">Beranda</a>
                <a href="<?php echo e(route('knowledge-base.public')); ?>">Basis Pengetahuan</a>
                <a href="<?php echo e(route('faq.public')); ?>">FAQ</a>
                <a href="<?php echo e(route('login')); ?>">Masuk</a>
                <?php if(Route::has('register')): ?>
                    <a href="<?php echo e(route('register')); ?>">Daftar</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="footer-inner footer-copy">
            &copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'Portal UMKM')); ?>. All Rights Reserved.
            Dibuat dengan &#10084; untuk UMKM Indonesia.
        </div>
    </footer>

    <script>
        // Hamburger menu toggle
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        hamburgerBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
        });
        document.addEventListener('click', (e) => {
            if (!hamburgerBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.remove('open');
            }
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            navbar.style.boxShadow = window.scrollY > 20
                ? '0 4px 30px rgba(0,0,0,0.1)'
                : '0 1px 20px rgba(0,0,0,0.06)';
        });

        // Scroll animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('visible');
            });
        }, { threshold: 0.15 });
        document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
    </script>
</body>
</html>
<?php /**PATH C:\Users\GF 63\proyek-multi-auth\resources\views/welcome.blade.php ENDPATH**/ ?>