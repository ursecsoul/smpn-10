<?php 
include '../koneksi.php'; // Sambungkan ke database

// Ambil parameter 'page' dari URL, default ke 'dashboard' jika tidak ada
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// Daftar halaman yang diizinkan untuk diakses
$allowed_pages = ['dashboard', 'berita', 'prestasi', 'osis', 'galeri_foto', 'galeri_video', 'logout'];
if (!in_array($page, $allowed_pages)) {
    $page = 'dashboard'; // Jika halaman tidak valid, arahkan ke dashboard
}

// Tentukan path ke folder halaman
$pageDir = __DIR__ . "/pages/";

// Sanitasi nama halaman untuk mencegah akses ke file lain
$page = basename($page); // Hanya mengambil nama file, menghindari directory traversal
$pageFile = $pageDir . "{$page}.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    /* style index */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        display: flex;
        background-color: #f0fdf4;
        margin: 0;
        min-height: 100vh;
    }

    .sidebar {
        width: 280px;
        background: linear-gradient(145deg, #1e4620 0%, #2e7d32 50%, #388e3c 100%);
        color: white;
        padding: 25px;
        height: 100vh;
        box-shadow: 4px 0 20px rgba(0, 0, 0, 0.15);
        position: fixed;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .sidebar-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 40px;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        animation: slideDown 0.6s ease-out;
    }

    .sidebar h2 {
        font-size: 24px;
        font-weight: 600;
        margin: 0;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
    }

    .sidebar ul li {
        margin: 8px 0;
        opacity: 0;
        animation: slideInLeft 0.5s ease forwards;
    }

    /* .sidebar ul li:nth-child(1) { animation-delay: 0.2s; }
    .sidebar ul li:nth-child(2) { animation-delay: 0.3s; }
    .sidebar ul li:nth-child(3) { animation-delay: 0.4s; }
    .sidebar ul li:nth-child(4) { animation-delay: 0.5s; }
    .sidebar ul li:nth-child(5) { animation-delay: 0.6s; } */

    .sidebar ul li a {
        color: white;
        text-decoration: none;
        display: flex;
        align-items: center;
        padding: 12px 15px;
        border-radius: 10px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-size: 15px;
        position: relative;
        overflow: hidden;
    }

    .sidebar ul li a::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: 0.5s;
    }

    .sidebar ul li a:hover::before {
        left: 100%;
    }

    .sidebar ul li a:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateX(8px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .sidebar ul li a i {
        margin-right: 10px;
        width: 20px;
        text-align: center;
        transition: transform 0.3s ease;
    }

    .sidebar ul li a:hover i {
        transform: scale(1.2);
    }

    .logout-btn {
        position: absolute;
        bottom: 20px;
        left: 25px;
        right: 25px;
        padding: 12px;
        background-color: #d32f2f;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s ease;
    }

    .logout-btn i {
        margin-right: 8px;
    }

    .logout-btn:hover {
        background-color: #b71c1c;
        transform: translateY(-2px);
    }

    .content {
        flex-grow: 1;
        padding: 40px;
        margin-left: 280px;
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 70px;
            padding: 15px;
        }

        .sidebar h2, .sidebar ul li a span {
            display: none;
        }

        .content {
            margin-left: 70px;
        }

        .logout-btn span {
            display: none;
        }

        .logout-btn {
            left: 15px;
            right: 15px;
            padding: 12px 0;
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
        }
    }
</style>

<body>

    <!-- Sidebar -->
    <?php include "sidebar.php"; ?>

    <div class="content">
        <?php
        // Periksa apakah file halaman ada, jika ada maka di-include
        if (file_exists($pageFile)) {
            include $pageFile;
        } else {
            echo "<h2>Halaman tidak ditemukan!</h2>";
        }
        ?>
    </div>

</body>
</html>