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
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('front/image/favicon.ico')}}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('front/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('front/css/custom.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @stack('css')
    </head>
    <body>
        <!-- Responsive navbar-->
        @include('front.layout.navbar')
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">{{$config['title']}}</h1>
                    <p class="lead mb-0">{{$config['caption']}}</p>
                </div>
            </div>
        </header>

        @yield('content')

        <!-- Footer-->
        <footer class="py-4 bg-dark text-light">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Logo atau Nama -->
                    <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                        <h5 class="fw-bold">{{$config['site_footer']}}</h5>
                        <p class="small">Your source of inspiration.</p>
                    </div>
                    <!-- Gambar di Tengah -->
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('uploads/' . $config['logo']) }}" alt="Inkwell Logo" class="footer-image img-fluid">
                    </div>
                    <!-- Hak Cipta -->
                    <div class="col-md-4 text-center text-md-end">
                        <p class="small m-0">Copyright &copy; {{ $config['site_copyright'] }} {{ date('Y') }}</p>
                        <p class="small m-0">
                            Made with <span class="text-primary">&hearts;</span> {{ $config['site_copyright'] }}
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('front/js/scripts.js')}}"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
          </script>
        @stack('js')
    </body>
</html>
