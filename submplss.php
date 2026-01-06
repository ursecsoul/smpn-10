<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foto Kegiatan Sekolah</title>
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
    <h1 class="text-center mb-4">Foto MPLS</h1>
    <!-- Grid untuk menampilkan foto-foto -->
    <div class="row g-4">
      <!-- Foto 1 -->
      <div class="col-md-4">
        <div class="img-container">
          <img src="images/IMG-20190817-WA0018-2-1024x576.jpg" alt="Kegiatan 1" class="gallery-img">
        </div>
      </div>
      
     
      
      
  <!-- Link ke Bootstrap JS dan dependensinya -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>