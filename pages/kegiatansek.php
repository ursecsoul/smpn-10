<?php 
include 'menu.php';
include "koneksi.php";

// Ambil data berita dari database
$query = "SELECT * FROM news ORDER BY id DESC"; // Urutkan dari berita terbaru
$result = $conn->query($query);

// Periksa apakah ada data di dalam database
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $judul = htmlspecialchars($row['judul']);
        
        // Pastikan tanggal tidak kosong atau NULL untuk menghindari error
        $tanggal = !empty($row['tanggal']) ? date("d F Y", strtotime($row['tanggal'])) : "Tanggal Tidak Tersedia"; 
        $konten = nl2br(htmlspecialchars($row['konten']));
        // $gambar = !empty($row['gambar']) ? "pages/pages/uploads/" . $row['gambar'] : "fs.png";
        $gambar = !empty($row['gambar']) ? $row['gambar'] : "fs.png";

        echo '
        <div class="container my-5">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4"> <!-- Pastikan ukuran sama -->
                    <img src="' . $gambar . '" class="img-fluid rounded-start" alt="' . $judul . '">
                </div>
                <div class="col-sm-8 col-md-8"> <!-- Ukuran harus sama di semua berita -->
                    <div class="card-body">
                        <div class="card-date">' . $tanggal . '</div>
                        <h5 class="card-title text-center">' . $judul . '</h5>
                        <p class="card-text">' . $konten . '</p>
                    </div>
                </div>
            </div>
        </div>
        </div>';
    }
} else {
    echo '<p class="text-center">Tidak ada berita tersedia.</p>';
}

// Tutup koneksi database
$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        .yey1 { }

        body {
            padding-top: 80px;
            font-family: 'montserrat';
        }

        .navbar {
            background-color: #00712D;
        }

        .img-fluid {
            border-radius: 25px;
            width: 100%;
            height: 100%;
            transition: transform 0.3s ease;
            object-fit: cover;
        }

        .img-fluid:hover {
            transform: scale(1.05);
        }

        .col-md-4 {
            overflow: hidden;
            border-radius: 25px;
            height: 300px; /* Fixed height for consistent image sizing */
        }

        .card {
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 40px;
            border-radius: 25px;
            overflow: hidden;
            background: white;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .card-body {
            padding: 2rem;
            display: flex;
    flex-direction: column;
    justify-content: center;
        }

        .card-title {
            color: #00712D;
            font-weight: bold;
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .card-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background-color: #FF9100;
            transition: width 0.3s ease;
        }

        .card:hover .card-title::after {
            width: 100px;
        }

        .card-text {
            color: #555;
            line-height: 1.8;
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        .footer {
            background-color: #00712D;
            color: white;
            padding: 20px;
            margin: 0px;
        }

        .footer a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: #FF9100;
            text-decoration: none;
        }

        .copyright {
            background-color: black;
            color: white;
            padding: 10px 0;
            margin: 0px;
        }

        /* Add date style */
        .card-date {
            color: #FF9100;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .col-md-4 {
                height: 200px;
            }
            
            .card-body {
                padding: 1.5rem;
            }
            
            .card-title {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body class="bg-light">
    <div class="container my-5">
        <!-- Fashion Show Card -->
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="fs.png" class="img-fluid rounded-start" alt="Fashion Show">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-date">15 November 2024</div>
                        <h5 class="card-title text-center">Fashion Show HUT SMPN 10 Malang</h5>
                        <p class="card-text">Fashion Show HUT SMPN 10 Malang yang membawakan baju dari desain mode Universitas Malang yaitu Ribi (alumni SMPN 10 Malang Tahun 2021). Dengan tema casual berwarna nuansa coklat yang menampilkan gaya trendi dan stylish. Warna coklat yang netral memberikan kesan hangat dan natural, cocok untuk berbagai suasana santai namun tetap berkesan modis.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upacara Card -->
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="upcr.png" class="img-fluid rounded-start" alt="Upacara Kemerdekaan">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-date">17 Agustus 2024</div>
                        <h5 class="card-title text-center">Upacara Kemerdekaan RI Tahun 2024</h5>
                        <p class="card-text">Halo TENizen. Hari Sabtu, 17 Agustus 2024, sekolah kita mengadakan Upacara Bendera yang berlokasi di Lapangan Sepakbola SMP Negeri 10 Malang. Upacara ini dihadiri oleh seluruh warga sekolah mulai dari siswa-siswi, guru, staf dan tenaga kependidikan.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Komunitas Belajar Card -->
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="IMG-20240726-WA0007.jpg" class="img-fluid rounded-start" alt="tradisi juara">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-date">26 Juli 2024</div>
                        <h5 class="card-title text-center">Optimalisasi Komunitas Belajar</h5>
                        <p class="card-text">Komunitas belajar dalam sekolah adalah sekelompok pendidik dan tenaga kependidikan dalam satu sekolah yang belajar bersama-sama dan berkolaborasi secara rutin dengan tujuan yang jelas dan terukur untuk meningkatkan kualitas pembelajaran sehingga berdampak pada hasil belajar peserta didik.</p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='berita-item'>";
                echo "<h2>{$row['judul']}</h2>";
                if (!empty($row['gambar'])) {
                    echo "<img src='pages/pages/uploads/{$row['gambar']}' alt='{$row['judul']}' style='max-width: 100%; height: auto;'>";
                }
                echo "<p>{$row['konten']}</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Tidak ada berita yang tersedia.</p>";
        }
        ?>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    </script>
</body>
</html>