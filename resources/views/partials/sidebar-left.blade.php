@php
    $analysisSection = $sections->first(fn ($section) => str_contains(mb_strtolower($section->title), 'anali'));
    $techSection = $sections->first(fn ($section) => str_contains(mb_strtolower($section->title), 'tecno'));
@endphp

<aside class="sl-left-column">
    @if($analysisSection && $analysisSection->news->isNotEmpty())
        @php($analysisNews = $analysisSection->news->first())
        <section class="sl-side-card">
            <div class="sl-section-title green">
                <span>â–£</span> ANALIZANDO
                <a href="{{ route('sections.show', $analysisSection) }}" style="color:white;"><b>â€º</b></a>
            </div>
            <article class="sl-mini-article">
                @if($analysisNews->image)
                    <img src="{{ asset('storage/' . $analysisNews->image) }}" alt="{{ $analysisNews->title }}">
                @else
                    <img src="https://placehold.co/400x300/112233/112233" alt="{{ $analysisNews->title }}">
                @endif
                <div>
                    <h3>{{ $analysisNews->title }}</h3>
                    <p>{{ Str::limit($analysisNews->summary, 100) }}</p>
                    <a href="{{ route('news.show', $analysisNews) }}">Leer mÃ¡s â†’</a>
                </div>
            </article>
        </section>
    @endif

    @if($techSection && $techSection->news->isNotEmpty())
        @php($techNews = $techSection->news->first())
        <section class="sl-side-card">
            <div class="sl-section-title blue">
                <span>â–£</span> TECNOLOGÃA
                <a href="{{ route('sections.show', $techSection) }}" style="color:white;"><b>â€º</b></a>
            </div>
            <article class="sl-mini-article">
                @if($techNews->image)
                    <img src="{{ asset('storage/' . $techNews->image) }}" alt="{{ $techNews->title }}">
                @else
                    <img src="https://placehold.co/400x300/112233/112233" alt="{{ $techNews->title }}">
                @endif
                <div>
                    <h3>{{ $techNews->title }}</h3>
                    <p>{{ Str::limit($techNews->summary, 100) }}</p>
                    <a href="{{ route('news.show', $techNews) }}">Leer mÃ¡s â†’</a>
                </div>
            </article>
        </section>
    @endif
</aside>


