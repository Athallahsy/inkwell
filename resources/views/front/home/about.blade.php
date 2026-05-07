@extends('front.layout.template')

@push('meta-seo')
    <meta name="description" content="About Inkwell - A personal journal app to express your thoughts, capture memories, and organize ideas effortlessly. Secure, user-friendly, and feature-packed to inspire your creativity. Start your journaling journey today!">
    <meta name="keyword" content="About Inkwell, journal, Personal journal, personal journal app, journal app, personal journaling, Personal Journaling App,inkwell">
    {{-- meta social --}}
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:title" content="About Inkwell - Personal Journaling App">
    <meta property="og:site_name" content="Inkwell">
    <meta property="og:description" content="About Inkwell - A personal journal app to express your thoughts, capture memories, and organize ideas effortlessly. Secure, user-friendly, and feature-packed to inspire your creativity. Start your journaling journey today!">
    <meta property="og:image" content="{{asset('front/image/inkwell-logo.jpg')}}">
@endpush


@section('title', 'About - Inkwell')

@section('content')
     <!-- Page content-->
     <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8" data-aos="fade-right" data-aos-duration="1000">
                <!-- Featured blog post-->
                <div class="card mb-4 shadow-sm">
                    <a href="{{asset('front/image/inkwell-logo.jpg')}}"><img class="card-img-top featured-image" src="{{ asset('front/image/inkwell-logo.jpg') }}" alt="About Inkwell" /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ date('d F Y') }} | By Inkwell</div>
                        <h2 class="card-title">About Inkwell</h2>
                        <p class="card-text">
                            <strong>Welcome to Inkwell,</strong> your personal space to capture thoughts, ideas, and memories.
                        </p>
                        <p>
                            Inkwell is designed to be more than just a journal. It's a reflection of your unique journey, offering tools to organize your entries, track your growth, and express yourself freely. Whether you're jotting down daily reflections, planning your future, or simply recording moments that matter, Inkwell is here to support you.
                        </p>

                        <h5>Our Mission</h5>
                        <p>
                            Our mission is to create a secure, user-friendly platform where individuals can document their lives while exploring the beauty of self-expression and personal growth.
                        </p>

                        <h5>Why Inkwell?</h5>
                        <ul>
                            <li><strong>Privacy First:</strong> Your journal is yours alone. With secure login and robust privacy settings, your entries are safe and confidential.</li>
                            <li><strong>Customizable:</strong> Tailor your experience with themes, categories, and tags to suit your journaling style.</li>
                            <li><strong>Accessible:</strong> Access your journal anytime, anywhere, on any device.</li>
                        </ul>

                        <p>
                            Thank you for choosing Inkwell to be a part of your story. Let’s make every moment meaningful!
                        </p>
                        {{-- link --}}

                        <div class="contact-info mt-3 text-center">
                            <p class="mb-1">
                                <i class="fa-solid fa-phone me-2"></i>
                                {{ $config['phone'] }}
                            </p>
                            <p>
                                <i class="fa-solid fa-envelope me-2"></i>
                                {{ $config['email'] }}
                            </p>
                        </div>
                        <div class="social-media-links mt-3 text-center">
                            <a href="https://www.instagram.com/{{ $config['instagram']}}" target="_blank" class="me-4">
                                <i class="fa-brands fa-instagram fa-2x"></i>
                            </a>
                            <a href="https://twitter.com/{{ $config['twitter']}}" target="_blank" class="me-4">
                                <i class="fa-brands fa-twitter fa-2x"></i>
                            </a>
                            <a href="https://www.facebook.com/{{ $config['facebook']}}" target="_blank" class="me-4">
                                <i class="fa-brands fa-facebook fa-2x"></i>
                            </a>
                        </div>

                    </div>
                </div>


            </div>
            <!-- Side widgets-->
            @include('front.layout.side-widget')
        </div>
    </div>
@endsection
