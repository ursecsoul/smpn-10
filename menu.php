<?php
// Menentukan halaman yang aktif
$page = isset($_GET['page']) ? $_GET['page'] : 'mandiri';
$pageFile = __DIR__ . "/pages/{$page}.php";

// Tambahkan validasi file
// $allowed_pages = ['mandiri', 'profil', 'visidanmisi', 'guru', 'kegiatansek', 'prestasi', 'osis', 'ekskul', 'galeri', 'galeri_video', 'registerr', 'loginn'];
// if (!in_array($page, $allowed_pages)) {
//     $page = 'mandiri'; // Default ke mandiri jika halaman tidak valid
// } 
?>
<!-- Navigation Bar -->
<div class="p-1 mb-2">
    <nav class="navbar navbar-expand-lg shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php?page=mandiri.php" style="color: white;">
                <img src="LOGO-SMP10-1.png" alt="Logo SMPN 10 Malang" height="50" class="me-2">
                <span>SMPN 10 Malang</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                      <a class="nav-link <?php echo $page == 'mandiri' ? 'active' : ''; ?>" href="index.php?page=mandiri" style="color: white;">Beranda</a>
                    </li>
                    
                    <!-- Dropdown (Profil) -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo in_array($page, ['profil', 'visidanmisi', 'guru']) ? 'active' : ''; ?>" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                            Profil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profilDropdown">
                            <li><a class="dropdown-item text-center" href="index.php?page=profill">Profil sekolah</a></li>
                            <li><a class="dropdown-item text-center" href="index.php?page=visidanmisi">Visi dan Misi</a></li>
                            <li><a class="dropdown-item text-center" href="index.php?page=guru">Guru</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'kegiatansek' ? 'active' : ''; ?>" href="index.php?page=kegiatansek" style="color: white;">Berita Sekolah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'prestasi' ? 'active' : ''; ?>" href="index.php?page=prestasi" style="color: white;">Prestasi</a>
                    </li>

                    <!-- Dropdown (Kesiswaan) -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo in_array($page, ['osis', 'ekskul']) ? 'active' : ''; ?>" id="kesiswaanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                            Kesiswaan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="kesiswaanDropdown">
                            <li><a class="dropdown-item text-center" href="index.php?page=osis">Osis</a></li>
                            <li><a class="dropdown-item text-center" href="index.php?page=ekskul">Ekstrakurikuler</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown (Galeri) -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo in_array($page, ['galeri', 'galeri_video']) ? 'active' : ''; ?>" id="galeriDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                            Galeri
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="galeriDropdown">
                            <li><a class="dropdown-item text-center" href="index.php?page=galeri">Galeri Foto</a></li>
                            <li><a class="dropdown-item text-center" href="index.php?page=galeri_video">Galeri Video</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $page == 'loginn' ? 'active' : ''; ?>" href="index.php?page=loginn" style="color: white;">Login</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>