<!doctype html>
<html lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Inkwell Team">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title') · Inkwell Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ asset('front/image/favicon.ico') }}">
    <link href="{{ asset('back/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('back/css/dashboard.css') }}" rel="stylesheet">

    <style>
    /* ─── Inkwell Design System ─── */
    :root {
        --ink-bg:           #f8f7f4;
        --ink-surface:      #ffffff;
        --ink-border:       #e9e7e1;
        --ink-text:         #1c1917;
        --ink-muted:        #78716c;
        --ink-accent:       #c2410c;
        --ink-accent-hover: #9a330a;
        --ink-soft:         #f0ede7;
        --ink-sidebar-bg:   #1c1917;
        --ink-sidebar-border: #2c2520;
        --ink-sidebar-muted: #a8a29e;
        --ink-sidebar-text: #f8f7f4;
    }

    *, *::before, *::after { box-sizing: border-box; }
    body {
        background: var(--ink-bg);
        color: var(--ink-text);
        font-family: system-ui, -apple-system, sans-serif;
        margin: 0;
    }

    /* ─── Topbar ─── */
    .ink-topbar {
        position: sticky;
        top: 0;
        z-index: 200;
        background: var(--ink-sidebar-bg);
        border-bottom: 1px solid var(--ink-sidebar-border);
        height: 56px;
        padding: 0 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 2px 12px rgba(0,0,0,.25);
    }

    /* Brand */
    .ink-topbar-brand {
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        color: var(--ink-sidebar-text);
    }
    .ink-topbar-brand-icon {
        width: 30px; height: 30px;
        background: var(--ink-accent);
        border-radius: 7px;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .ink-topbar-brand-icon svg {
        width: 16px; height: 16px;
        stroke: #fff;
    }
    .ink-topbar-brand-name {
        font-family: Georgia, serif;
        font-size: .95rem;
        font-weight: 700;
        letter-spacing: -.01em;
        color: var(--ink-sidebar-text);
        line-height: 1;
    }
    .ink-topbar-brand-sub {
        font-size: .6rem;
        font-weight: 600;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: var(--ink-accent);
        line-height: 1;
        display: block;
        margin-top: 2px;
    }

    /* Right side */
    .ink-topbar-right {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .ink-topbar-divider {
        width: 1px;
        height: 20px;
        background: var(--ink-sidebar-border);
    }
    .ink-topbar-user {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: .82rem;
        color: var(--ink-sidebar-muted);
    }
    .ink-topbar-user strong {
        color: var(--ink-sidebar-text);
        font-weight: 600;
    }
    .ink-topbar-avatar {
        width: 32px; height: 32px;
        background: var(--ink-accent);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: .75rem;
        font-weight: 700;
        color: #fff;
        letter-spacing: .02em;
        flex-shrink: 0;
    }

    /* Date badge in topbar */
    .ink-topbar-date {
        font-size: .68rem;
        font-weight: 600;
        letter-spacing: .12em;
        text-transform: uppercase;
        color: var(--ink-sidebar-muted);
        border: 1px solid var(--ink-sidebar-border);
        border-radius: 6px;
        padding: 4px 10px;
        white-space: nowrap;
    }

    /* Mobile toggler */
    .ink-toggler {
        display: none;
        background: none;
        border: 1px solid var(--ink-sidebar-border);
        border-radius: 6px;
        padding: 6px 10px;
        cursor: pointer;
        color: var(--ink-sidebar-text);
        font-size: 1rem;
        line-height: 1;
    }
    @media (max-width: 768px) {
        .ink-toggler { display: block; }
        .ink-topbar-date { display: none; }
    }
    </style>

    @stack('css')
  </head>
  <body>

{{-- ─── Topbar ─── --}}
<header class="ink-topbar">

    {{-- Brand --}}
    <a class="ink-topbar-brand" href="{{ url('/dashboard') }}">
        @php $logo = \App\Models\Config::where('name', 'logo')->first(); @endphp
        @if($logo)
            <img src="{{ asset('uploads/' . $logo->value) }}" alt="Inkwell"
                 style="height:30px; width:auto; object-fit:contain; mix-blend-mode:screen;">
        @else
            <div class="ink-topbar-brand-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0
                             1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5
                             7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125
                             -1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0
                             2.25 2.25h13.5M6 7.5h3v3H6v-3Z"/>
                </svg>
            </div>
            <div>
                <span class="ink-topbar-brand-name">Inkwell</span>
                <span class="ink-topbar-brand-sub">Admin Panel</span>
            </div>
        @endif
    </a>

    {{-- Right --}}
    <div class="ink-topbar-right">

        {{-- Date badge --}}
        <span class="ink-topbar-date">{{ now()->format('d M Y') }}</span>

        <div class="ink-topbar-divider"></div>

        {{-- User --}}
        <div class="ink-topbar-user">
            <div class="ink-topbar-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <strong>{{ Auth::user()->name }}</strong>
        </div>

        {{-- Mobile toggle --}}
        <button class="ink-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                aria-label="Toggle sidebar">
            ☰
        </button>
    </div>

</header>

{{-- ─── Main Layout ─── --}}
<div class="container-fluid">
  <div class="row">
    @include('back.layout.sidebar')
    @yield('content')
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('back/js/dashboard.js') }}"></script>
@stack('js')
  </body>
</html>
