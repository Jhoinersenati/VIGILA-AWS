<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'VIGILA - Videovigilancia Cloud')</title>
    @yield('open-graph')
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-bg: #f8fafc;
            --aws-dark: #232f3e;
            --aws-orange: #ff9900;
            --aws-blue: #0073bb;
            --text-dark: #1e293b;
            --text-light: #f8fafc;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: var(--primary-bg);
            color: var(--text-dark);
        }
        
        .navbar-custom {
            background: var(--aws-dark);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 12px 0;
        }
        
        .navbar-custom .navbar-nav {
            width: 100%;
        }

        .navbar-custom .nav-link {
            color: rgba(255,255,255,0.85) !important;
            transition: all 0.2s ease-in-out;
            padding: 10px 16px !important;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.95rem;
        }
        
        .navbar-custom .nav-link:hover {
            color: var(--aws-orange) !important;
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        .btn-gold {
            background: var(--aws-orange);
            color: #fff;
            border: none;
            transition: all 0.3s;
            font-weight: 600;
        }
        
        .btn-gold:hover {
            background: #e38800;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 153, 0, 0.3);
        }
        
        .news-card {
            border-left: 4px solid var(--aws-blue);
            background: white;
            transition: all 0.3s;
            cursor: pointer;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        
        .news-card:hover {
            border-left-color: var(--primary-green);
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transform: translateX(5px);
        }
        
        .weather-widget {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            color: white;
            border-radius: 15px;
            padding: 20px;
        }
        
        .bg-soft-green {
            background: linear-gradient(135deg, #f0f4ec, #e8ede4);
        }
        
        .sidebar-link {
            color: #333;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s;
            margin-bottom: 5px;
        }
        
        .sidebar-link:hover {
            background: var(--primary-green);
            color: white;
            transform: translateX(5px);
        }
        
        .sidebar-link.active {
            background: var(--primary-green);
            color: white;
        }
        
        .sidebar-link i {
            font-size: 1.2rem;
            width: 24px;
        }
        
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s;
            border-left: 4px solid var(--accent-gold);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .navbar-toggler {
            border-color: rgba(255,255,255,0.5);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.9)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .navbar-news-ticker {
            min-width: 0;
            max-width: 340px;
            margin-left: auto;
            color: rgba(255,255,255,0.9);
        }

        .navbar-news-date {
            font-size: 0.75rem;
            white-space: nowrap;
        }

        .navbar-news-window {
            max-width: 100%;
            overflow: hidden;
            white-space: nowrap;
        }

        .navbar-news-track {
            display: inline-flex;
            gap: 2rem;
            min-width: max-content;
            animation: navbar-news-scroll 48s linear infinite;
        }

        .navbar-news-item {
            display: inline-block;
            font-size: 0.75rem;
        }

        @keyframes navbar-news-scroll {
            from { transform: translateX(100%); }
            to { transform: translateX(-100%); }
        }

        @media (prefers-reduced-motion: reduce) {
            .navbar-news-track {
                animation: none;
            }
        }

        .site-header-band {
            position: relative;
            min-height: 280px;
            overflow: hidden;
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            border-bottom: 4px solid var(--aws-orange);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .site-header-band::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(15, 23, 42, 0.7);
            z-index: 5;
        }

        .site-header-band .header-band-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            animation: header-band-slider 18s infinite;
        }

        .site-header-band .header-band-image:nth-child(1) { animation-delay: 0s; }
        .site-header-band .header-band-image:nth-child(2) { animation-delay: 6s; }
        .site-header-band .header-band-image:nth-child(3) { animation-delay: 12s; }

        @keyframes header-band-slider {
            0% { opacity: 0; }
            5% { opacity: 0.8; }
            30% { opacity: 0.8; }
            35% { opacity: 0; }
            100% { opacity: 0; }
        }

        @media (prefers-reduced-motion: reduce) {
            .site-header-band .header-band-image {
                animation: none;
                opacity: 0.5;
            }
        }

        .site-header-band .header-band-inner {
            position: relative;
            max-width: 1000px;
            margin: auto;
            z-index: 10;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .site-header-band .header-band-logo {
            width: auto;
            border-radius: 8px;
            object-fit: contain;
            flex-shrink: 0;
            margin-bottom: 10px;
        }

        .site-header-band .header-band-text {
            width: 100%;
        }

        .site-header-band h1 {
            font-family: 'Inter', sans-serif;
            font-size: clamp(32px, 5vw, 48px);
            color: #ffffff;
            font-weight: 800;
            letter-spacing: -1px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.8);
            margin: 0;
        }

        .site-header-band .header-band-subtitle {
            font-weight: 700;
            letter-spacing: 2px;
            font-size: 1.1rem;
            color: var(--aws-orange);
            text-transform: uppercase;
            text-shadow: 0 2px 8px rgba(0,0,0,0.8);
            margin-top: 10px;
        }

        .site-header-band .header-band-description {
            font-size: 1.1rem;
            color: #e2e8f0;
            text-shadow: 0 2px 8px rgba(0,0,0,0.8);
            margin-top: 15px;
            line-height: 1.6;
            margin-bottom: 0;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        @media (max-width: 767.98px) {
            .site-header-band {
                min-height: 190px;
            }
        }
    </style>
    
    @yield('styles')
</head>
<body>
    @php
        $header = App\Models\Header::first();
        $latestNavbarNews = App\Models\News::whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();
        $navbarSections = App\Models\Section::where('show_in_nav', true)
            ->orderBy('title')
            ->get();
    @endphp

    <!-- Encabezado principal -->
    @guest
        <header class="site-header-band">
            @foreach([$header->image ?? null, $header->image_2 ?? null, $header->image_3 ?? null] as $slide)
                @if($slide)
                    <img src="{{ asset('storage/' . $slide) }}" alt="{{ $header->title }}" class="header-band-image">
                @endif
            @endforeach
            <div class="header-band-inner">
                @if($header && $header->navbar_logo)
                    <img src="{{ asset('storage/' . $header->navbar_logo) }}" alt="{{ $header->title }}" class="header-band-logo" style="height: {{ $header->navbar_logo_height ?? 70 }}px;">
                @endif
                <div class="header-band-text">
                    <h1>{{ $header->title ?? 'VIGILA Cloud Security' }}</h1>
                    @if($header && $header->subtitle)
                        <p class="header-band-subtitle">{{ $header->subtitle }}</p>
                    @endif
                    <p class="header-band-description">
                        {{ $header->description ?? 'Plataforma centralizada de videovigilancia en la nube. Monitoreo, almacenamiento y gestión en tiempo real con tecnología AWS.' }}
                    </p>
                </div>
            </div>
        </header>
    @endguest

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="bi bi-display"></i> Centro de Monitoreo
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news.public') }}">
                            <i class="bi bi-camera-video"></i> Grabaciones (S3/Glacier)
                        </a>
                    </li>
                    @foreach($navbarSections as $navbarSection)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sections.show', $navbarSection) }}">
                                {{ $navbarSection->title }}
                            </a>
                        </li>
                    @endforeach
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i> Salir
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item navbar-news-ticker">
                            <div class="navbar-news-date text-end">
                                📅
                                {{ now()->translatedFormat('l, d \d\e F \d\e Y') }}
                            </div>
                            @if($latestNavbarNews->isNotEmpty())
                                <div class="navbar-news-window" aria-label="Últimas cámaras">
                                    <div class="navbar-news-track">
                                        @foreach($latestNavbarNews as $latestNews)
                                            <span class="navbar-news-item">
                                                📰 {{ $latestNews->title }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main>
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>