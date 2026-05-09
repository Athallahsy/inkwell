<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
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

        <style>
        /* ── Dark mode variables ── */
        [data-theme="dark"] {
            --ink-bg: #1a1917;
            --ink-surface: #242220;
            --ink-border: #38352f;
            --ink-text: #f5f4f0;
            --ink-muted: #a8a29e;
            --ink-soft: #2c2925;
            --ink-accent: #e05522;
            --ink-accent-hover: #c2410c;
        }

        /* Body & background */
        [data-theme="dark"] body { background: #1a1917 !important; color: #f5f4f0; }

        /* Header */
        [data-theme="dark"] header { background: #242220 !important; border-bottom-color: #38352f !important; }
        [data-theme="dark"] header h1 { color: #f5f4f0 !important; }
        [data-theme="dark"] header p { color: #a8a29e !important; }

        /* Page wrapper */
        [data-theme="dark"] .ink-page { background: #1a1917; }

        /* Divider */
        [data-theme="dark"] .ink-divider { border-bottom-color: #38352f; }
        [data-theme="dark"] .ink-divider-date { color: #78716c; }

        /* Hero / Featured */
        [data-theme="dark"] .ink-hero { background: #242220; border-color: #38352f; }
        [data-theme="dark"] .ink-hero-title { color: #f5f4f0; }
        [data-theme="dark"] .ink-hero-excerpt { color: #a8a29e; }
        [data-theme="dark"] .ink-hero-meta { color: #78716c; }
        [data-theme="dark"] .ink-hero-meta a { color: #78716c; }

        /* Cards */
        [data-theme="dark"] .ink-card { background: #242220; border-color: #38352f; }
        [data-theme="dark"] .ink-card:hover { border-color: #4a4540; }
        [data-theme="dark"] .ink-card-title { color: #f5f4f0; }
        [data-theme="dark"] .ink-card-excerpt { color: #a8a29e; }
        [data-theme="dark"] .ink-card-meta { color: #78716c; }
        [data-theme="dark"] .ink-card-meta a { color: #78716c; }
        [data-theme="dark"] .ink-card-img { background: #2c2925; }
        [data-theme="dark"] .ink-chip { background: #2c2925; color: #a8a29e; }

        /* Section head */
        [data-theme="dark"] .ink-section-head h3 { color: #f5f4f0; }
        [data-theme="dark"] .ink-section-head .line { background: #38352f; }

        /* Empty state */
        [data-theme="dark"] .ink-empty { background: #242220; border-color: #38352f; }
        [data-theme="dark"] .ink-empty h3 { color: #f5f4f0; }
        [data-theme="dark"] .ink-empty p { color: #a8a29e; }

        /* Pagination */
        [data-theme="dark"] .ink-pagination .page-link { background: #242220; border-color: #38352f; color: #f5f4f0; }
        [data-theme="dark"] .ink-pagination .page-link:hover { border-color: #e05522; color: #e05522; }
        [data-theme="dark"] .ink-pagination .page-item.active .page-link { background: #e05522; border-color: #e05522; }

        /* Sidebar widgets */
        [data-theme="dark"] .mb-4[style*="background:#ffffff"] { background: #242220 !important; border-color: #38352f !important; }
        [data-theme="dark"] a[style*="color:#1c1917"] { color: #f5f4f0 !important; }

        /* View Transition */
        ::view-transition-old(root),
        ::view-transition-new(root) {
            animation: none;
            mix-blend-mode: normal;
        }
        </style>

        {{-- Load theme before render to avoid flash --}}
        <script>
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', savedTheme);
        </script>

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
                        <img src="{{ asset('uploads/' . $config['logo']) }}" alt="Inkwell Logo" class="img-fluid" style="max-height:48px; opacity:.85; mix-blend-mode:lighten;">
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
        <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
        <script src="{{asset('front/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>
        <script>
    AOS.init();

    // ─── Initialize Icons & Theme Icon ───
    document.addEventListener('DOMContentLoaded', function () {

        lucide.createIcons();

        const theme = localStorage.getItem('theme') || 'light';

        const btn = document.getElementById('theme-switcher');

        if (btn) {

            btn.innerHTML = theme === 'dark'
                ? '<i data-lucide="sun" width="16" height="16"></i>'
                : '<i data-lucide="moon" width="16" height="16"></i>';

            lucide.createIcons();
        }

    });

    // ─── Toggle Theme ───
    function toggleTheme(event) {

        const html = document.documentElement;

        const currentTheme = html.getAttribute('data-theme');

        // ─── Mouse Position ───
        const x = event.clientX;
        const y = event.clientY;

        // ─── Radius ───
        const endRadius = Math.hypot(
            Math.max(x, window.innerWidth - x),
            Math.max(y, window.innerHeight - y)
        );

        // ─── Apply Theme ───
        function applyTheme() {

            const newTheme = currentTheme === 'dark'
                ? 'light'
                : 'dark';

            html.setAttribute('data-theme', newTheme);

            localStorage.setItem('theme', newTheme);

            // Update icon
            const btn = document.getElementById('theme-switcher');

            if (btn) {

                btn.innerHTML = newTheme === 'dark'
                    ? '<i data-lucide="sun" width="16" height="16"></i>'
                    : '<i data-lucide="moon" width="16" height="16"></i>';

                lucide.createIcons();
            }

        }

        // ─── Fallback ───
        if (!document.startViewTransition) {

            applyTheme();

            return;
        }

        // ─── Start Transition ───
        const transition = document.startViewTransition(() => {
            applyTheme();
        });

        transition.ready.then(() => {

            // ─── LIGHT → DARK ───
            // dark muncul dari tombol
            if (currentTheme === 'light') {

                document.documentElement.animate(
                    {
                        clipPath: [
                            `circle(0px at ${x}px ${y}px)`,
                            `circle(${endRadius}px at ${x}px ${y}px)`
                        ]
                    },
                    {
                        duration: 700,
                        easing: 'ease-in-out',
                        pseudoElement: '::view-transition-new(root)'
                    }
                );

            }

            // ─── DARK → LIGHT ───
            // cahaya muncul dari tombol
            else {

                document.documentElement.animate(
                    {
                        clipPath: [
                            `circle(0px at ${x}px ${y}px)`,
                            `circle(${endRadius}px at ${x}px ${y}px)`
                        ]
                    },
                    {
                        duration: 700,
                        easing: 'ease-in-out',
                        pseudoElement: '::view-transition-new(root)'
                    }
                );

            }

        });

    }
</script>
        @stack('js')
    </body>
</html>
