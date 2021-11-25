<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">P3TI</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">p3ti</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
              <li class="{{ ($title === "Dashboard") ? 'active' : '' }}">
                <a href="/dashboard" class="nav-link"><i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
              </li>
            <li class="menu-header">Master Data</li>
            <li class="{{ ($title === "Data Gedung") ? 'active' : '' }}">
                <a class="nav-link" href="/"><i class="fas fa-th-large"></i>
                    <span>Data Gedung</span>
                </a>
            </li>
            <li class="{{ ($title === "Data Jenis Ruangan") ? 'active' : '' }}">
                <a class="nav-link" href="/jenisruanganList"><i class="fas fa-th-large"></i>
                    <span>Data Jenis Ruangan</span>
                </a>
            </li>
            <li class="{{ ($title === "Data Ruangan") ? 'active' : '' }}">
                <a class="nav-link" href="/ruanganList"><i class="fas fa-th-large"></i>
                    <span>Data Ruangan</span>
                </a>
            </li>
            <li class="menu-header">Data User</li>
            <li class="{{ ($title === "User") ? 'active' : '' }}">
                <a href="/userList" class="nav-link"><i class="far fa-user"></i>
                    <span>User</span>
                </a>
            </li>
            {{-- <li class="menu-header">Peminjaman</li>
            <li class="{{ ($title === "Peminjaman") ? 'active' : '' }}">
                <a href="/peminjamanList" class="nav-link"><i class="fas fa-pencil-ruler"></i>
                    <span>Peminjaman</span>
                </a>
            </li> --}}
        </ul>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="/laporan" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-file-alt"></i> Laporan
            </a>
        </div>
    </aside>
</div>
