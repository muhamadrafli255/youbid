        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-gavel"></i>
                </div>
                <div class="sidebar-brand-text mx-3">YouBID</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('dashboard*') ? 'active' : '' }}">
                <a class="nav-link" href="/">
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

                <!-- Nav Item - Petugas -->
                <li class="nav-item {{ Request::is('officers*') ? 'active' : '' }}">
                    <a class="nav-link" href="/officers">
                        <i class="fas fa-fw fa-user-tie"></i>
                        <span>Petugas</span></a>
                </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-white">
                Kelola Barang
            </div>

            <!-- Nav Item - Kategori -->
            <li class="nav-item">
                <a class="nav-link" href="/categories">
                    <i class="fas fa-fw fa-tag"></i>
                    <span>Kategori</span></a>
            </li>

            <!-- Nav Item - Merk -->
            <li class="nav-item">
                <a class="nav-link" href="/brands">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Merk</span></a>
            </li>

            <!-- Nav Item - Model -->
            <li class="nav-item">
                <a class="nav-link" href="/models">
                    <i class="fas fa-fw fa-motorcycle"></i>
                    <span>Model</span></a>
            </li>

            <!-- Nav Item - Barang -->
            <li class="nav-item">
                <a class="nav-link" href="/items">
                    <i class="fas fa-fw fa-car"></i>
                    <span>Barang</span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-white">
                Kelola Lelang
            </div>

            <!-- Nav Item - Lot -->
            <li class="nav-item">
                <a class="nav-link" href="/lots">
                    <i class="fas fa-fw fa-door-open"></i>
                <span>Lot</span></a>
            </li>

            <!-- Nav Item - Lelang -->
            <li class="nav-item">
                <a class="nav-link" href="/auctions">
                    <i class="fas fa-fw fa-gavel"></i>
                <span>Lelang</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->