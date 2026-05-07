<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'text-primary' : '' }}" aria-current="page" href="{{url('/dashboard')}}">
            <span data-feather="layout" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'text-primary' : '' }}" aria-current="page" href="{{url('/')}}">
            <span data-feather="home" class="align-text-bottom"></span>
            Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('article') ? 'text-primary' : '' }}" href="{{url('/article')}}">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Articles
          </a>
        </li>
        @if (auth()->user()->isAdmin())
        <li class="nav-item">
            <a class="nav-link {{ Request::is('categories') ? 'text-primary' : '' }}" href="{{url('/categories')}}">
              <span data-feather="clipboard" class="align-text-bottom"></span>
              Categories
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('config') ? 'text-primary' : '' }}" href="{{url('/config')}}">
              <span data-feather="settings" class="align-text-bottom"></span>
              Settings
            </a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link {{ Request::is('users') ? 'text-primary' : '' }}" href="{{url('/users')}}">
            <span data-feather="users" class="align-text-bottom"></span>
            Users
          </a>
        </li>
        <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          <a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            <span data-feather="log-out" class="align-text-bottom"></span>
            Logout
          </a>
        </li>
      </ul>
    </div>
  </nav>
