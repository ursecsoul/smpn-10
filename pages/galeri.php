<?php
include 'menu.php';
include 'koneksi.php';

// Ambil kategori dari URL atau default ke 'kegiatan'
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : 'kategori';

// Ambil data foto berdasarkan kategori dari database
$result = $conn->query("SELECT * FROM photos WHERE kategori='$kategori'");

?>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>

        body {
            padding-top: 80px;
            font-family: 'montserrat';
        }
        .navbar {
            background-color: #00712D;
        }

        .image-label {
            position: absolute;
            top: 0;
            width: 175px;
            margin-top: 25px;
            background-color: #09bf55a2; 
            color: #333;
            font-weight: bold;
            padding: 5px;
            text-align: right;
        }
        .card {
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
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
        }
        .footer a:hover {
            text-decoration: underline;
        }

        .copyright {
            background-color: black;
            color: white;
            padding: 10px 0;
            margin: 0px;
        }
    </style>
</head>
<body>

        
    <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            
            <!-- kegiatan sekolah -->
            <div class="col">
                <a href="index.php?page=subkegsek" style="text-decoration: none;">
                    <div class="card h-97">
                        <div class="image-label">Kegiatan</div>
                        <img src="10.jpg" class="card-img-top" alt="Kegiatan">
                    </div>
                </a>
            </div>
            
            <!-- MPLS -->
            <div class="col">
                <a href="index.php?page=submpls" style="text-decoration: none;">
                    <div class="card h-97">
                        <div class="image-label">MPLS</div>
                        <img src="mp.png" class="card-img-top" alt="MPLS">
                    </div>
                </a>
            </div>

            <!-- Guru -->
            <div class="col">
                <a href="index.php?page=subguru" style="text-decoration: none;">
                    <div class="card h-97">
                        <div class="image-label">Guru</div>
                        <img src="guru.jpg" class="card-img-top" alt="Guru" style="width: 390px;">
                    </div>
                </a>
            </div>
            
            <!-- fasilitas -->
            <div class="col">
                <a href="index.php?page=subfasilitas" style="text-decoration: none;">
                    <div class="card h-97">
                        <div class="image-label">Fasilitas Sekolah</div>
                        <img src="fli.png" class="card-img-top" alt="Fasilitas Sekolah">
                    </div>
                </a>
            </div>
            
            <!-- prestasi-->
            <div class="col">
                <a href="index.php?page=subprestasi" style="text-decoration: none;">
                    <div class="card h-97">
                        <div class="image-label">Prestasi</div>
                        <img src="TJ - Copy.png" class="card-img-top" alt="Perpustakaan">
                    </div>
                </a>
            </div>
            
            <!-- kunjuangan -->
            <div class="col">
                <a href="index.php?page=subkunjungan" style="text-decoration: none;">
                    <div class="card h-97">
                        <div class="image-label">Kunjungan</div>
                        <img src="kunju.png" class="card-img-top" alt="Kunjungan">
                    </div>
                </a>
            </div>
            
            <div class="gallery">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="gallery-item">
            <img src="../<?= htmlspecialchars($row['foto']) ?>" alt="Foto <?= htmlspecialchars($row['kategori']) ?>">
            </div>
        <?php } ?>
    </div>
        </div>
    </div>

    
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
