<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">PinjamRuang</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
              <li class="{{ Request::is('/*') ? 'active': '' }}">
                <a href="/" class="nav-link"><i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
              </li>
              @can('mix')
              <li class="menu-header">Master Data</li>
            <li class="{{ Request::is('gedung*') ? 'active': '' }}">
                <a class="nav-link" href="/gedung"><i class="fas fa-th-large"></i>
                    <span>Data Gedung</span>
                </a>
            </li>
            <li class="{{ Request::is('roomtype*') ? 'active': '' }}">
                <a class="nav-link" href="/roomtype"><i class="fas fa-th-large"></i>
                    <span>Data Jenis Ruangan</span>
                </a>
            </li>
            <li class="{{ Request::is('ruangan*') ? 'active': '' }}">
                <a class="nav-link" href="/ruangan"><i class="fas fa-th-large"></i>
                    <span>Data Ruangan</span>
                </a>
            </li>
            <li class="menu-header">Data User</li>
            <li class="{{ Request::is('user*') ? 'active': '' }}">
                <a href="/user" class="nav-link"><i class="far fa-user"></i>
                    <span>User</span>
                </a>
            </li>
            @endcan
            @can('mix')
            <li class="menu-header">Peminjaman</li>
            <li class="{{ Request::is('rental*') ? 'active': '' }}">
                <a href="/rental" class="nav-link"><i class="fas fa-pencil-ruler"></i>
                    <span>Peminjaman</span>
                </a>
            </li>
            @endcan
            @can('user')
            <li class="{{ Request::is('rents/create') ? 'active': '' }}">
                <a href="/rents/create" class="nav-link"><i class="fas fa-pencil-ruler"></i>
                    <span>Peminjaman</span>
                </a>
            </li>
            <li class="{{ Request::is('rents') ? 'active': '' }}">
                <a href="/rents" class="nav-link"><i class="fas fa-pencil-ruler"></i>
                    <span>Riwayat Peminjaman</span>
                </a>
            </li>
            @endcan
        </ul>
        @can('mix')
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="/laporan" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-file-alt"></i> Laporan
            </a>
        </div>  
        @endcan
    </aside>
</div>
