@extends('front.layout.template')

@push('meta-seo')
    <meta name="author" content="{{$article->user->name}}">
    <meta name="description" content="{{Str::limit(strip_tags($article->desc), 50)}}">
    <meta name="keyword" content="{{$article->title .' - Inkwell'}}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:title" content="{{$article->title .' - Inkwell'}}">
    <meta property="og:site_name" content="Inkwell">
    <meta property="og:description" content="{{Str::limit(strip_tags($article->desc), 50)}}">
    <meta property="og:image" content="{{asset('storage/back/'.$article->image)}}">
@endpush

@section('title', $article->title .' - Inkwell')

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

/* Article layout */
.ink-article-wrap { max-width: 720px; }

/* Back link */
.ink-back {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: .8rem;
    color: var(--ink-muted);
    text-decoration: none;
    margin-bottom: 32px;
    transition: color .2s;
}
.ink-back:hover { color: var(--ink-accent); }

/* Category tag */
.ink-tag {
    display: inline-block;
    font-size: .65rem;
    font-weight: 700;
    letter-spacing: .16em;
    text-transform: uppercase;
    color: var(--ink-accent);
    text-decoration: none;
    margin-bottom: 16px;
    transition: color .2s;
}
.ink-tag:hover { color: var(--ink-accent-hover); }

/* Title */
.ink-article-title {
    font-family: Georgia, serif;
    font-size: clamp(1.8rem, 4vw, 2.6rem);
    font-weight: 700;
    line-height: 1.2;
    color: var(--ink-text);
    margin: 0 0 20px;
    letter-spacing: -.02em;
}

/* Meta */
.ink-article-meta {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 0;
    font-size: .8rem;
    color: var(--ink-muted);
    padding-bottom: 24px;
    border-bottom: 1px solid var(--ink-border);
    margin-bottom: 32px;
}
.ink-article-meta span + span::before { content: "·"; margin: 0 10px; }
.ink-article-meta a { color: var(--ink-muted); text-decoration: none; }
.ink-article-meta a:hover { color: var(--ink-accent); }

/* Featured image */
.ink-article-img {
    width: 100%;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 36px;
    border: 1px solid var(--ink-border);
}
.ink-article-img img {
    width: 100%;
    max-height: 480px;
    object-fit: cover;
    display: block;
}

/* Article body */
.ink-article-body {
    font-size: 1rem;
    line-height: 1.85;
    color: #292524;
}
.ink-article-body h1,
.ink-article-body h2,
.ink-article-body h3 {
    font-family: Georgia, serif;
    color: var(--ink-text);
    margin: 32px 0 14px;
    line-height: 1.3;
}
.ink-article-body p { margin-bottom: 20px; }
.ink-article-body img {
    max-width: 100%;
    border-radius: 8px;
    margin: 20px 0;
    border: 1px solid var(--ink-border);
}
.ink-article-body a { color: var(--ink-accent); }
.ink-article-body a:hover { color: var(--ink-accent-hover); }
.ink-article-body blockquote {
    border-left: 3px solid var(--ink-accent);
    padding: 12px 20px;
    margin: 24px 0;
    background: var(--ink-soft);
    color: var(--ink-text);
    font-style: italic;
    border-radius: 0 8px 8px 0;
}

/* Share section */
.ink-share {
    margin-top: 48px;
    padding-top: 32px;
    border-top: 1px solid var(--ink-border);
}
.ink-share-label {
    font-size: .7rem;
    font-weight: 700;
    letter-spacing: .15em;
    text-transform: uppercase;
    color: var(--ink-muted);
    margin-bottom: 16px;
}
.ink-share-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}
.ink-share-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    font-size: .8rem;
    font-weight: 600;
    text-decoration: none;
    border-radius: 6px;
    border: 1px solid var(--ink-border);
    color: var(--ink-text);
    background: var(--ink-surface);
    transition: all .2s;
}
.ink-share-btn:hover { border-color: var(--ink-accent); color: var(--ink-accent); }
.ink-share-btn i { font-size: .9rem; }

@media (max-width: 640px) {
    .ink-page { padding: 24px 16px 56px; }
    .ink-share-buttons { flex-direction: column; }
    .ink-share-btn { justify-content: center; }
}
</style>
@endpush

@section('content')
<div class="ink-page">
    <div class="row">
        <div class="col-lg-8" data-aos="fade-up" data-aos-duration="800">
            <div class="ink-article-wrap">

                {{-- Back link --}}
                <a href="{{ url('/articles') }}" class="ink-back">
                    ← Back to articles
                </a>

                {{-- Category tag --}}
                <a href="{{url('category/'.$article->Category->slug)}}" class="ink-tag">
                    {{ $article->Category->name }}
                </a>

                {{-- Title --}}
                <h1 class="ink-article-title">{{ $article->title }}</h1>

                {{-- Meta --}}
                <div class="ink-article-meta">
                    <span>{{ $article->created_at->format('d F Y') }}</span>
                    <span>By {{ $article->User->name }}</span>
                    <span>{{ $article->views }} views</span>
                </div>

                {{-- Featured image --}}
                <div class="ink-article-img">
                    <img src="{{ asset('storage/back/'.$article->image) }}"
                         alt="{{ $article->title }}" loading="lazy">
                </div>

                {{-- Article body --}}
                <div class="ink-article-body">
                    {!! $article->desc !!}
                </div>

                {{-- Share --}}
                <div class="ink-share">
                    <div class="ink-share-label">Share this article</div>
                    <div class="ink-share-buttons">
                        <a class="ink-share-btn"
                           href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}"
                           target="_blank">
                            <i class="fab fa-facebook"></i> Facebook
                        </a>
                        <a class="ink-share-btn"
                           href="https://api.whatsapp.com/send?text={{url()->current()}}"
                           target="_blank">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>
                        <a class="ink-share-btn"
                           href="https://twitter.com/intent/tweet?url={{url()->current()}}&text=Check+out+this+article!"
                           target="_blank">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                    </div>
                </div>

            </div>
        </div>

        {{-- Side widgets --}}
        @include('front.layout.side-widget')
    </div>
</div>
@endsection
