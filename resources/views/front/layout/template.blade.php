<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="Inkwell Team" />
        <meta name="robots" content="index, follow">
        @stack('meta-seo')
        <title>@yield('title')</title>
        <link rel="icon" type="image/x-icon" href="{{asset('front/image/favicon.ico')}}" />
        <link href="{{asset('front/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('front/css/custom.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.css" rel="stylesheet">
        @stack('css')
    </head>
    <body>
        @include('front.layout.navbar')
       <header style="background:#f8f7f4; border-bottom:1px solid #e9e7e1; padding:48px 0; margin-bottom:0;">
    <div class="container">
        <div class="text-center">
            <span style="display:block; font-size:.68rem; font-weight:700; letter-spacing:.2em; text-transform:uppercase; color:#c2410c; margin-bottom:10px;">Est. 2024</span>
            <h1 style="font-family:Georgia,serif; font-size:2.4rem; font-weight:700; color:#1c1917; margin:0 0 10px; letter-spacing:-.02em;">{{$config['title']}}</h1>
            <p style="color:#78716c; font-size:.95rem; margin:0;">{{$config['caption']}}</p>
        </div>
    </div>
</header>


        @yield('content')

       <footer style="background:#1c1917; color:#a8a29e; padding:48px 0 32px; margin-top:64px; border-top:1px solid #292524;">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                <h5 style="font-family:Georgia,serif; color:#f5f5f4; font-weight:700; margin-bottom:6px;">{{$config['site_footer']}}</h5>
                <p style="font-size:.85rem; margin:0; color:#78716c;">Your source of inspiration.</p>
            </div>
            <div class="col-md-4 text-center mb-3 mb-md-0">
                <img src="{{ asset('uploads/' . $config['logo']) }}" alt="Inkwell Logo" class="img-fluid" style="max-height:48px; opacity:.85;">
            </div>
            <div class="col-md-4 text-center text-md-end">
                <p style="font-size:.8rem; margin:0 0 4px; color:#78716c;">Copyright &copy; {{ $config['site_copyright'] }} {{ date('Y') }}</p>
                <p style="font-size:.8rem; margin:0; color:#78716c;">
                    Made with <span style="color:#c2410c;">&hearts;</span> {{ $config['site_copyright'] }}
                </p>
            </div>
        </div>
        <div style="border-top:1px solid #292524; padding-top:20px; text-align:center;">
            <p style="font-size:.75rem; color:#57534e; margin:0; letter-spacing:.05em;">INKWELL &nbsp;·&nbsp; EST. 2024</p>
        </div>
    </div>
</footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('front/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>
        <script>
            AOS.init();
        </script>
        @stack('js')
    </body>
</html>
