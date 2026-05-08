<style>
/* ─── Inkwell Sidebar — Warm Light (Opsi 2) ─── */
.ink-sidebar {
    width: 220px;
    min-height: calc(100vh - 56px);
    background: #f0ede7;
    border-right: 1px solid #e9e7e1;
    padding: 24px 0 32px;
    display: flex;
    flex-direction: column;
    position: sticky;
    top: 56px;
    height: calc(100vh - 56px);
    overflow-y: auto;
}

.ink-sidebar-label {
    font-size: .6rem;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: #b5b0a8;
    padding: 0 20px;
    margin: 0 0 4px;
}

.ink-sidebar-nav {
    list-style: none;
    padding: 0;
    margin: 0 0 20px;
}

.ink-sidebar-nav .ink-nav-link {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 9px 20px;
    font-size: .85rem;
    font-weight: 500;
    color: #78716c;
    text-decoration: none;
    border-left: 2px solid transparent;
    transition: color .18s, background .18s, border-color .18s;
}
.ink-sidebar-nav .ink-nav-link svg {
    width: 16px; height: 16px;
    stroke: currentColor;
    flex-shrink: 0;
    opacity: .55;
    transition: opacity .18s;
}
.ink-sidebar-nav .ink-nav-link:hover {
    color: #1c1917;
    background: #e8e3db;
    border-left-color: #c9c4bc;
}
.ink-sidebar-nav .ink-nav-link:hover svg { opacity: 1; }

/* Active */
.ink-sidebar-nav .ink-nav-link.active {
    color: #c2410c;
    background: #ede5dc;
    border-left-color: #c2410c;
    font-weight: 600;
}
.ink-sidebar-nav .ink-nav-link.active svg { opacity: 1; }

.ink-sidebar-divider {
    height: 1px;
    background: #e9e7e1;
    margin: 8px 20px 16px;
}

.ink-sidebar-footer { margin-top: auto; }
.ink-sidebar-footer .ink-nav-link { color: #b5b0a8; }
.ink-sidebar-footer .ink-nav-link:hover {
    color: #c2410c;
    background: #f5e8e4;
    border-left-color: #c2410c;
}

@media (max-width: 768px) {
    .ink-sidebar {
        position: relative;
        top: 0;
        height: auto;
        width: 100%;
        min-height: unset;
        border-right: none;
        border-bottom: 1px solid #e9e7e1;
        padding: 12px 0 16px;
    }
}
</style>

<nav id="sidebarMenu"
     class="col-md-3 col-lg-2 d-md-block sidebar collapse ink-sidebar">
    <div>

        <p class="ink-sidebar-label">Main</p>
        <ul class="ink-sidebar-nav">
            <li>
                <a href="{{ url('/dashboard') }}"
                   class="ink-nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ url('/') }}"
                   class="ink-nav-link {{ Request::is('/') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                    </svg>
                    Home
                </a>
            </li>
        </ul>

        <p class="ink-sidebar-label">Content</p>
        <ul class="ink-sidebar-nav">
            <li>
                <a href="{{ url('/article') }}"
                   class="ink-nav-link {{ Request::is('article*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                    </svg>
                    Articles
                </a>
            </li>
            @if(auth()->user()->isAdmin())
            <li>
                <a href="{{ url('/categories') }}"
                   class="ink-nav-link {{ Request::is('categories*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z"/>
                    </svg>
                    Categories
                </a>
            </li>
            @endif
        </ul>

        @if(auth()->user()->isAdmin())
        <p class="ink-sidebar-label">Admin</p>
        <ul class="ink-sidebar-nav">
            <li>
                <a href="{{ url('/users') }}"
                   class="ink-nav-link {{ Request::is('users*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.75 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/>
                    </svg>
                    Users
                </a>
            </li>
            <li>
                <a href="{{ url('/config') }}"
                   class="ink-nav-link {{ Request::is('config*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                    Settings
                </a>
            </li>
        </ul>
        @else
        <p class="ink-sidebar-label">Account</p>
        <ul class="ink-sidebar-nav">
            <li>
                <a href="{{ url('/users') }}"
                   class="ink-nav-link {{ Request::is('users*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                    </svg>
                    Users
                </a>
            </li>
        </ul>
        @endif

        <div class="ink-sidebar-divider"></div>
        <div class="ink-sidebar-footer">
            <ul class="ink-sidebar-nav">
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}" class="ink-nav-link"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"/>
                        </svg>
                        Logout
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav> 
