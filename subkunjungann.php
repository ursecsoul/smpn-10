<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foto Kunjungan Sekolah</title>
  <!-- Link ke Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    .gallery-item {
      margin-bottom: 30px;
      aspect-ratio: 4/3;
      overflow: hidden;
    }
    
    .gallery-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }
    
    .gallery-img:hover {
      transform: scale(1.05);
    }

    .img-container {
      height: 250px; /* Tinggi tetap untuk semua container */
      overflow: hidden;
      position: relative;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center mb-4">Foto Kunjungan Sekolah</h1>
    <!-- Grid untuk menampilkan foto-foto -->
    <div class="row g-4">
      <!-- Foto 1 -->
      <div class="col-md-4">
        <div class="img-container">
          <img src="images/IMG_20211013_155143.jpg" alt="Kegiatan 1" class="gallery-img">
        </div>
      </div>
      
      <!-- Foto 2 -->
      <div class="col-md-4">
        <div class="img-container">
          <img src="images/WhatsApp-Image-2019-08-01-at-4.56.26-PM.jpeg" alt="Kegiatan 2" class="gallery-img">
        </div>
      </div>
      
      <!-- Foto 3 -->
      <div class="col-md-4">
        <div class="img-container">
          <img src="images/WhatsApp-Image-2023-01-18-at-11.39.19.jpeg" alt="Kegiatan 3" class="gallery-img">
        </div>
      </div>
      
      <!-- Foto 4 -->
      <div class="col-md-4">
        <div class="img-container">
          <img src="images/images.jpg" alt="Kegiatan 4" class="gallery-img">
        </div>
      </div>
    
  <!-- Link ke Bootstrap JS dan dependensinya -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>