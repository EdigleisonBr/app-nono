<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="/" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">
                Nonô FC
                <i class="fas fa-circle text-primary"></i>
                <i class="fas fa-circle text-dark"></i>
                <i class="fas fa-circle text-white"></i>
            </h3>
        </a>
        @auth
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img src="/assets/img/user.jpeg" style="width: 30px; height: 30px;">
                    <!-- <i class="fa fa-user me-lg-2 text-success"></i> -->
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">{{Auth::user()->name}}</h6>
                    <span>Administrador</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="/" class="nav-item nav-link active">
                    <img src="/assets/img/home.jpeg" style="width: 40px; height: 40px;">
                    <!-- <i class="fa fa-home me-2"></i> -->
                    Principal
                </a>
                <a href="/athlete/index" class="nav-item nav-link">
                    <img src="/assets/img/athlete.jpeg" style="width: 40px; height: 40px;">
                    <!-- <i class="fa fa-running me-2"></i> -->
                    Atletas
                </a>
                <a href="/oppossing_team/index" class="nav-item nav-link">
                    <img src="/assets/img/empty.jpeg" style="width: 40px; height: 40px;">
                    <!-- <i class="fa fa-flag me-2"></i> -->
                    Times
                </a>
                <a href="/match/index" class="nav-item nav-link">
                    <img src="/assets/img/matche.jpeg" style="width: 40px; height: 40px;">
                    <!-- <i class="fa fa-futbol me-2"></i> -->
                    Partidas
                </a>
                </div>
        @endauth
        @guest
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img src="/assets/img/user-not-logged.jpeg" style="width: 40px; height: 40px;">
                    <!-- <i class="fa fa-user me-lg-2 text-warning"></i> -->
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">Convidado</h6>
                    <!-- <span>Não logado</span> -->
                </div>
            </div>
        @endguest
    </nav>
</div>