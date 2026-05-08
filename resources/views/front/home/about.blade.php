@extends('front.layout.template')

@push('meta-seo')
    <meta name="description" content="About Inkwell - A personal journal app to express your thoughts, capture memories, and organize ideas effortlessly.">
    <meta name="keyword" content="About Inkwell, journal, Personal journal">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:title" content="About Inkwell - Personal Journaling App">
    <meta property="og:site_name" content="Inkwell">
    <meta property="og:description" content="About Inkwell - A personal journal app to express your thoughts, capture memories, and organize ideas effortlessly.">
    <meta property="og:image" content="{{asset('front/image/inkwell-logo.jpg')}}">
@endpush

@section('title', 'About - Inkwell')

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

/* Divider */
.ink-divider { display: flex; align-items: center; gap: 16px; margin-bottom: 36px; padding-bottom: 16px; border-bottom: 1px solid var(--ink-border); }
.ink-divider-label { font-size: .68rem; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: var(--ink-accent); white-space: nowrap; }
.ink-divider-line { flex: 1; height: 1px; background: var(--ink-border); }
.ink-divider-date { font-size: .75rem; color: var(--ink-muted); white-space: nowrap; }

/* About wrap */
.ink-about-wrap { max-width: 720px; }

/* Logo image */
.ink-about-logo {
    width: 100%;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 36px;
    border: 1px solid var(--ink-border);
}
.ink-about-logo img {
    width: 100%;
    max-height: 320px;
    object-fit: cover;
    display: block;
}

/* Tag */
.ink-tag {
    display: inline-block;
    font-size: .65rem;
    font-weight: 700;
    letter-spacing: .16em;
    text-transform: uppercase;
    color: var(--ink-accent);
    margin-bottom: 16px;
}

/* Title */
.ink-about-title {
    font-family: Georgia, serif;
    font-size: clamp(1.8rem, 4vw, 2.6rem);
    font-weight: 700;
    line-height: 1.2;
    color: var(--ink-text);
    margin: 0 0 20px;
    letter-spacing: -.02em;
}

/* Meta */
.ink-about-meta {
    display: flex;
    align-items: center;
    gap: 0;
    font-size: .8rem;
    color: var(--ink-muted);
    padding-bottom: 24px;
    border-bottom: 1px solid var(--ink-border);
    margin-bottom: 32px;
}
.ink-about-meta span + span::before { content: "·"; margin: 0 10px; }

/* Body */
.ink-about-body {
    font-size: 1rem;
    line-height: 1.85;
    color: #292524;
}
.ink-about-body p { margin-bottom: 20px; }
.ink-about-body h5 {
    font-family: Georgia, serif;
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--ink-text);
    margin: 32px 0 12px;
}
.ink-about-body ul {
    padding-left: 20px;
    margin-bottom: 20px;
}
.ink-about-body ul li {
    margin-bottom: 10px;
    color: #292524;
    line-height: 1.7;
}
.ink-about-body strong { color: var(--ink-text); }

/* Contact info */
.ink-contact-section {
    margin-top: 48px;
    padding-top: 32px;
    border-top: 1px solid var(--ink-border);
}
.ink-contact-label {
    font-size: .7rem;
    font-weight: 700;
    letter-spacing: .15em;
    text-transform: uppercase;
    color: var(--ink-muted);
    margin-bottom: 20px;
}
.ink-contact-item {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: .9rem;
    color: var(--ink-muted);
    margin-bottom: 12px;
}
.ink-contact-item i { color: var(--ink-accent); width: 16px; }

/* Social links */
.ink-social-links {
    display: flex;
    gap: 16px;
    margin-top: 24px;
}
.ink-social-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border: 1px solid var(--ink-border);
    border-radius: 8px;
    color: var(--ink-muted);
    text-decoration: none;
    font-size: 1rem;
    transition: all .2s;
}
.ink-social-link:hover {
    border-color: var(--ink-accent);
    color: var(--ink-accent);
}

@media (max-width: 640px) {
    .ink-page { padding: 24px 16px 56px; }
}
</style>
@endpush

@section('content')
<div class="ink-page">
    <div class="row">
        <div class="col-lg-8" data-aos="fade-up" data-aos-duration="800">
            <div class="ink-about-wrap">

                {{-- Divider --}}
                <div class="ink-divider">
                    <span class="ink-divider-label">Inkwell · About</span>
                    <span class="ink-divider-line"></span>
                    <span class="ink-divider-date">{{ date('d F Y') }}</span>
                </div>

                {{-- Logo image --}}
                <div class="ink-about-logo">
                    <img src="{{ asset('front/image/inkwell-logo.jpg') }}" alt="About Inkwell">
                </div>

                {{-- Tag --}}
                <span class="ink-tag">About Us</span>

                {{-- Title --}}
                <h1 class="ink-about-title">About Inkwell</h1>

                {{-- Meta --}}
                <div class="ink-about-meta">
                    <span>{{ date('d F Y') }}</span>
                    <span>By Inkwell</span>
                </div>

                {{-- Body --}}
                <div class="ink-about-body">
                    <p>
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
                        Thank you for choosing Inkwell to be a part of your story. Let's make every moment meaningful!
                    </p>
                </div>

                {{-- Contact --}}
                <div class="ink-contact-section">
                    <div class="ink-contact-label">Get In Touch</div>
                    <div class="ink-contact-item">
                        <i class="fa-solid fa-phone"></i>
                        {{ $config['phone'] }}
                    </div>
                    <div class="ink-contact-item">
                        <i class="fa-solid fa-envelope"></i>
                        {{ $config['email'] }}
                    </div>
                    <div class="ink-social-links">
                        <a href="https://www.instagram.com/{{ $config['instagram']}}" target="_blank" class="ink-social-link">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="https://twitter.com/{{ $config['twitter']}}" target="_blank" class="ink-social-link">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="https://www.facebook.com/{{ $config['facebook']}}" target="_blank" class="ink-social-link">
                            <i class="fa-brands fa-facebook"></i>
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
