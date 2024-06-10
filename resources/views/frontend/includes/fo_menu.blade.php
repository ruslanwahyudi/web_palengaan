<!-- Nav Bar Start -->
<div class="nav-bar">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                        <a href="#" class="navbar-brand">MENU</a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto">
                                <a href="{{route('landingpage')}}" class="nav-item nav-link active">Beranda</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Profil</a>
                                    <div class="dropdown-menu">
                                        <a href="blog.html" class="dropdown-item">Tentang Kami</a>
                                        <a href="single.html" class="dropdown-item">Visi dan Misi</a>
                                        <a href="single.html" class="dropdown-item">Struktur Organisasi</a>
                                    </div>
                                </div>
                                <a href="{{route('all-post')}}" class="nav-item nav-link">Berita</a>
                                <!-- <a href="team.html" class="nav-item nav-link">Data</a> -->
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Inovasi</a>
                                    <div class="dropdown-menu">
                                        <a href="blog.html" class="dropdown-item">Adtraksi</a>
                                        <!-- <a href="single.html" class="dropdown-item">Visi dan Misi</a>
                                        <a href="single.html" class="dropdown-item">Struktur Organisasi</a> -->
                                    </div>
                                </div>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Layanan</a>
                                    <div class="dropdown-menu">
                                        <a href="blog.html" class="dropdown-item">Alur Pelayanan</a>
                                    </div>
                                </div>
                                
                                <!-- <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Data</a>
                                    <div class="dropdown-menu">
                                        <a href="blog.html" class="dropdown-item">Sakip</a>
                                        <a href="single.html" class="dropdown-item">Renstra</a>
                                        <a href="single.html" class="dropdown-item">Renja</a>
                                    </div>
                                </div> -->
                                <!-- <a href="portfolio.html" class="nav-item nav-link">Project</a> -->
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Kelembagaan</a>
                                    <div class="dropdown-menu">
                                        <a href="blog.html" class="dropdown-item">PKK / Dharma wanita</a>
                                        <a href="single.html" class="dropdown-item">Karang Taruna</a>
                                    </div>
                                </div>
                                <a href="{{ route('dok-perencanaan') }}" class="nav-item nav-link">SAKIP</a>
                                <a href="contact.html" class="nav-item nav-link">Kontak</a>
                            </div>
                            <div class="ml-auto">
                                <a class="btn" href="{{ route('admin.login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                                <a class="btn" href="#"><i class="fas fa-user-plus"></i> Daftar</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Nav Bar End -->