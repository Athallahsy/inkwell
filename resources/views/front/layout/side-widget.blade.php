<div class="col-lg-4" data-aos="fade-left" data-aos-duration="1000">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search Articles</div>
        <div class="card-body">
            <form action="{{route('search')}}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="search" placeholder="Search..."/>
                    <button class="btn btn-primary" id="button-search" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-light text-dark text-uppercase fw-bold">
            Categories
        </div>
        <div class="card-bodyy">
            <ul class="list-group list-group-flush">
                @foreach ($categories as $categorie)
                    <li class="list-group-item px-0 border-0">
                        <a href="{{url('category/'.$categorie->slug)}}" class="text-secondary text-decoration-none d-flex align-items-center">
                            <i class="bi bi-tag-fill me-2 text-primary"></i>
                            <span class="fw-medium">{{$categorie->name}} {{$categorie->articles->count()}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Popular Articles</div>
        <div class="card-body">
            @foreach ($popular_articles as $item)
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{asset('storage/back/'.$item->image)}}" alt="{{$item->title}}" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <p>
                                    <a href="{{url('post/'.$item->slug)}}">{{$item->title}}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
