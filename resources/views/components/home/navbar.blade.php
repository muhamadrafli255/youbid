<nav id="navbar-top" class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand font-weigt-bold" href="/">YOUBID</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <form class="d-flex my-auto form-search">
                    <input class="form-control me-2 search" type="search" placeholder="Cari lelang apa?"
                        aria-label="Search">
                </form>
            </ul>
            <ul class="navbar-nav me-auto mb-5 mb-lg-0 mt-1">
                <li class="nav-item {{ Request::is('auction/object') ? 'active' : '' }}">
                    <a class="nav-link" aria-current="page" href="/auction/object">Objek Lelang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Jadwal Lelang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Ikut Lelang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Beli Tiket</a>
                </li>
                <div class="d-flex mx-3 text-secondary">
                    <div class="vr"></div>
                </div>
                @if (auth()->user())
                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1 mt-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"><span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger">3+</span></i>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Alerts Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 12, 2019</div>
                                <span class="font-weight-bold">A new monthly report is ready to download!</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                    <i class="fas fa-donate text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 7, 2019</div>
                                $290.29 has been deposited into your account!
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 2, 2019</div>
                                Spending Alert: We've noticed unusually high spending for your account.
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow ml-2 mt-0">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-light">{{ auth()->user()->full_name }}</span>
                        <img class="img-profile rounded-circle" src="/img/undraw_profile.svg" height="30px"
                            width="30px">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/register" tabindex="-1" aria-disabled="true">Daftar</a>
                </li>
                <li class="nav-item">
                    <a href="/login" class="btn btn-login btn-outline-light">
                        <p class="btn-text">Login</p>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
