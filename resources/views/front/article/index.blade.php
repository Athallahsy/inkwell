@extends('front.layout.template')

@push('meta-seo')
    <meta name="description" content="Articles - Inkwell - A personal journal app to express your thoughts, capture memories, and organize ideas effortlessly. Secure, user-friendly, and feature-packed to inspire your creativity. Start your journaling journey today!">
    <meta name="keyword" content="Articles, Inkwell, journal, Personal journal, personal journal app, journal app, personal journaling, Personal Journaling App,inkwell">
    {{-- meta social --}}
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:title" content="Inkwell Blog - Articles">
    <meta property="og:site_name" content="Inkwell">
    <meta property="og:description" content="Articles - Inkwell - A personal journal app to express your thoughts, capture memories, and organize ideas effortlessly. Secure, user-friendly, and feature-packed to inspire your creativity. Start your journaling journey today!">
    <meta property="og:image" content="{{asset('front/image/inkwell-logo.jpg')}}">
@endpush


@section('title', 'Inkwell Blog - Articles')

@section('content')
     <!-- Page content-->
     <div class="container">
        <div class="card mb-4">
            <form action="{{route('search')}}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="search" placeholder="Search..."/>
                    <button class="btn btn-primary" id="button-search" type="submit">Search</button>
                </div>
            </form>
        </div>
        @if ($search)
            <h2>Search results for <b>"{{ $search }}"</b></h2>
            <a href="{{url('/articles')}}" class="btn btn-secondary mb-3">back</a>
        @endif
        <div class="row">
            @forelse ($articles as $article)
                <div class="col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-duration="1000">
                    <!-- Blog post-->
                    <div class="card h-100 shadow-sm border-0">
                        <a href="{{url('post/'.$article->slug)}}" class="image-link">
                            <img class="card-img-top featured-image-sm"
                                 src="{{asset('storage/back/'.$article->image)}}"
                                 alt="Image of {{$article->title}}" />
                        </a>
                        <div class="card-body">
                            <div class="small text-muted">
                                {{$article->created_at->format('d F Y')}} |
                                <a href="{{url('category/'.$article->Category->slug)}}" class="text-decoration-none text-primary">
                                    {{$article->Category->name}}
                                </a>
                                | By {{$article->User->name}}
                            </div>
                            <h2 class="card-title h5 mt-2 text-truncate">{{$article->title}}</h2>
                            <p class="card-text text-muted">
                                {{ Str::limit(strip_tags($article->desc), 100) }}
                            </p>
                            <a class="btn btn-sm btn-primary rounded-pill" href="{{url('post/'.$article->slug)}}">Read more →</a>
                        </div>
                    </div>
                </div>
            @empty
                <h4 class="text-center">Article not found</h4>
            @endforelse
        </div>
        {{ $articles->onEachSide(1)->links() }}
    </div>
@endsection
