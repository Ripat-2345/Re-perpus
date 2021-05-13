<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="./app/assets/img/logo/logoTritech.png" style="background-color: white; border-radius:10%;">
        </div>
        <div class="sidebar-brand-text mx-3">Perpustkaan Tritech</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="./dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
            <i class="fas fa-users"></i>
            <span>Users</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manajemen User</h6>
                <a class="collapse-item" href="./Petugas_tbl.php">Manajemen Petugas</a>
                <a class="collapse-item" href="./siswa_tbl.php">Manajemen Siswa</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePerpustakaan" aria-expanded="true" aria-controls="collapsePerpustakaan">
            <i class="fas fa-book-reader"></i>
            <span>Perpustakaan</span>
        </a>
        <div id="collapsePerpustakaan" class="collapse" aria-labelledby="headingPerpustakaan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manajemen Perpustakaan</h6>
                <a class="collapse-item" href="./buku_tbl.php">Manajemen Buku</a>
                <a class="collapse-item" href="./kategori_tbl.php">Manajemen Kategori Buku</a>
                <a class="collapse-item" href="./peminjaman_tbl.php">Manajemen Peminjaman</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./history">
            <i class="fas fa-history"></i>
            <span>History</span>
        </a>
    </li>
</ul>