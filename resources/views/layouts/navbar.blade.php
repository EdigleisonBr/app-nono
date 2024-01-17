<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
           
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    
    <div class="navbar-nav align-items-center ms-auto">
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <li>
                    <a class="nav-link" href="/logout"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt me-lg-2 text-danger"></i>
                        <span class="d-none d-lg-inline-flex">Sair</span>
                    </a>
                </li>
            </form>
        @endauth
        @guest
            <a href="{{ route('login') }}" class="nav-link">
                <i class="fas fa-sign-in-alt me-lg-2 text-success"></i>
                <span class="d-none d-lg-inline-flex">Entrar</span>
            </a>
        @endguest
    </div>

</nav>