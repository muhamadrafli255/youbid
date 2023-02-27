<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!-- MyStyle -->
    <link rel="stylesheet" href="assets/css/mystyle.css">
    <!-- Remix Icon -->
    <link rel="stylesheet" href="assets/fonts/remixicon.css">
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <title>YouBID | Home</title>
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
            <div class="item-header-2 d-flex flex-column">
                <div class="d-flex justify-content-beetwen align-items-center">
                    <img class="img-logo mr-4" src="assets/img/logo.png" alt="">
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
                        <li><a href="">Beli Tiket</a></li>
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
                    <li><a href="">Beli Tiket</a></li>
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


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner mt-4">
            <div class="carousel-item active">
                <img src="assets/img/slides/slide1.png" height="400" class="d-block w-100 img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100 bg-primary" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>

    <div class="container-fluid mt-4">
        <div class="info-card text-danger">
            <div class="d-flex">
                <i class="ri-alarm-warning-fill"></i>
                <span class="font-weight-bold">INFO</span>
                <marquee>Batal Lelang Karena Ada Kepentingan Meeting!</marquee>
            </div>
        </div>
        <div class="card mt-4 mb-4 shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <h5 class="font-weight-bold mb-4">Kategori Pilihan</h5>
                        <div class="row">
                            <div class="card-category card ml-2 mx-auto mb-4" style="width: 12rem;">
                                <img src="assets/img/option-search/mobil.png" class="card-img-top img-fluid"
                                    height="75px" alt="..." height="90px" width="125px">
                                <div class="card-body">
                                    <h5 class="card-title text-center mt-5">Mobil</h5>
                                </div>
                            </div>
                            <div class="card-category card ml-2 mx-auto mb-4" style="width: 12rem;">
                                <img src="assets/img/option-search/motor.png" class="card-img-top img-fluid"
                                    height="75px" alt="..." height="90px" width="125px">
                                <div class="card-body">
                                    <h5 class="card-title text-center mt-2">Motor</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12">
                        <h5 class="font-weight-bold mb-4">Jadwal Lelang <a href=""
                                class="text-decoration-none h6 font-weight-bold ml-2 text-danger">Lihat Semua</a></h5>
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-active">Mobil</button>
                                <button class="btn">Motor</button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2 col-sm-4 mb-3 mx-auto">
                                        <div class="card">
                                            <div class="card-body">
                                                <p><span class="badge badge-danger">LIVE</span></p>
                                                <img src="assets/img/option-search/mobil.png" alt=""
                                                    class="float-right img-fluid mb-1" height="95" width="175">
                                                <h6 class="font-weight-bold">20 FEB</h6>
                                                <p style="font-size: 12px;" class="font-weight-bold">11.00 WIB</p>
                                                <p style="font-size: 12px;" class="font-weight-bold">Bandung</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-4 mb-3 mx-auto">
                                        <div class="card">
                                            <div class="card-body">
                                                <p><span class="badge badge-danger">LIVE</span></p>
                                                <img src="assets/img/option-search/mobil.png" alt=""
                                                    class="float-right img-fluid mb-1" height="95" width="175">
                                                <h6 class="font-weight-bold">20 FEB</h6>
                                                <p style="font-size: 12px;" class="font-weight-bold">11.00 WIB</p>
                                                <p style="font-size: 12px;" class="font-weight-bold">Bandung</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-4 mb-3 mx-auto">
                                        <div class="card">
                                            <div class="card-body">
                                                <p><span class="badge badge-danger">LIVE</span></p>
                                                <img src="assets/img/option-search/mobil.png" alt=""
                                                    class="float-right img-fluid mb-1" height="95" width="175">
                                                <h6 class="font-weight-bold">20 FEB</h6>
                                                <p style="font-size: 12px;" class="font-weight-bold">11.00 WIB</p>
                                                <p style="font-size: 12px;" class="font-weight-bold">Bandung</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-4 mb-3 mx-auto">
                                        <div class="card">
                                            <div class="card-body">
                                                <p><span class="badge badge-danger">LIVE</span></p>
                                                <img src="assets/img/option-search/mobil.png" alt=""
                                                    class="float-right img-fluid mb-1" height="95" width="175">
                                                <h6 class="font-weight-bold">20 FEB</h6>
                                                <p style="font-size: 12px;" class="font-weight-bold">11.00 WIB</p>
                                                <p style="font-size: 12px;" class="font-weight-bold">Bandung</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-4 mb-3 mx-auto">
                                        <div class="card">
                                            <div class="card-body">
                                                <p><span class="badge badge-danger">LIVE</span></p>
                                                <img src="assets/img/option-search/mobil.png" alt=""
                                                    class="float-right img-fluid mb-1" height="95" width="175">
                                                <h6 class="font-weight-bold">20 FEB</h6>
                                                <p style="font-size: 12px;" class="font-weight-bold">11.00 WIB</p>
                                                <p style="font-size: 12px;" class="font-weight-bold">Bandung</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-4 mb-3 mx-auto">
                                        <div class="card">
                                            <div class="card-body">
                                                <p><span class="badge badge-danger">LIVE</span></p>
                                                <img src="assets/img/option-search/mobil.png" alt=""
                                                    class="float-right img-fluid mb-1" height="95" width="175">
                                                <h6 class="font-weight-bold">20 FEB</h6>
                                                <p style="font-size: 12px;" class="font-weight-bold">11.00 WIB</p>
                                                <p style="font-size: 12px;" class="font-weight-bold">Bandung</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <h5 class="font-weight-bold mt-5">Lelang Hari Ini <a href=""
                    class="text-decoration-none h6 font-weight-bold ml-2 text-danger">Lihat Semua</a></h5>
            <div class="auction-now">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 mb-3">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top rounded-5"
                                src="data:image/jpeg;base64,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"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Toyota Innova</h5>
                                <p class="card-text justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <i class="ri-calendar-line"></i>
                                        <h6 class="year"> 2019</h6>
                                        <i class="ri-git-merge-fill"></i>
                                        <h6 class="year"> AT</h6>
                                    </div>
                                    <h5 class="text-danger font-weight-bold">Rp. 76.000.000</h5>
                                    <div class="d-flex">
                                        <i class="ri-auction-line"></i>
                                        <h6 class="year font-weight-bold">19 Februari 2023</h6>
                                    </div>
                                    <div class="d-flex">
                                        <i class="ri-map-pin-line"></i>
                                        <h6 class="year font-weight-bold">Bandung</h6>
                                        <div class="text-right">
                                            <p><span class="badge badge-sm badge-danger">LIVE</span></p>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-3">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top rounded-5"
                                src="data:image/jpeg;base64,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"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Toyota Innova</h5>
                                <p class="card-text justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <i class="ri-calendar-line"></i>
                                        <h6 class="year"> 2019</h6>
                                        <i class="ri-git-merge-fill"></i>
                                        <h6 class="year"> AT</h6>
                                    </div>
                                    <h5 class="text-danger font-weight-bold">Rp. 76.000.000</h5>
                                    <div class="d-flex">
                                        <i class="ri-auction-line"></i>
                                        <h6 class="year font-weight-bold">19 Februari 2023</h6>
                                    </div>
                                    <div class="d-flex">
                                        <i class="ri-map-pin-line"></i>
                                        <h6 class="year font-weight-bold">Bandung</h6>
                                        <div class="text-right">
                                            <p><span class="badge badge-sm badge-danger">LIVE</span></p>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-3">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top rounded-5"
                                src="data:image/jpeg;base64,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"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Toyota Innova</h5>
                                <p class="card-text justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <i class="ri-calendar-line"></i>
                                        <h6 class="year"> 2019</h6>
                                        <i class="ri-git-merge-fill"></i>
                                        <h6 class="year"> AT</h6>
                                    </div>
                                    <h5 class="text-danger font-weight-bold">Rp. 76.000.000</h5>
                                    <div class="d-flex">
                                        <i class="ri-auction-line"></i>
                                        <h6 class="year font-weight-bold">19 Februari 2023</h6>
                                    </div>
                                    <div class="d-flex">
                                        <i class="ri-map-pin-line"></i>
                                        <h6 class="year font-weight-bold">Bandung</h6>
                                        <div class="text-right">
                                            <p><span class="badge badge-sm badge-danger">LIVE</span></p>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-3">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top rounded-5"
                                src="data:image/jpeg;base64,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"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Toyota Innova</h5>
                                <p class="card-text justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <i class="ri-calendar-line"></i>
                                        <h6 class="year"> 2019</h6>
                                        <i class="ri-git-merge-fill"></i>
                                        <h6 class="year"> AT</h6>
                                    </div>
                                    <h5 class="text-danger font-weight-bold">Rp. 76.000.000</h5>
                                    <div class="d-flex">
                                        <i class="ri-auction-line"></i>
                                        <h6 class="year font-weight-bold">19 Februari 2023</h6>
                                    </div>
                                    <div class="d-flex">
                                        <i class="ri-map-pin-line"></i>
                                        <h6 class="year font-weight-bold">Bandung</h6>
                                        <div class="text-right">
                                            <p><span class="badge badge-sm badge-danger">LIVE</span></p>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<script src="assets/js/jquery.js"></script>
<script src="assets/js/script.js"></script>
<script src="/js/sb-admin-2.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>
