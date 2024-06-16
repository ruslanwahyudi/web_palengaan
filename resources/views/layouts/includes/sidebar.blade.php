<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
              <img width="200" height="60" src="{{ asset('frontend/img/logo.png') }}" alt="Logo">
              </span>
              <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2">{{ $settings[0]->app_name }}</span> -->
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ Route::is('admin.dashboard') ? 'active':'' }}">
              <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Administrasi Kecamatan</span>
            </li>

            <!-- Layouts -->
            <li class="menu-item {{ Route::is('*.pegawai') || Route::is('*.surat_tugas') ? 'active open':'' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Kepegawaian</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item {{ Route::is('*.pegawai') ? 'active':'' }}">
                  <a href="{{ route('daftar.pegawai') }}" class="menu-link">
                    <div data-i18n="Without menu">Daftar Pegawai</div>
                  </a>
                </li>
                <li class="menu-item {{ Route::is('*.surat_tugas') ? 'active':'' }}">
                  <a href="{{ route('all.surat_tugas') }}" class="menu-link">
                    <div data-i18n="Without menu">Dinas Luar</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item {{ Route::is('*.manajemensurat') || Route::is('*.manajemensurat') ? 'active open':'' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Layouts">Manajemen Surat</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item {{ Route::is('*.manajemensurat') ? 'active':'' }}">
                  <a href="{{ route('all.manajemensurat') }}" class="menu-link">
                    <div data-i18n="Without menu">Surat Masuk/Keluar</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Blogs & Pages</span>
            </li>
            <li class="menu-item  {{ Route::is('*.tag')||Route::is('*.category') ||Route::is('*.article') ? 'active open':'' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Blogs</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item  {{ Route::is('*.tag') ? 'active':'' }}">
                  <a href="{{ route('all.tag') }}" class="menu-link">
                    <div data-i18n="Account">All Tags</div>
                  </a>
                </li>
                <li class="menu-item  {{ Route::is('*.category') ? 'active':'' }}">
                  <a href="{{ route('all.category') }}" class="menu-link">
                    <div data-i18n="Account">All Category</div>
                  </a>
                </li>

                <li class="menu-item  {{ Route::is('*.article') ? 'active':'' }}">
                  <a href="{{ route('all.article') }}" class="menu-link">
                    <div data-i18n="Account">All Article</div>
                  </a>
                </li>
                
                
              </ul>
            </li>

            <li class="menu-item  {{ Route::is('*.sakip')||Route::is('*.page') ? 'active open':'' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Pages</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item {{ (Route::is('*.page') && (request()->segments()['2'] == '0') ) ? 'active':'' }}">
                  <a href="{{ route('edit.page', '0') }}" class="menu-link">
                    <div data-i18n="Account">Informasi Organisasi</div>
                  </a>
                </li>

                <li class="menu-item {{ (Route::is('*.page') && (request()->segments()['2'] == '1') ) ? 'active':'' }}">
                  <a href="{{ route('edit.page', '1') }}" class="menu-link">
                    <div data-i18n="Account">Visi Misi</div>
                  </a>
                </li>

                <li class="menu-item {{ (Route::is('*.page') && (request()->segments()['2'] == '2') ) ? 'active':'' }}">
                  <a href="{{ route('edit.page', '2') }}" class="menu-link">
                    <div data-i18n="Account">Struktur Organisasi</div>
                  </a>
                </li>

                <li class="menu-item {{ (Route::is('*.page') && (request()->segments()['2'] == '3') ) ? 'active':'' }}">
                  <a href="{{ route('edit.page', '3') }}" class="menu-link">
                    <div data-i18n="Account">Alur Pelayanan</div>
                  </a>
                </li>

                <li class="menu-item  {{ Route::is('*.sakip') ? 'active':'' }}">
                  <a href="{{ route('data.sakip') }}" class="menu-link">
                    <div data-i18n="Account">Dok. Sakip</div>
                  </a>
                </li>
                
                
              </ul>
            </li>


            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Settings</span>
            </li>
            <li class="menu-item  {{ Route::is('*.roles.permission')||Route::is('*.permission')||Route::is('*.role') ? 'active open':'' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Role & Permission</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item  {{ Route::is('all.permission') ? 'active':'' }}">
                  <a href="{{ route('all.permission') }}" class="menu-link">
                    <div data-i18n="Account">All Permissions</div>
                  </a>
                </li>

                <li class="menu-item  {{ Route::is('all.role') ? 'active':'' }}">
                  <a href="{{ route('all.role') }}" class="menu-link">
                    <div data-i18n="Account">All Roles</div>
                  </a>
                </li>

                <li class="menu-item  {{ Route::is('all.role.permission') ? 'active':'' }}">
                  <a href="{{ route('all.role.permission') }}" class="menu-link">
                    <div data-i18n="Account">All Roles in Permission</div>
                  </a>
                </li>
                
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Authentications</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('admin.profile') }}" class="menu-link" target="_blank">
                    <div data-i18n="Basic">My Profile</div>
                  </a>
                </li>
                
              </ul>
            </li>
            
          </ul>
        </aside>