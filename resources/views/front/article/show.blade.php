@extends('front.layout.template')

@push('meta-seo')
    <meta name="author" content="{{$article->user->name}}">
    <meta name="description" content="{{Str::limit(strip_tags($article->desc), 50)}}">
    <meta name="keyword" content="{{$article->title .' - Inkwell'}}">
    {{-- meta social --}}
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:title" content="{{$article->title .' - Inkwell'}}">
    <meta property="og:site_name" content="Inkwell">
    <meta property="og:description" content="{{Str::limit(strip_tags($article->desc), 50)}}">
    <meta property="og:image" content="{{asset('storage/back/'.$article->image)}}">
@endpush

@section('title', $article->title .' - Inkwell')

@section('content')
     <!-- Page content-->
     <div class="container">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-right" data-aos-duration="1000">
                <div class="card mb-4 shadow-sm">
                    <a href="{{url('post/'.$article->slug)}}"><img class="card-img-top single-image" src="{{asset('storage/back/'.$article->image)}}" alt="{{$article->title}}" /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            <span class="fw-bold ml-2">{{$article->created_at->format('d F Y')}} |</span>
                            <span class="fw-bold ml-2">
                                <a href="{{url('category/'.$article->Category->slug)}}">{{$article->Category->name}} |</a>
                               By {{$article->User->name}} |
                            </span>
                            <span class="fw-bold ml-2">views: {{$article->views}}</span>x
                        </div>
                        <h1 class="card-title">{{$article->title}}</h1>
                        <p class="card-text">{!!$article->desc!!}</p>
                        <div class="mt-5 p-4 border rounded shadow-sm bg-light">
                            <h5 class="mb-3">Share this article:</h5>
                            <div class="d-flex align-items-center gap-3">
                                <!-- Facebook Share Button -->
                                <a class="btn btn-primary d-flex align-items-center gap-2"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}"
                                    target="_blank">
                                    <i class="fab fa-facebook"></i> Share on Facebook
                                </a>

                                <!-- WhatsApp Share Button -->
                                <a class="btn btn-success d-flex align-items-center gap-2"
                                    href="https://api.whatsapp.com/send?text={{url()->current()}}"
                                    target="_blank">
                                    <i class="fab fa-whatsapp"></i> Share on WhatsApp
                                </a>

                                <!-- Twitter Share Button -->
                                <a class="btn btn-info d-flex align-items-center gap-2 text-white"
                                    href="https://twitter.com/intent/tweet?url={{url()->current()}}&text=Check+out+this+article!"
                                    target="_blank">
                                    <i class="fab fa-twitter"></i> Share on Twitter
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Side widgets-->
            @include('front.layout.side-widget')
        </div>
    </div>
@endsection
