@extends('layouts.app')

@section('title', $header->title ?? 'VIGILA - Videovigilancia')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
@include('partials.sidebar-styles')
<style>
    .sl-cover-story {
        position: relative;
        min-height: 550px;
        border-radius: 8px;
        overflow: hidden;
        background: #000;
        box-shadow: 0 10px 25px rgba(0,0,0,.15);
        border: 1px solid #334155;
    }

    .sl-cover-story > img {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.85;
    }

    .sl-cover-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(15,23,42,.2) 20%, rgba(15,23,42,.95) 100%);
    }

    .sl-cover-label {
        position: absolute;
        top: 20px;
        left: 20px;
        background: rgba(220, 38, 38, 0.9);
        color: white;
        font-weight: 700;
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 13px;
        letter-spacing: 1px;
        display: flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 2px 10px rgba(220, 38, 38, 0.4);
    }
    
    .sl-cover-label::before {
        content: '';
        display: block;
        width: 8px;
        height: 8px;
        background: #fff;
        border-radius: 50%;
        animation: pulse-red 1.5s infinite;
    }

    @keyframes pulse-red {
        0% { transform: scale(0.95); opacity: 0.5; }
        50% { transform: scale(1.2); opacity: 1; }
        100% { transform: scale(0.95); opacity: 0.5; }
    }

    .sl-cover-content {
        position: absolute;
        bottom: 35px;
        left: 35px;
        right: 35px;
        color: white;
    }

    .sl-cover-content h2 {
        font-family: 'Inter', sans-serif;
        font-size: clamp(24px, 3vw, 38px);
        line-height: 1.2;
        font-weight: 800;
        max-width: 900px;
        text-shadow: 0 2px 8px rgba(0,0,0,0.8);
        margin-bottom: 12px;
    }

    .sl-cover-content p {
        max-width: 850px;
        margin: 0 0 20px 0;
        font-size: 16px;
        color: #cbd5e1;
        text-shadow: 0 1px 4px rgba(0,0,0,0.8);
        line-height: 1.6;
    }

    .sl-read-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--aws-blue);
        color: white;
        padding: 12px 24px;
        border-radius: 6px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
        border: 1px solid rgba(255,255,255,0.1);
    }

    .sl-read-button:hover {
        background: #005a93;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 115, 187, 0.4);
    }

    .sl-latest-grid {
        background: white;
        margin-top: 24px;
        padding: 24px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        border: 1px solid #e2e8f0;
    }

    .sl-content-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px solid var(--aws-orange);
        padding-bottom: 12px;
        margin-bottom: 20px;
    }

    .sl-content-heading h2 { font-size: 20px; font-weight: 800; margin: 0; color: var(--text-dark); }
    .sl-content-heading a { color: var(--aws-blue); font-size: 13px; font-weight: 600; text-decoration: none; }
    .sl-content-heading a:hover { text-decoration: underline; }

    .sl-news-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }

    .sl-news-card {
        display: grid;
        grid-template-columns: 140px 1fr;
        gap: 16px;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 16px;
        cursor: pointer;
        transition: transform 0.2s;
    }
    
    .sl-news-card:hover {
        transform: translateX(4px);
    }

    .sl-news-card img { width: 140px; height: 100px; object-fit: cover; border-radius: 6px; border: 1px solid #e2e8f0; }
    .sl-news-card span { font-size: 11px; color: var(--aws-orange); font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; }
    .sl-news-card h3 { font-size: 16px; font-weight: 700; line-height: 1.3; margin: 6px 0; color: var(--text-dark); }
    .sl-news-card p { font-size: 13px; color: #64748b; margin-bottom: 8px; line-height: 1.5; }
    .sl-news-card a { display: inline-block; color: var(--aws-blue); font-size: 13px; font-weight: 600; text-decoration: none; }
    .sl-news-card a:hover { color: #005a93; }

    @media (max-width: 1150px) {
        .sl-cover-story { min-height: 420px; }
    }

    @media (max-width: 800px) {
        .sl-cover-story { min-height: 380px; }
        .sl-cover-content { left: 18px; right: 18px; bottom: 25px; }
        .sl-news-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
@php
    $coverNews = $featuredNews->first() ?? $latestNews->first();
    $gridNews = $latestNews->reject(fn ($news) => $coverNews && $news->id === $coverNews->id)->take(4);
@endphp

<div class="sl-page-container">

    <!-- COLUMNA IZQUIERDA -->
    @include('partials.sidebar-left')

    <!-- PORTADA CENTRAL -->
    <section class="sl-main-column">
        @if($coverNews)
            <article class="sl-cover-story">
                @if($coverNews->image)
                    <img src="{{ asset('storage/' . $coverNews->image) }}" alt="{{ $coverNews->title }}">
                @else
                    <img src="https://via.placeholder.com/1600x900/003d2b/FFFFFF?text=Semanario+Loretano" alt="{{ $coverNews->title }}">
                @endif
                <div class="sl-cover-overlay"></div>
                <span class="sl-cover-label">EN VIVO - MONITOREO</span>

                <div class="sl-cover-content">
                    <h2>{{ $coverNews->title }}</h2>
                    <p>{{ Str::limit($coverNews->summary, 200) }}</p>
                    <a class="sl-read-button" href="{{ route('news.show', $coverNews) }}">Ver grabación →</a>
                </div>
            </article>
        @endif

        <section class="sl-latest-grid">
            <div class="sl-content-heading">
                <h2>CÁMARAS ACTIVAS</h2>
                <a href="{{ route('news.public') }}">Ver todas →</a>
            </div>

            <div class="sl-news-grid">
                @forelse($gridNews as $news)
                    <article class="sl-news-card" onclick="window.location='{{ route('news.show', $news) }}'">
                        @if($news->image)
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
                        @else
                            <img src="https://via.placeholder.com/270x220/235347/FFFFFF?text=Cámara" alt="{{ $news->title }}">
                        @endif
                        <div>
                            @if($news->category)
                                <span>{{ Str::upper($news->category) }}</span>
                            @endif
                            <h3>{{ $news->title }}</h3>
                            <p>{{ Str::limit($news->summary, 90) }}</p>
                            <a href="{{ route('news.show', $news) }}">Visualizar →</a>
                        </div>
                    </article>
                @empty
                    <p class="text-muted mb-0">No hay cámaras conectadas en este momento.</p>
                @endforelse
            </div>
        </section>
    </section>

    <!-- COLUMNA DERECHA -->
    @include('partials.sidebar-right')

</div>


<!-- PIE DE PÁGINA -->
<footer class="mt-4 py-3 rounded" style="background: #0f171e; color: white;">
    <div class="container text-center">
        <small>© {{ date('Y') }} {{ $header->title ?? 'VIGILA Cloud Security' }} | AWS Infrastructure | Contacto: aws@vigila.com</small>
        <div class="mt-2 d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('pages.about') }}" style="color: white; text-decoration: none;">Acerca de la Infraestructura</a>
            <a href="{{ route('pages.contact') }}" style="color: white; text-decoration: none;">Soporte Técnico</a>
        </div>
    </div>
</footer>
@endsection