<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-database"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BKPSDM <sup>MAMUJU TENGAH</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span></span>Dashboard</a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pengaduan</span>
        </a>
        <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pengaduan:</h6>
                <a class="collapse-item" href="{{ route('pengaduans.index') }}">All</a>
                <a class="collapse-item" href="{{ route('pengaduans.listBaru') }}">Baru</a>
                <a class="collapse-item" href="{{ route('pengaduans.listProses') }}">Proses</a>
                <a class="collapse-item" href="{{ route('pengaduans.listSelesai') }}">Selesai</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
            <i class="fas fa-fw fa-cog"></i>
            <span>Kategori</span>
        </a>
        <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kategori:</h6>
                <a class="collapse-item" href="{{ route('kategoris.index') }}">List</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse2">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pengguna</span>
        </a>
        <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pengguna:</h6>
                <a class="collapse-item" href="{{ route('users.index') }}">All</a>
                <a class="collapse-item" href="{{ route('users.listAdmin') }}">Admin</a>
                <a class="collapse-item" href="{{ route('users.listWarga') }}">Warga</a>
                <a class="collapse-item" href="{{ route('users.listStaff') }}">Staff</a>
            </div>
        </div>
    </li>

    <br>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>