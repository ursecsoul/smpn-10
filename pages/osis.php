<?php
include 'menu.php';
include 'koneksi.php'; 

        $query = "SELECT * FROM osis ORDER BY jabatan ASC";
        $result = mysqli_query($conn, $query);
        
        $struktur = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $struktur[$row['jabatan']][] = $row;
        }
?>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
       /* Update your CSS with these styles */
.hero-section {
    background-color: #f8f9fa;
    padding: 40px 0;
    margin-bottom: 40px;
    margin-top: 70px; /* Reduced top margin */
}

.org-image {
    max-width: 100%;
    height: auto;
    border-radius: 12px;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-height: 400px; /* Set maximum height */
    object-fit: cover;
}

.description {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    height: 100%; /* Make description box full height */
}

.org-box {
    background: white;
    border: 2px solid #FF8C00;
    border-radius: 15px;
    padding: 12px 20px; /* Slightly reduced padding */
    margin: 8px;
    position: relative;
    min-width: 180px; /* Slightly reduced minimum width */
    text-align: center;
}

.org-line {
    border-left: 2px solid #FF8C00;
    height: 25px; /* Slightly reduced height */
    position: relative;
    left: 50%;
    margin-bottom: -2px;
}

.org-line-horizontal {
    border-top: 2px solid #FF8C00;
    width: 90%; /* Slightly reduced width */
    max-width: 500px;
    margin: 0 auto;
}

.jabatan-2, .jabatan-3 {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 15px; /* Reduced gap */
    margin: 10px 0;
}

/* Typography adjustments */
h1.text-center {
    font-size: 2.2rem; /* Adjusted heading size */
    margin-bottom: 30px;
}

h2.text-center {
    font-size: 1.8rem; /* Adjusted heading size */
    margin-bottom: 40px;
}

.org-box h5 {
    font-size: 1.1rem;
    margin-bottom: 8px;
}

.org-box p {
    font-size: 0.9rem;
    line-height: 1.4;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .hero-section {
        padding: 30px 0;
        margin-top: 60px;
    }
    
    h1.text-center {
        font-size: 1.8rem;
    }
    
    h2.text-center {
        font-size: 1.5rem;
    }
    
    .description p {
        font-size: 0.95rem;
    }
    
    .org-box {
        min-width: 160px;
        padding: 10px 15px;
    }
}

/* Container width adjustment */
.container {
    max-width: 1140px;
    padding-left: 15px;
    padding-right: 15px;
    margin-left: auto;
    margin-right: auto;
}

/* Ensure content doesn't overflow */
body {
    overflow-x: hidden;
}
    </style>
</head>
<body>
<div class="hero-section">
        <div class="container">
            <h1 class="text-center mb-5">OSIS SMPN 10 MALANG</h1>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="osis.png" alt="OSIS Activities" class="org-image">
                </div>
                <div class="col-md-6">
                    <div class="description">
                        <p>OSIS di SMPN 10 sebagai penggerak sekolah organisasi siswa untuk menciptakan siswa yang berjiwa kepemimpinan, menambah pengalaman dan teman yang baik sesama pengurus, membuat dan berpartisipasi aksi dalam sekolah dan mengatur jalannya berbagai acara di sekolah baik dengan secara ORGANISASI.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <h2 class="text-center mb-5">Struktur Pengurus OSIS Periode 2024-2025</h2>

        <!-- Ketua -->
        <div class="d-flex justify-content-center">
            <?php if (isset($struktur['Ketua'])) : ?>
                <?php foreach ($struktur['Ketua'] as $ketua) : ?>
                    <div class="org-box">
                        <h5 class="mb-0">Ketua</h5>
                        <p class="mb-0"><?php echo $ketua['nama']; ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="org-line"></div>

        <!-- Wakil -->
        <div class="d-flex justify-content-center">
            <?php if (isset($struktur['Wakil'])) : ?>
                <?php foreach ($struktur['Wakil'] as $wakil) : ?>
                    <div class="org-box">
                        <h5 class="mb-0">Wakil</h5>
                        <p class="mb-0"><?php echo $wakil['nama']; ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="org-line"></div>
        <div class="org-line-horizontal"></div>

        <!-- Sekretaris & Bendahara -->
        <div class="jabatan-3">
            <?php if (isset($struktur['Sekretaris'])) : ?>
                <?php foreach ($struktur['Sekretaris'] as $sekretaris) : ?>
                    <div class="org-box">
                        <h5 class="mb-0">Sekretaris</h5>
                        <p class="mb-0"><?php echo $sekretaris['nama']; ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (isset($struktur['Bendahara'])) : ?>
                <?php foreach ($struktur['Bendahara'] as $bendahara) : ?>
                    <div class="org-box">
                        <h5 class="mb-0">Bendahara</h5>
                        <p class="mb-0"><?php echo $bendahara['nama']; ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>