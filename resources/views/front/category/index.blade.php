@extends('front.layout.template')

@section('title', 'Inkwell Blog - '.$category)

@section('content')
     <!-- Page content-->
     <div class="container">
        <div class="card mb-4">
            <form action="{{route('search')}}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="search" placeholder="Search..."/>
                </div>
            </form>
        </div>

            <h2>Search results for <b>"{{ $category }}"</b></h2>

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
