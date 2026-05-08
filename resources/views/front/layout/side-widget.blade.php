<div class="col-lg-4" data-aos="fade-left" data-aos-duration="1000">

    <!-- Search widget -->
    <div class="mb-4" style="background:#ffffff; border:1px solid #e9e7e1; border-radius:10px; overflow:hidden;">
        <div style="padding:14px 18px; border-bottom:1px solid #e9e7e1;">
            <span style="font-size:.68rem; font-weight:700; letter-spacing:.18em; text-transform:uppercase; color:#c2410c;">Search Articles</span>
        </div>
        <div style="padding:16px 18px;">
            <form action="{{route('search')}}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="search" placeholder="Search..." style="border-color:#e9e7e1; font-size:.88rem; background:#f8f7f4;"/>
                    <button type="submit" style="background:#c2410c; color:#fff; border:none; padding:0 16px; border-radius:0 6px 6px 0; font-size:.85rem; font-weight:600; cursor:pointer;">Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Categories widget -->
    <div class="mb-4" style="background:#ffffff; border:1px solid #e9e7e1; border-radius:10px; overflow:hidden;">
        <div style="padding:14px 18px; border-bottom:1px solid #e9e7e1;">
            <span style="font-size:.68rem; font-weight:700; letter-spacing:.18em; text-transform:uppercase; color:#c2410c;">Categories</span>
        </div>
        <div style="padding:8px 0;">
            @foreach ($categories as $categorie)
            <a href="{{url('category/'.$categorie->slug)}}" style="display:flex; align-items:center; justify-content:space-between; padding:10px 18px; text-decoration:none; color:#1c1917; font-size:.88rem; border-bottom:1px solid #f0ede7; transition:background .2s;"
               onmouseover="this.style.background='#f8f7f4'" onmouseout="this.style.background='transparent'">
                <span style="font-weight:500;">{{$categorie->name}}</span>
                <span style="font-size:.72rem; background:#f0ede7; color:#78716c; padding:2px 8px; border-radius:999px; font-weight:600;">{{$categorie->articles->count()}}</span>
            </a>
            @endforeach
        </div>
    </div>

    <!-- Popular Articles widget -->
    <div class="mb-4" style="background:#ffffff; border:1px solid #e9e7e1; border-radius:10px; overflow:hidden;">
        <div style="padding:14px 18px; border-bottom:1px solid #e9e7e1;">
            <span style="font-size:.68rem; font-weight:700; letter-spacing:.18em; text-transform:uppercase; color:#c2410c;">Popular Articles</span>
        </div>
        <div style="padding:12px 18px;">
            @foreach ($popular_articles as $item)
            <a href="{{url('post/'.$item->slug)}}" style="display:flex; gap:12px; align-items:center; text-decoration:none; padding:10px 0; border-bottom:1px solid #f0ede7;">
                <img src="{{asset('storage/back/'.$item->image)}}" alt="{{$item->title}}"
                     style="width:64px; height:48px; object-fit:cover; border-radius:6px; flex-shrink:0; border:1px solid #e9e7e1;">
                <span style="font-size:.85rem; font-weight:500; color:#1c1917; line-height:1.4;">{{$item->title}}</span>
            </a>
            @endforeach
        </div>
    </div>

</div>
