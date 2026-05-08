@extends('front.layout.template')

@push('meta-seo')
    <meta name="description" content="Articles - Inkwell - A personal journal app to express your thoughts, capture memories, and organize ideas effortlessly.">
    <meta name="keyword" content="Articles, Inkwell, journal, Personal journal">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:title" content="Inkwell Blog - Articles">
    <meta property="og:site_name" content="Inkwell">
    <meta property="og:description" content="Articles - Inkwell - A personal journal app to express your thoughts, capture memories, and organize ideas effortlessly.">
    <meta property="og:image" content="{{asset('front/image/inkwell-logo.jpg')}}">
@endpush

@section('title', 'Inkwell Blog - Articles')

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

/* Search */
.ink-search-wrap {
    margin-bottom: 40px;
}
.ink-search-form {
    display: flex;
    gap: 0;
    border: 1px solid var(--ink-border);
    border-radius: 8px;
    overflow: hidden;
    background: var(--ink-surface);
}
.ink-search-form input {
    flex: 1;
    border: none;
    outline: none;
    padding: 12px 18px;
    font-size: .9rem;
    background: transparent;
    color: var(--ink-text);
    font-family: inherit;
}
.ink-search-form input::placeholder { color: var(--ink-muted); }
.ink-search-form button {
    background: var(--ink-accent);
    color: #fff;
    border: none;
    padding: 12px 24px;
    font-size: .85rem;
    font-weight: 600;
    cursor: pointer;
    transition: background .2s;
}
.ink-search-form button:hover { background: var(--ink-accent-hover); }

/* Divider */
.ink-divider { display: flex; align-items: center; gap: 16px; margin-bottom: 36px; padding-bottom: 16px; border-bottom: 1px solid var(--ink-border); }
.ink-divider-label { font-size: .68rem; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: var(--ink-accent); white-space: nowrap; }
.ink-divider-line { flex: 1; height: 1px; background: var(--ink-border); }
.ink-divider-date { font-size: .75rem; color: var(--ink-muted); white-space: nowrap; }

/* Grid */
.ink-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-bottom: 40px; }
.ink-card { background: var(--ink-surface); border: 1px solid var(--ink-border); border-radius: 10px; overflow: hidden; display: flex; flex-direction: column; transition: transform .25s, box-shadow .25s, border-color .25s; text-decoration: none; color: inherit; }
.ink-card:hover { transform: translateY(-3px); box-shadow: 0 10px 28px -12px rgba(0,0,0,.14); border-color: #d6d3ca; }
.ink-card-img { aspect-ratio: 16/9; overflow: hidden; background: var(--ink-soft); }
.ink-card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s ease; }
.ink-card:hover .ink-card-img img { transform: scale(1.04); }
.ink-card-body { padding: 18px 20px 22px; display: flex; flex-direction: column; flex: 1; }
.ink-card-meta { font-size: .73rem; color: var(--ink-muted); margin-bottom: 8px; display: flex; align-items: center; flex-wrap: wrap; gap: 0; }
.ink-card-meta span + span::before { content: "·"; margin: 0 6px; }
.ink-card-meta a { color: var(--ink-muted); text-decoration: none; }
.ink-card-meta a:hover { color: var(--ink-accent); }
.ink-card-title { font-family: Georgia, serif; font-size: 1.05rem; line-height: 1.35; font-weight: 700; color: var(--ink-text); margin: 0 0 8px; }
.ink-card-excerpt { font-size: .85rem; line-height: 1.65; color: var(--ink-muted); margin: 0 0 16px; flex: 1; }
.ink-readmore { display: inline-flex; align-items: center; gap: 6px; font-size: .82rem; font-weight: 600; color: var(--ink-accent); text-decoration: none; border-bottom: 1px solid transparent; transition: border-color .2s, color .2s; margin-top: auto; }
.ink-readmore:hover { color: var(--ink-accent-hover); border-bottom-color: var(--ink-accent-hover); }
.ink-readmore-arrow { display: inline-block; transition: transform .2s; }
.ink-readmore:hover .ink-readmore-arrow { transform: translateX(4px); }

/* Empty */
.ink-empty { background: var(--ink-surface); border: 1px dashed var(--ink-border); border-radius: 12px; padding: 56px 24px; text-align: center; margin-bottom: 40px; grid-column: 1/-1; }
.ink-empty h3 { font-family: Georgia, serif; margin: 0 0 8px; color: var(--ink-text); }
.ink-empty p { color: var(--ink-muted); margin: 0; font-size: .9rem; }

/* Search result label */
.ink-search-result { font-family: Georgia, serif; font-size: 1.1rem; color: var(--ink-text); margin-bottom: 16px; }
.ink-search-result b { color: var(--ink-accent); }
.ink-back-btn { display: inline-flex; align-items: center; gap: 6px; font-size: .8rem; font-weight: 600; color: var(--ink-muted); text-decoration: none; border: 1px solid var(--ink-border); padding: 6px 14px; border-radius: 6px; margin-bottom: 24px; transition: all .2s; }
.ink-back-btn:hover { border-color: var(--ink-accent); color: var(--ink-accent); }

/* Pagination */
.ink-pagination { display: flex; justify-content: center; margin-top: 8px; }
.ink-pagination .pagination { gap: 4px; }
.ink-pagination .page-link { color: var(--ink-text); border: 1px solid var(--ink-border); border-radius: 8px !important; padding: 7px 13px; font-size: .84rem; background: var(--ink-surface); transition: border-color .2s, color .2s; }
.ink-pagination .page-link:hover { border-color: var(--ink-accent); color: var(--ink-accent); }
.ink-pagination .page-item.active .page-link { background: var(--ink-accent); border-color: var(--ink-accent); color: #fff; }

@media (max-width: 860px) { .ink-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 540px) { .ink-grid { grid-template-columns: 1fr; } .ink-page { padding: 24px 16px 56px; } }
</style>
@endpush

@section('content')
<div class="ink-page">

    {{-- Divider header --}}
    <div class="ink-divider">
        <span class="ink-divider-label">Inkwell · All Articles</span>
        <span class="ink-divider-line"></span>
        <span class="ink-divider-date">{{ now()->format('d F Y') }}</span>
    </div>

    {{-- Search --}}
    <div class="ink-search-wrap">
        <form action="{{route('search')}}" method="POST" class="ink-search-form">
            @csrf
            <input type="text" name="search" placeholder="Search articles..."/>
            <button type="submit">Search →</button>
        </form>
    </div>

    {{-- Search result label --}}
    @if($search)
        <p class="ink-search-result">Search results for <b>"{{ $search }}"</b></p>
        <a href="{{url('/articles')}}" class="ink-back-btn">← Back to all articles</a>
    @endif

    {{-- Articles grid --}}
    <div class="ink-grid">
        @forelse ($articles as $article)
        <div class="ink-card" data-aos="fade-up" data-aos-duration="700">
            <a href="{{url('post/'.$article->slug)}}" class="ink-card-img">
                <img src="{{asset('storage/back/'.$article->image)}}"
                     alt="{{$article->title}}" loading="lazy">
            </a>
            <div class="ink-card-body">
                <div class="ink-card-meta">
                    <span>{{$article->created_at->format('d F Y')}}</span>
                    <span><a href="{{url('category/'.$article->Category->slug)}}">{{$article->Category->name}}</a></span>
                    <span>By {{$article->User->name}}</span>
                </div>
                <h4 class="ink-card-title">{{$article->title}}</h4>
                <p class="ink-card-excerpt">{{ Str::limit(strip_tags($article->desc), 120) }}</p>
                <a href="{{url('post/'.$article->slug)}}" class="ink-readmore">
                    Read more <span class="ink-readmore-arrow">→</span>
                </a>
            </div>
        </div>
        @empty
        <div class="ink-empty">
            <h3>No articles found</h3>
            <p>
                @if($search)
                    No results for "{{ $search }}". Try a different keyword.
                @else
                    Articles will appear here once published.
                @endif
            </p>
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
@endsection
