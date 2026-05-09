<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Inkwell') }} — @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('front/image/favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            background: var(--ink-bg);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .auth-navbar {
            background: #1c1917;
            border-bottom: 1px solid #2c2520;
            padding: 0 24px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .auth-navbar-brand {
            font-family: Georgia, serif;
            font-size: 1.2rem;
            font-style: italic;
            color: #f8f7f4;
            text-decoration: none;
            letter-spacing: .02em;
        }
        .auth-navbar-link {
            font-size: .82rem;
            color: #a8a29e;
            text-decoration: none;
            font-weight: 500;
            transition: color .2s;
        }
        .auth-navbar-link:hover { color: #f8f7f4; }

        /* Main */
        main { flex: 1; display: flex; align-items: center; justify-content: center; padding: 48px 16px; }
    </style>
</head>
<body>
    <nav class="auth-navbar">
        <a href="{{ url('/') }}" class="auth-navbar-brand">inkwell</a>
        <a href="{{ url('/') }}" class="auth-navbar-link">← Back to Home</a>
    </nav>

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
