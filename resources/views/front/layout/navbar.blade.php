<nav class="navbar navbar-expand-lg" style="background:#1c1917; border-bottom:1px solid #292524;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('uploads/' . $config['logo']) }}" alt="Inkwell Logo" style="max-width: 35%; height: 10%; object-fit: contain">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border-color:#e9e7e1;">
            <span class="navbar-toggler-icon" style="filter:invert(1) sepia(1) saturate(5) hue-rotate(330deg);"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item"><a class="nav-link" style="color:#ffffff; font-size:.88rem; font-weight:500;" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" style="color:#ffffff; font-size:.88rem; font-weight:500;" href="{{ url('/articles') }}">Article</a></li>
                <li class="nav-item"><a class="nav-link" style="color:#ffffff; font-size:.88rem; font-weight:500;" href="{{ url('/about') }}">About</a></li>

                {{-- Dark mode toggle --}}
                <li class="nav-item">
    <button id="theme-switcher"
            onclick="toggleTheme(event)"
            aria-label="Toggle theme"
            style="background:none; border:1px solid #44403c; border-radius:6px; padding:6px 10px; cursor:pointer; color:#a8a29e; margin:0 8px; display:flex; align-items:center; justify-content:center; transition:border-color .2s;"
            onmouseover="this.style.borderColor='#a8a29e'" onmouseout="this.style.borderColor='#44403c'">
        <i data-lucide="moon" width="16" height="16"></i>
    </button>
</li>

                @guest
                    <li class="nav-item"><a class="nav-link" style="color:#ffffff; font-size:.88rem; font-weight:500; border:1px solid #e9e7e1; border-radius:6px; padding:6px 14px; margin-right:8px;" href="{{ route('register') }}">Register</a></li>
                    <li class="nav-item"><a class="nav-link" style="background:#c2410c; color:#fff; font-size:.88rem; font-weight:600; border-radius:6px; padding:6px 14px;" href="{{ route('login') }}">Login</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color:#ffffff; font-size:.88rem; font-weight:500;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="border-color:#e9e7e1; border-radius:8px;">
                            <li><a class="dropdown-item" style="font-size:.88rem;" href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li>
                                <a class="dropdown-item" style="font-size:.88rem;" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
