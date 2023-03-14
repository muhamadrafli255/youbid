@section('script')
<script src="https://kit.fontawesome.com/0661b15b8c.js" crossorigin="anonymous"></script>
@endsection
<!-- Sidebar -->
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-gavel"></i>
                </div>
                <div class="sidebar-brand-text mx-3">YouBID</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('dashboard*') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-white">
                Kelola Pengguna
            </div>

                <!-- Nav Item - Masyarakat -->
                <li class="nav-item {{ Request::is('societies*') ? 'active' : '' }}">
                    <a class="nav-link" href="/societies">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Masyarakat</span></a>
                </li>
                @role('admin')
                <!-- Nav Item - Petugas -->
                <li class="nav-item {{ Request::is('officers*') ? 'active' : '' }}">
                    <a class="nav-link" href="/officers">
                        <i class="fas fa-fw fa-user-tie"></i>
                        <span>Petugas</span></a>
                </li>
                @endrole

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-white">
                Kelola Barang
            </div>

            <!-- Nav Item - Kategori -->
            <li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
                <a class="nav-link" href="/categories">
                    <i class="fas fa-fw fa-tag"></i>
                    <span>Kategori</span></a>
            </li>

            <!-- Nav Item - Merk -->
            <li class="nav-item {{ Request::is('brands*') ? 'active' : '' }}">
                <a class="nav-link" href="/brands">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Merk</span></a>
            </li>

            <!-- Nav Item - Model -->
            <li class="nav-item {{ Request::is('models*') ? 'active' : '' }}">
                <a class="nav-link" href="/models">
                    <i class="fas fa-fw fa-motorcycle"></i>
                    <span>Model</span></a>
            </li>

            <!-- Nav Item - Barang -->
            <li class="nav-item {{ Request::is('items*') ? 'active' : '' }}">
                <a class="nav-link" href="/items">
                    <i class="fas fa-fw fa-car"></i>
                    <span>Barang</span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-white">
                Kelola Lelang
            </div>

            <!-- Nav Item - Location -->
            <li class="nav-item {{ Request::is('location*') ? 'active' : '' }}">
                <a class="nav-link" href="/location">
                    <i class="fas fa-location-dot"></i>
                <span>Lokasi</span></a>
            </li>

            <!-- Nav Item - Lot -->
            <li class="nav-item {{ Request::is('lots*') ? 'active' : '' }}">
                <a class="nav-link" href="/lots">
                    <i class="fas fa-fw fa-door-open"></i>
                <span>Lot</span></a>
            </li>

            <li class="nav-item {{ Request::is('multipleprice*') ? 'active' : '' }}">
                <a class="nav-link" href="/multipleprice">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                <span>Harga Kelipatan</span></a>
            </li>

            <li class="nav-item {{ Request::is('ticketprice*') ? 'active' : '' }}">
                <a class="nav-link" href="/ticketprice">
                    <i class="fas fa-fw fa-money-bill"></i>
                <span>Harga Tiket</span></a>
            </li>

            <!-- Nav Item - Lelang -->
            <li class="nav-item {{ Request::is('auctions*') ? 'active' : '' }}">
                <a class="nav-link" href="/auctions">
                    <i class="fas fa-fw fa-gavel"></i>
                <span>Lelang</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/auctions">
                    <i class="fas fa-fw fa-file"></i>
                <span>Laporan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->