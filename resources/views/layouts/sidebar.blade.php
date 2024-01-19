<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fas fa-futbol me-2 text-dark"></i>NONÔ FC<i class="fas fa-futbol ms-2 text-dark"></i></h3>
                </a>
                @auth
                    <div class="d-flex align-items-center ms-4 mb-4">
                        <div class="position-relative">
                            <i class="fa fa-user me-lg-2 text-success"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0">{{Auth::user()->name}}</h6>
                            <span>Admin</span>
                        </div>
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="{{ route('dashboard') }}" class="nav-item nav-link active"><i class="fa fa-home me-2"></i>Principal</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="button.html" class="dropdown-item">Buttons</a>
                                <a href="typography.html" class="dropdown-item">Typography</a>
                                <a href="element.html" class="dropdown-item">Other Elements</a>
                            </div>
                        </div>
                        <a href="athlete/index" class="nav-item nav-link"><i class="fa fa-running me-2"></i>Atletas</a>
                        <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                        <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                        <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="signin.html" class="dropdown-item">Sign In</a>
                                <a href="signup.html" class="dropdown-item">Sign Up</a>
                                <a href="404.html" class="dropdown-item">404 Error</a>
                                <a href="blank.html" class="dropdown-item">Blank Page</a>
                            </div>
                        </div>
                    </div>
                @endauth
                @guest
                    <div class="d-flex align-items-center ms-4 mb-4">
                        <div class="position-relative">
                            <i class="fa fa-user me-lg-2 text-warning"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0">Convidado</h6>
                            <span>Online</span>
                        </div>
                    </div>
                @endguest
            </nav>
        </div>