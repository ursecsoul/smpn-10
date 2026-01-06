<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/pjbl/pjbl/pages/koneksi.php";
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

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    display: flex;
    background-color: #f0fdf4;
    background-image: 
        radial-gradient(at 90% 90%, #e8f5e9 0px, transparent 50%),
        radial-gradient(at 10% 10%, #e8f5e9 0px, transparent 50%);
    margin: 0;
    min-height: 100vh;
}

/* .sidebar {
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

.sidebar ul li:nth-child(1) { animation-delay: 0.2s; }
.sidebar ul li:nth-child(2) { animation-delay: 0.3s; }
.sidebar ul li:nth-child(3) { animation-delay: 0.4s; }
.sidebar ul li:nth-child(4) { animation-delay: 0.5s; }
.sidebar ul li:nth-child(5) { animation-delay: 0.6s; }

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
} */

.logout-btn {
    position: absolute;
    bottom: 20px;
    left: 25px;
    right: 25px;
    padding: 12px;
    background: linear-gradient(135deg, #d32f2f, #c62828);
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Poppins', sans-serif;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    animation: slideUp 0.6s ease-out;
}

.logout-btn i {
    margin-right: 8px;
    transition: transform 0.3s ease;
}

.logout-btn:hover {
    background: linear-gradient(135deg, #c62828, #b71c1c);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(211, 47, 47, 0.3);
}

.logout-btn:hover i {
    transform: rotate(360deg);
}

.content {
    flex-grow: 1;
    padding: 40px;
    margin-left: 280px;
    max-width: 1200px;
    animation: fadeIn 0.8s ease-out;
}

.welcome-section {
    text-align: center;
    margin-bottom: 50px;
    animation: slideDown 0.8s ease-out;
}

.welcome-section h1 {
    color: #2e7d32;
    font-size: 32px;
    margin-bottom: 15px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.05);
}

.welcome-section p {
    color: #666;
    font-size: 16px;
    line-height: 1.6;
}

.dashboard-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
    margin-top: 30px;
}

.stat-card {
    background: white;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    text-align: center;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    opacity: 0;
    animation: fadeInUp 0.8s ease-out forwards;
}

.stat-card:nth-child(1) { animation-delay: 0.2s; }
.stat-card:nth-child(2) { animation-delay: 0.4s; }
.stat-card:nth-child(3) { animation-delay: 0.6s; }
.stat-card:nth-child(4) { animation-delay: 0.8s; }

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #2e7d32, #4caf50);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
}

.stat-card:hover::before {
    transform: scaleX(1);
}

.stat-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 8px 25px rgba(46, 125, 50, 0.15);
}

.stat-card i {
    font-size: 40px;
    color: #2e7d32;
    margin-bottom: 15px;
    transition: all 0.3s ease;
}

.stat-card:hover i {
    transform: scale(1.2) rotate(10deg);
    color: #388e3c;
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

    <div class="content" style="margin-left: 30px;">
        <div class="welcome-section">
            <h1>Selamat Datang di Dashboard Admin</h1>
            <p>Kelola konten sekolah dengan mudah dan efisien</p>
        </div>
        
        <div class="dashboard-stats">
            <div class="stat-card">
                <i class="fas fa-newspaper"></i>
                <h3>Berita Terbaru</h3>
                <p>5 berita dipublikasikan minggu ini</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-trophy"></i>
                <h3>Prestasi</h3>
                <p>10 prestasi baru ditambahkan</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-images"></i>
                <h3>Galeri</h3>
                <p>25 foto dan 3 video baru</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-users"></i>
                <h3>Aktivitas OSIS</h3>
                <p>8 kegiatan terlaksana bulan ini</p>
            </div>
        </div>
    </div>
</body>
</html>