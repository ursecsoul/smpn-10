<?php
// Menentukan halaman yang aktif
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$pageFile = __DIR__ . "/pages/{$page}.php";

// Tambahkan validasi file
// $allowed_pages = ['dashboard', 'berita', 'prestasi', 'osis', 'galeri foto', 'galeri video', 'logout'];
// if (!in_array($page, $allowed_pages)) {
//     $page = 'dashboard'; // Default ke dashboard jika halaman tidak valid
// } 
?>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Dashboard Admin</h2>
            <img src="../LOGO-SMP10-1.png" alt="Logo SMPN 10 Malang" height="80" class="me-2">
        </div>
        <ul>
        <ul>
    <li><a href="indexx.php?page=berita"><i class="fas fa-newspaper"></i> <span>Berita Sekolah</span></a></li>
    <li><a href="indexx.php?page=prestasii"><i class="fas fa-trophy"></i> <span>Prestasi</span></a></li>
    <li><a href="indexx.php?page=osiss"><i class="fas fa-users"></i> <span>OSIS</span></a></li>
    <li><a href="indexx.php?page=galeri_foto"><i class="fas fa-images"></i> <span>Galeri Foto</span></a></li>
    <li><a href="indexx.php?page=galeri_videoo"><i class="fas fa-video"></i> <span>Galeri Video</span></a></li>
</ul>

<button class="logout-btn" onclick="window.location.href='../index.php?page=loginn'">
    <i class="fas fa-sign-out-alt"></i>
    <span>Logout</span>
</button>

    </div>

        </div>