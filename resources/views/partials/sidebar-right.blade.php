<aside class="sl-right-column">
    <section class="sl-side-card sl-latest-card">
        <div class="sl-right-title">
            <h2>▣ &nbsp; ALARMAS Y EVENTOS</h2>
            <a href="{{ route('news.public') }}">Ver todas →</a>
        </div>

        @forelse($latestNews as $news)
            <article class="sl-right-news" onclick="window.location='{{ route('news.show', $news) }}'">
                @if($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
                @else
                    <img src="https://via.placeholder.com/200x150/235347/FFFFFF?text=Cámara" alt="{{ $news->title }}">
                @endif
                <div>
                    <h3>{{ $news->title }}</h3>
                    <small>{{ $news->published_at->translatedFormat('d \d\e F \d\e Y') }}</small>
                </div>
            </article>
        @empty
            <p class="text-muted mb-0">Sistema en funcionamiento normal. 0 eventos.</p>
        @endforelse
    </section>

    @forelse($sidebarAds as $ad)
        <section class="sl-advertising">
            @if($ad->link)
                <a href="{{ $ad->link }}" target="_blank">
                    @if($ad->image)
                        <img src="{{ asset('storage/' . $ad->image) }}" alt="{{ $ad->title }}">
                    @else
                        <img src="https://via.placeholder.com/300x200/e67e22/FFFFFF?text={{ urlencode($ad->title) }}" alt="{{ $ad->title }}">
                    @endif
                </a>
            @else
                @if($ad->image)
                    <img src="{{ asset('storage/' . $ad->image) }}" alt="{{ $ad->title }}">
                @else
                    <img src="https://via.placeholder.com/300x200/e67e22/FFFFFF?text={{ urlencode($ad->title) }}" alt="{{ $ad->title }}">
                @endif
            @endif
            <p class="mt-2 mb-0 small">{{ $ad->description ?? $ad->title }}</p>
        </section>
    @empty
        <section class="sl-advertising">
            <div class="sl-ad-icon">📣</div>
            <h2>ESTADO ALMACENAMIENTO AWS</h2>
            <p><strong>Amazon S3 Standard:</strong> 450 GB<br><strong>Amazon S3 Glacier:</strong> 1.2 TB</p>
            <a href="#">Ver métricas CloudWatch</a>
        </section>
    @endforelse
</aside>
