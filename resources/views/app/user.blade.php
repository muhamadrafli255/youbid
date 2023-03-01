<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <!-- MyStyle -->
    <link rel="stylesheet" href="/assets/css/mystyle.css">
    <!-- Remix Icon -->
    <link rel="stylesheet" href="/assets/fonts/remixicon.css">
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <title>YouBID | {{ $title }}</title>
</head>

<body onscroll="scrollFunction()" style="font-family: 'Nunito', sans-serif">
    <nav id="myNav">
        <div class="header-1">
            <div class="item-header-1 d-flex justify-content-end align-items-center">
                <div class="d-flex align-items-center">
                    <div class="text-1">
                        <i class="ri-customer-service-line"></i>
                        <span class="mr-4">Pusat Bantuan</span>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="text-1">
                        <i class="ri-auction-fill"></i>
                        <span class="mr-4">Titip Lelang</span>
                    </div>
                    <div class="text-1">
                        <i class="ri-file-warning-fill"></i>
                        <span class="mr-4">Prosedur Lelang</span>
                    </div>
                    <div class="text-1">
                        <i class="ri-question-line"></i>
                        <span class="mr-4">Tentang Youbid</span>
                    </div>
                </div>
            </div>
            <div class="item-header-2 d-flex flex-column shadow">
                <div class="d-flex justify-content-beetwen align-items-center">
                    <img class="img-logo mr-4" src="/assets/img/logo.png" alt="">
                    <div class="wrap-search">
                        <form action="">
                            <input type="text" class="form-control rounded-pill" placeholder="Masukkan Kata Kunci...">
                            <div class="wrap-icon-search">
                                <i class="img-search ri-search-line"></i>
                            </div>
                        </form>
                    </div>
                    <ul class="navbar d-flex justify-content-beetwen align-items-center">
                        <li><a href="">Objek Lelang</a></li>
                        <li><a href="">Jadwal Lelang</a></li>
                        <li><a href="">Ikut Lelang</a></li>
                        <li><a href="/buyticket" class="{{ Request::is('buyticket') ? 'text-danger' : '' }}">Beli Tiket</a></li>
                    </ul>
                    <hr class="line">
                    <ul class="navbar-2 d-flex justify-content-beetwen align-items-center">
                        @if (Auth::user())
                        <li><a class="register">{{ Auth::user()->full_name }}</a></li>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle register" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (Auth::user()->image)    
                                <img class="img-profile rounded-circle"
                                    src="/img/profile-images/{{ Auth::user()->image }}">
                                @else
                                <img class="img-profile rounded-circle"
                                    src="/img/undraw_profile.svg">
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow bg-secondary"
                                aria-labelledby="userDropdown">
                                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                                <a class="dropdown-item" href="/dashboard">
                                    <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-black"></i>
                                    Dashboard
                                </a>
                                @else
                                    
                                @endif
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-black"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-black"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-black"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-black"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                        @else
                        <li><a href="/register" class="register">Daftar</a></li>
                        <li><a href="/login" class="btn btn-danger rounded-pill">Masuk</a></li>
                        @endif
                    </ul>
                    <button class="tooglenav btn" id="navBtn"><i class="ri-menu-line"></i></button>
                </div>
            </div>
            <div id="mobileNavbar" class="card mobile-navbar d-none">
                <ul>
                    <div class="wrap-search align-items-center mt-3 mb-5 mr-4">
                        <form action="">
                            <input type="text" class="form-control rounded-pill" placeholder="Masukkan Kata Kunci...">
                        </form>
                    </div>
                    <li><a href="/register">Objek Lelang</a></li>
                    <hr>
                    <li><a href="">Jadwal Lelang</a></li>
                    <hr>
                    <li><a href="">Ikut Lelang</a></li>
                    <hr>
                    <li><a href="/buyticket">Beli Tiket</a></li>
                    <hr>
                </ul>
                <ul class="mobile-navbar-2">
                    <li><a href="/register" class="btn btn-outline-danger rounded-pill">Daftar</a></li>
                    </a>
                    <li><a href="/login" class="login btn btn-danger rounded-pill">Masuk</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

            <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Akan Keluar Dari <span class="text-danger">Youbid</span>?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik "Yakin" jika anda ingin keluar!.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger" href="/logout">Yakin</a>
            </div>
        </div>
    </div>
</div>
</body>
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/script.js"></script>
<script src="/js/sb-admin-2.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>
