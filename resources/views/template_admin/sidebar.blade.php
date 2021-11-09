<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                  <a href="#" class="logosidebar"><b>Tes <span>PT. Jasamedika Saranatama</span></b></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item @yield('home')">
                    <a href="{{ route('halaman_utama.index') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item @yield('jabatan')">
                  <a href="{{ route('jabatan.index') }}" class='sidebar-link'>
                    <i class="bi bi-newspaper"></i>
                      <span>Master Jabatan</span>
                  </a>
                </li>
                <li class="sidebar-item @yield('pegawai')">
                  <a href="{{ route('pegawai.index') }}" class='sidebar-link'>
                    <i class="bi bi-newspaper"></i>
                      <span>Master Pegawai</span>
                  </a>
                </li>
                <li class="sidebar-item @yield('tugas_jabatan')">
                  <a href="{{ route('tugas_jabatan.index') }}" class='sidebar-link'>
                    <i class="bi bi-newspaper"></i>
                      <span>Master Tugas Jabatan</span>
                  </a>
                </li>
                <li class="sidebar-item @yield('laporan_kinerja')">
                  <a href="{{ route('laporan_kinerja.index') }}" class='sidebar-link'>
                    <i class="bi bi-newspaper"></i>
                      <span>Master Laporan Kinerja</span>
                  </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
