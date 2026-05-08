@extends('front.layout.template')

@push('meta-seo')
    <meta name="description" content="Inkwell - A personal journal app to express your thoughts, capture memories, and organize ideas effortlessly. Secure, user-friendly, and feature-packed to inspire your creativity. Start your journaling journey today!">
    <meta name="keyword" content="journal, Personal journal, personal journal app, journal app, personal journaling, Personal Journaling App,inkwell">
    {{-- meta social --}}
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:title" content="Inkwell - Personal Journaling App">
    <meta property="og:site_name" content="Inkwell">
    <meta property="og:description" content="Inkwell - A personal journal app to express your thoughts, capture memories, and organize ideas effortlessly. Secure, user-friendly, and feature-packed to inspire your creativity. Start your journaling journey today!">
    <meta property="og:image" content="{{asset('front/image/inkwell-logo.jpg')}}">
@endpush

@section('title', 'Inkwell')

@push('css')
<style>
:root {
    --ink-bg: #f8f7f4;
    --ink-surface: #ffffff;
    --ink-border: #e9e7e1;
    --ink-text: #1c1917;
    --ink-muted: #78716c;
    --ink-accent: #c2410c;
    --ink-accent-hover: #9a330a;
    --ink-soft: #f0ede7;
}
body { background: var(--ink-bg); }
.ink-page { max-width: 1180px; margin: 0 auto; padding: 40px 20px 80px; }

/* Divider header */
.ink-divider { display: flex; align-items: center; gap: 16px; margin-bottom: 36px; padding-bottom: 16px; border-bottom: 1px solid var(--ink-border); }
.ink-divider-label { font-size: .68rem; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: var(--ink-accent); white-space: nowrap; }
.ink-divider-line { flex: 1; height: 1px; background: var(--ink-border); }
.ink-divider-date { font-size: .75rem; color: var(--ink-muted); white-space: nowrap; }

/* Featured */
.ink-hero { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center; margin-bottom: 56px; background: var(--ink-surface); border: 1px solid var(--ink-border); border-radius: 12px; overflow: hidden; }
.ink-hero-img { aspect-ratio: 4/3; overflow: hidden; }
.ink-hero-img img { width: 100%; height: 100%; object-fit: cover; transition: transform .6s ease; }
.ink-hero:hover .ink-hero-img img { transform: scale(1.03); }
.ink-hero-body { padding: 36px 36px 36px 0; }
.ink-tag { display: inline-block; font-size: .65rem; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; color: var(--ink-accent); margin-bottom: 12px; }
.ink-hero-meta { font-size: .78rem; color: var(--ink-muted); margin-bottom: 14px; display: flex; flex-wrap: wrap; gap: 0; align-items: center; }
.ink-hero-meta span + span::before { content: "·"; margin: 0 8px; }
.ink-hero-meta a { color: var(--ink-muted); text-decoration: none; }
.ink-hero-meta a:hover { color: var(--ink-accent); }
.ink-hero-title { font-family: Georgia, serif; font-size: 1.9rem; line-height: 1.25; font-weight: 700; color: var(--ink-text); margin: 0 0 14px; }
.ink-hero-excerpt { font-size: .93rem; line-height: 1.75; color: #44403c; margin: 0 0 24px; }
.ink-readmore { display: inline-flex; align-items: center; gap: 6px; font-size: .85rem; font-weight: 600; color: var(--ink-accent); text-decoration: none; border-bottom: 1px solid transparent; transition: border-color .2s, color .2s; }
.ink-readmore:hover { color: var(--ink-accent-hover); border-bottom-color: var(--ink-accent-hover); }
.ink-readmore-arrow { display: inline-block; transition: transform .2s; }
.ink-readmore:hover .ink-readmore-arrow { transform: translateX(4px); }

/* Section header */
.ink-section-head { display: flex; align-items: center; gap: 14px; margin-bottom: 24px; }
.ink-section-head h3 { font-family: Georgia, serif; font-size: 1.2rem; font-weight: 700; margin: 0; white-space: nowrap; color: var(--ink-text); }
.ink-section-head .line { flex: 1; height: 1px; background: var(--ink-border); }

/* Grid */
.ink-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; margin-bottom: 40px; }
.ink-card { background: var(--ink-surface); border: 1px solid var(--ink-border); border-radius: 10px; overflow: hidden; display: flex; flex-direction: column; transition: transform .25s, box-shadow .25s, border-color .25s; }
.ink-card:hover { transform: translateY(-3px); box-shadow: 0 10px 28px -12px rgba(0,0,0,.14); border-color: #d6d3ca; }
.ink-card-img { aspect-ratio: 16/9; overflow: hidden; background: var(--ink-soft); }
.ink-card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s ease; }
.ink-card:hover .ink-card-img img { transform: scale(1.04); }
.ink-card-body { padding: 18px 20px 22px; display: flex; flex-direction: column; flex: 1; }
.ink-card-meta { font-size: .73rem; color: var(--ink-muted); margin-bottom: 8px; display: flex; align-items: center; gap: 0; }
.ink-card-meta span + span::before { content: "·"; margin: 0 6px; }
.ink-card-meta a { color: var(--ink-muted); text-decoration: none; }
.ink-card-meta a:hover { color: var(--ink-accent); }
.ink-card-title { font-family: Georgia, serif; font-size: 1.05rem; line-height: 1.35; font-weight: 700; color: var(--ink-text); margin: 0 0 8px; }
.ink-card-excerpt { font-size: .85rem; line-height: 1.65; color: var(--ink-muted); margin: 0 0 16px; flex: 1; }
.ink-card-footer { display: flex; align-items: center; justify-content: space-between; margin-top: auto; }
.ink-chip { display: inline-block; font-size: .65rem; font-weight: 600; padding: 3px 10px; background: var(--ink-soft); color: #57534e; border-radius: 999px; letter-spacing: .05em; text-transform: uppercase; text-decoration: none; }
.ink-chip:hover { background: #e5e1d8; color: var(--ink-accent); }

/* Empty */
.ink-empty { background: var(--ink-surface); border: 1px dashed var(--ink-border); border-radius: 12px; padding: 56px 24px; text-align: center; margin-bottom: 40px; }
.ink-empty h3 { font-family: Georgia, serif; margin: 0 0 8px; color: var(--ink-text); }
.ink-empty p { color: var(--ink-muted); margin: 0; font-size: .9rem; }

/* Pagination */
.ink-pagination { display: flex; justify-content: center; margin-top: 8px; }
.ink-pagination .pagination { gap: 4px; }
.ink-pagination .page-link { color: var(--ink-text); border: 1px solid var(--ink-border); border-radius: 8px !important; padding: 7px 13px; font-size: .84rem; background: var(--ink-surface); transition: border-color .2s, color .2s; }
.ink-pagination .page-link:hover { border-color: var(--ink-accent); color: var(--ink-accent); }
.ink-pagination .page-item.active .page-link { background: var(--ink-accent); border-color: var(--ink-accent); color: #fff; }

/* Responsive */
@media (max-width: 860px) {
    .ink-hero { grid-template-columns: 1fr; }
    .ink-hero-body { padding: 24px; }
    .ink-hero-title { font-size: 1.5rem; }
}
@media (max-width: 640px) {
    .ink-grid { grid-template-columns: 1fr; }
    .ink-page { padding: 24px 16px 56px; }
}
</style>
@endpush

@section('content')
<div class="ink-page">

    {{-- Divider header --}}
    <div class="ink-divider">
        <span class="ink-divider-label">Inkwell · Journal</span>
        <span class="ink-divider-line"></span>
        <span class="ink-divider-date">{{ now()->format('d F Y') }}</span>
    </div>

    {{-- Featured article --}}
    @if($latest_article)
    <div class="ink-hero" data-aos="fade-up" data-aos-duration="800">
        <a href="{{url('post/'.$latest_article->slug)}}" class="ink-hero-img">
            <img src="{{asset('storage/back/'.$latest_article->image)}}" alt="{{$latest_article->title}}" loading="lazy">
        </a>
        <div class="ink-hero-body">
            <span class="ink-tag">Featured</span>
            <div class="ink-hero-meta">
                <span>{{$latest_article->created_at->format('d F Y')}}</span>
                <span><a href="{{url('category/'.$latest_article->Category->slug)}}">{{$latest_article->Category->name}}</a></span>
                <span>By {{$latest_article->User->name}}</span>
            </div>
            <h2 class="ink-hero-title">{{$latest_article->title}}</h2>
            <p class="ink-hero-excerpt">{{ Str::limit(strip_tags($latest_article->desc), 300) }}</p>
            <a href="{{url('post/'.$latest_article->slug)}}" class="ink-readmore">
                Read more <span class="ink-readmore-arrow">&#8594;</span>
            </a>
        </div>
    </div>
    @else
    <div class="ink-empty">
        <h3>Belum ada artikel</h3>
        <p>Artikel akan muncul di sini setelah dipublikasikan.</p>
    </div>
    @endif

    {{-- Latest articles --}}
    <div class="ink-section-head">
        <h3>Latest Articles</h3>
        <span class="line"></span>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="ink-grid">
                @forelse ($articles as $article)
                <div class="ink-card" data-aos="fade-up" data-aos-duration="700">
                    <a href="{{url('post/'.$article->slug)}}" class="ink-card-img">
                        <img src="{{asset('storage/back/'.$article->image)}}" alt="{{$article->title}}" loading="lazy">
                    </a>
                    <div class="ink-card-body">
                        <div class="ink-card-meta">
                            <span>{{$article->created_at->format('d F Y')}}</span>
                            <span><a href="{{url('category/'.$article->Category->slug)}}">{{$article->Category->name}}</a></span>
                        </div>
                        <h4 class="ink-card-title">{{$article->title}}</h4>
                        <p class="ink-card-excerpt">{{ Str::limit(strip_tags($article->desc), 140) }}</p>
                        <div class="ink-card-footer">
                            <span class="ink-chip">By {{$article->User->name}}</span>
                            <a href="{{url('post/'.$article->slug)}}" class="ink-readmore" style="font-size:.82rem;">
                                Read <span class="ink-readmore-arrow">&#8594;</span>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="ink-empty" style="grid-column:1/-1;">
                    <h3>Belum ada artikel lain</h3>
                    <p>Cek lagi nanti — penulis kami sedang menyiapkan tulisan baru.</p>
                </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if($articles->count())
            <div class="ink-pagination">
                {{ $articles->onEachSide(1)->links() }}
            </div>
            @endif
        </div>

        {{-- Side widgets --}}
        @include('front.layout.side-widget')
    </div>

</div>
@endsection
