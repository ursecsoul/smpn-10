<?php 
include 'menu.php';
?>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet"> 
   <style>
.hero {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('path-to-hero-image.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            background-image: url("sekolah_10 2.png");
            padding: 140px 0;
            width: 100%;
        }
        

.tombol1 {
  margin-top: 100px;
  margin-bottom: 0px;
}

.keunggulan {
    margin-top: 55px;
    margin-bottom: 45px;
}       
        
.img-fluid {
      position: relative;
      background-size: cover;
      background-position: center;
      height: 200px; 
      color: white;
    }

 .card-background {
      position: relative;
      background-size: cover;
      background-position: center;
      height: 400px; 
      width: 1140px;
      color: white;
}

.custom-btn {
    background-color: orange;
    border-color: orange;
    color: white;
}

.buton1 {
    background-color: orange;
    border-color: orange;
    color: white;
}

.buton2 {
    background-color: orange;
    border-color: orange;
    color: white;
}

.feature-card {
            transition: transform 0.3s;
        }
.feature-card:hover {
            transform: translateY(-10px);
        }
.testimonial {
            background-color: #f8f9fa;
        }

.icon{
    padding: 14px 16px;
    background-color: #C2E4F7;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 8px;
    box-shadow:2px 5px 2px rgb(181, 181, 181); 
}

.icon1{
    padding: 14px 16px;
    background-color: #FFF1BD;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 8px;
    box-shadow:2px 5px 2px rgb(181, 181, 181); 
}

.icon2{
    padding: 14px 16px;
    background-color: #F7C2C2;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 8px;
    box-shadow:2px 5px 2px rgb(181, 181, 181); 
}

.testimonial {
            background-color: #f8f9fa;
        }

.berita {
    margin-top: 50px;
    margin-bottom: 80px;
}

    </style>

  </head>
  <body>

  
<!-- gambar sekolah -->
<header class="hero text-center">
  <div class="container">
    <div class="row align-items-center py-2 g-5">
      <div class="col-12 col-md-6">
        <div class="text-center text-md-start">
          <h1 class="display-md-2 display-6 fw-bold text-dark pb-2 md-4" >
            <span class="text-white">Bumi Sdasa Wiyata Mandala</span>
          </h1>
          <p class="lead">
            Bersama Mengukir Prestasi dengan Kepedulian Lingkungan, Kemandirian Kompos, dan Pengembangan IMTAQ di SMPN 10 Malang
          </p>
          <div class="tombol1">
          <button onclick="location.href='kritik_saran.php  '" class="btn btn-primary px-4 py-3 mt-3 fs-5 fw-medium custom-btn" type="button"> 
           Kontak Kami
          </button>
          </div>
      </div>
      </div>
    </div>
  </div>
</header>
</div>

    <!-- keunggulana -->
    <section class="py-5">
      <div class="container">
        <div class="keunggulan">
          <div class="text-center mb-5">
              <h2 class="mb-3">Apa keunggulan kami?</h2>
              <p class="lead">Alasan kenapa kalian semua harus bergabung dengan SMPN 10 Malang.</p>
          </div>
          <div class="row g-4">
              <div class="col-md-4">
                  <div class="card h-100 feature-card text-center p-4">
                      <img src="gamber_sekolahbiru.png" class="card-img-top mx-auto icon" alt="Fasilitas Lengkap" style="width: 80px;">
                      <div class="card-body">
                          <h3 class="card-title h4">Fasilitas Lengkap</h3>
                          <p class="card-text">Memiliki sarana penunjang belajar yang lengkap dan berkualitas.</p>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="card h-100 feature-card text-center p-4">
                      <img src="daun.png" class="card-img-top mx-auto icon1" alt="Lingkungan Asri" style="width: 80px;">
                      <div class="card-body">
                          <h3 class="card-title h4">Lingkungan Asri</h3>
                          <p class="card-text">Berada di lingkungan yang asri, aman, dan kondusif.</p>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="card h-100 feature-card text-center p-4">
                      <img src="orang.png" class="card-img-top mx-auto icon2" alt="Pendidik Kompeten" style="width: 80px;">
                      <div class="card-body">
                          <h3 class="card-title h4">Pendidik Kompeten</h3>
                          <p class="card-text">Guru-gurunya yang update dengan pembelajaran yang modern.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
        </div>
      </div>
    </div>
</div>

    <!-- kata kepsek -->
    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="testimonial py-5" style="background-color: #00712D; color: white;">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-md-8 text-center">
                    <img src="kepsekbro.jpg" alt="Hasbullah" class="rounded-circle md-4" style="width: auto; height: 120px; margin-bottom: 20px;">
                    <p class="lead mb-2 text-center">"Masa depan bukan tentang apa yang kita capai, tapi siapa kita saat mencapainya. Di SMPN 10 Malang, kita tidak sekadar belajar, kita berkembang. Jadilah generasi yang cerdas, berbudi, dan bermanfaat bagi lingkungan.
                    Terus belajar, terus tumbuh!""</p>
                    <h4 class="h5 text-center">- Hasbullah, S.Pd., S.E.</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
          <!-- kata guru1 -->
          <div class="carousel-item">
            <div class="testimonial py-5" style="background-color: #00712D; color: white;">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-md-8 text-center">
                    <img src="TOTOK-PURWITO-S.Pd_.-4-2-1024x1536.jpg" alt="Totok" class="rounded-circle md-4" style="width: auto; height: 120px; margin-bottom: 20px;">
                    <p class="lead mb-2 text-center">"Setiap langkah adalah kesempatan, setiap tantangan adalah guru. Di SMPN 10 Malang, kita tidak hanya bermimpi, tapi mengukir prestasi dengan kerja keras dan semangat.
                    Terus berkarya, terus menginspirasi!""</p>
                    <h4 class="h5 text-center">- Totok Purwito, S.Pd</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
          <!-- kata guru2 -->
          <div class="carousel-item">
            <div class="testimonial py-5" style="background-color: #00712D; color: white;">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-md-8 text-center">
                    <img src="Dra.-RAKHMAWATI-2-2-683x1024 (2).jpg" alt="Rakhmawati" class="rounded-circle md-4" style="width: auto; height: 120px; margin-bottom: 20px;">
                    <p class="lead mb-2 text-center">"Pendidikan bukan sekadar transfer ilmu, tapi transformasi diri. Di SMPN 10 Malang, kita membangun generasi unggul yang peduli, mandiri, dan bermartabat.
                    Terus tumbuh, terus berkembang!""</p>
                    <h4 class="h5 text-center">- Dra. Rakhmawati</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <!-- tombol  -->
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      
     <?php 
    include "koneksi.php";
?>

<!-- berita -->
<section class="py-5">
    <div class="container">
        <div class="berita">
            <div class="text-center mb-5">
                <h2>Berita Terkini</h2>
                <p class="lead">Ikuti terus berita dan perkembangan informasi seputar SMPN 10 Malang.</p>
            </div>

            <div class="d-flex flex-column gap-5">

                <!-- Berita Statis -->
                <div class="card h-100 d-flex flex-row align-items-center" style="height: 308px;">
                    <img src="fs.png" class="card-img" alt="Fashion Show" style="width: 400px; height: 100%; object-fit: cover;">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <h3 class="card-title h4 mb-5" style="font-size: 30px;">Fashion Show HUT SMPN 10 Malang</h3>
                            <p class="card-text mb-4">Fashion Show HUT SMPN 10 Malang yang membawakan baju dari desain mode Universitas Malang yaitu Ribi (alumni SMPN 10 Malang Tahun 2021). Dengan tema casual berwarna nuansa coklat yang menampilkan gaya trendi dan stylish.</p>
                            <button onclick="location.href='index.php?page=kegiatansek'" class="btn btn-warning buton1">Lebih Lanjut</button>
                        </div>
                    </div>
                </div>

                <div class="card h-100 d-flex flex-row align-items-center" style="height: 308px;">
                    <img src="upcr.png" class="card-img" alt="Upacara" style="width: 400px; height: 100%; object-fit: cover;">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <h3 class="card-title h4 mb-5" style="font-size: 30px;">Upacara Kemerdekaan RI Tahun 2024</h3>
                            <p class="card-text mb-4">Hari Sabtu, 17 Agustus 2024, sekolah kita mengadakan Upacara Bendera yang dihadiri oleh seluruh warga sekolah. Setelah upacara, ada pagelaran busana adat daerah.</p>
                            <button onclick="location.href='index.php?page=kegiatansek'" class="btn btn-warning buton2">Lebih Lanjut</button>
                        </div>
                    </div>
                </div>

                <!-- Berita dari Database -->
                <?php
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
                        <div class="card h-100 d-flex flex-row align-items-center" style="height: 308px;">
                            <img src="' . $gambar . '" class="card-img" alt="' . $judul . '" style="width: 400px; height: 100%; object-fit: cover;">
                            <div class="card-body d-flex align-items-center">
                                <div>
                                    <h3 class="card-title h4 mb-5" style="font-size: 30px;">' . $judul . '</h3>
                                    <p class="card-text mb-4">' . substr($konten, 0, 200) . '...</p>
                                    <button onclick="location.href=\'index.php?page=kegiatansek&id=' . $row['id'] . '\'" class="btn btn-warning buton1">Lebih Lanjut</button>
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
                
            </div>
        </div>
    </div>
</section>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>