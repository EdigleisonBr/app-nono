<nav class="navbar navbar-expand bg-white navbar-light sticky-top px-4 py-0">
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <!-- <i class="fa fa-bars"></i> -->
        <img src="/assets/img/liga.png" alt="" style="width: 50px; height: 50px;">
    </a>
    @php
        $seasons = \App\Models\Matche::pluck('match_date')
        ->map(function ($date) {
            return \Carbon\Carbon::parse($date)->year;
        })
        ->unique()
        ->sortDesc();
    @endphp
    
    <form class="d-md-flex ms-3" action="/" method="GET" id="season-form">
        <div class="d-flex align-items-center bg-light p-1 rounded">
            <span class="me-2 fw-bold">TEMPORADA</span>
            <select id="season" name="season" class="form-select bg-light">
                <option>{{$season}}</option>
                @foreach($seasons as $season_)
                    @if ($season != $season_)
                        <option value={{$season_}}>{{$season_}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </form>
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

<script>
    // Loading year
    const seasonSelect = document.getElementById('season');
    const form = document.getElementById('season-form');
    
    seasonSelect.addEventListener('change', function() {
        form.submit();  // Submete o formulário quando o valor do select mudar
    });
    // end Loading
</script>