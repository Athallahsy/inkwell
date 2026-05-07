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

@section('content')
     <!-- Page content-->
     <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                @if($latest_article)
                <!-- Featured blog post-->
                <div class="card mb-4 shadow-sm" data-aos="fade-right" data-aos-duration="1000">
                    <a href="{{url('post/'.$latest_article->slug)}}">
                        <img class="card-img-top featured-image" src="{{asset('storage/back/'.$latest_article->image)}}" alt="..." />
                    </a>
                    <div class="card-body">
                        <div class="small text-muted">
                            {{$latest_article->created_at->format('d F Y')}} |
                            <a href="{{url('category/'.$latest_article->Category->slug)}}">{{$latest_article->Category->name}}</a> |
                            By {{$latest_article->User ->name}}  {{-- Menampilkan nama pembuat artikel terbaru --}}
                        </div>
                        <h2 class="card-title">{{$latest_article->title}}</h2>
                        <p class="card-text">{{ Str::limit(strip_tags($latest_article->desc), 500) }}</p>
                        <a class="btn btn-primary" href="{{url('post/'.$latest_article->slug)}}">Read more →</a>
                    </div>
                </div>
                @else
                <div class="card mb-4 shadow-sm">
                    <div class="card-body text-center py-5">
                        <h3>Belum ada artikel</h3>
                        <p class="text-muted">Artikel akan muncul di sini setelah dipublikasikan.</p>
                    </div>
                </div>
                @endif

                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @forelse ($articles as $article)
                    <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1000">
                        <!-- Blog post-->
                        <div class="card mb-4 shadow-sm">
                            <a href="{{url('post/'.$article->slug)}}">
                                <img class="card-img-top featured-image-sm" src="{{asset('storage/back/'.$article->image)}}" alt="..." />
                            </a>
                            <div class="card-body card-height">
                                <div class="small text-muted">
                                    {{$article->created_at->format('d F Y')}} |
                                    <a href="{{url('category/'.$article->Category->slug)}}">{{$article->Category->name}}</a> |
                                    By {{$article->User->name}} {{-- Menampilkan nama pembuat artikel --}}
                                </div>
                                <h4 class="card-title">{{$article->title}}</h4>
                                <p class="card-text">{{ Str::limit(strip_tags($article->desc), 250) }}</p>
                                <a class="btn btn-primary" href="{{url('post/'.$article->slug)}}">Read more →</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
                <!-- Pagination-->
                @if($articles->count())
                <div class="d-flex justify-content-center">
                    {{ $articles->onEachSide(1)->links() }}
                </div>
                @endif
            </div>
            <!-- Side widgets-->
            @include('front.layout.side-widget')
        </div>
    </div>
@endsection
