<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeri Foto Guru</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }
    
    .page-wrapper {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .galeri-header {
      text-align: center;
      padding: 50px 0;
      background: linear-gradient(135deg, #00712D 0%, #009f3f 100%);
      color: white;
      margin-bottom: 40px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .galeri-header h2 {
      font-weight: 700;
      font-size: 36px;
      margin-bottom: 12px;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }

    .galeri-header p {
      font-size: 18px;
      opacity: 0.9;
      font-weight: 300;
    }

    .galeri-foto {
      padding: 0 0 60px 0;
      flex-grow: 1;
    }

    .foto-container {
      margin-bottom: 30px;
      position: relative;
      overflow: hidden;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }

    .foto-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 24px rgba(0,0,0,0.15);
    }

    .foto {
      width: 100%;
      height: 300px;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .foto-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
      padding: 20px;
      color: white;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .foto-container:hover .foto-overlay {
      opacity: 1;
    }

    .foto-container:hover .foto {
      transform: scale(1.05);
    }

    .foto-title {
      font-size: 18px;
      font-weight: 500;
      margin-bottom: 5px;
    }

    .foto-date {
      font-size: 14px;
      opacity: 0.8;
    }

    .back-container {
      text-align: center;
      padding: 40px 0;
      background-color: white;
      box-shadow: 0 -4px 15px rgba(0,0,0,0.05);
    }

    .back-button {
      background-color: #00712D;
      color: white;
      padding: 15px 40px;
      border-radius: 50px;
      text-decoration: none;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(0,113,45,0.2);
    }

    .back-button:hover {
      background-color: #005020;
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0,113,45,0.3);
    }

    .back-button i {
      margin-right: 10px;
    }

    .filter-container {
      margin-bottom: 30px;
      text-align: center;
    }

    .filter-button {
      background-color: white;
      border: 2px solid #00712D;
      color: #00712D;
      padding: 8px 20px;
      border-radius: 25px;
      margin: 0 5px;
      transition: all 0.3s ease;
      font-weight: 500;
    }

    .filter-button:hover,
    .filter-button.active {
      background-color: #00712D;
      color: white;
    }

    @media (max-width: 768px) {
      .galeri-header {
        padding: 30px 0;
      }
      
      .galeri-header h2 {
        font-size: 28px;
      }
      
      .foto {
        height: 250px;
      }
      
      .filter-button {
        margin-bottom: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="page-wrapper">
    <div class="galeri-header">
      <h2>Galeri Foto</h2>
      <p>Dokumentasi Kegiatan Guru</p>
    </div>

    <div class="container">
      <div class="filter-container">
        <button class="filter-button active">Semua</button>
        <button class="filter-button">Kegiatan Mengajar</button>
        <button class="filter-button">Rapat Guru</button>
        <button class="filter-button">Acara Sekolah</button>
      </div>
      
      <div class="row galeri-foto">
        <div class="col-md-4">
          <div class="foto-container">
            <img src="ggguru.jpg" class="foto" alt="Foto 1">
            <div class="foto-overlay">
              <div class="foto-title">Rapat Koordinasi Guru</div>
              <div class="foto-date">15 November 2024</div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="foto-container">
            <img src="gggggggggguru.jpg" class="foto" alt="Foto 2">
            <div class="foto-overlay">
              <div class="foto-title">Kegiatan Belajar Mengajar</div>
              <div class="foto-date">12 November 2024</div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="foto-container">
            <img src="gguru.jpg" class="foto" alt="Foto 3">
            <div class="foto-overlay">
              <div class="foto-title">Workshop Pengembangan Kurikulum</div>
              <div class="foto-date">10 November 2024</div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="foto-container">
            <img src="gguruu.jpg" class="foto" alt="Foto 4">
            <div class="foto-overlay">
              <div class="foto-title">Upacara Bendera</div>
              <div class="foto-date">8 November 2024</div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="foto-container">
            <img src="ggguru.jpg" class="foto" alt="Foto 5">
            <div class="foto-overlay">
              <div class="foto-title">Pertemuan Orang Tua Murid</div>
              <div class="foto-date">5 November 2024</div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="foto-container">
            <img src="gggggggggggggggggggggggggggguru.jpeg" class="foto" alt="Foto 6">
            <div class="foto-overlay">
              <div class="foto-title">Pelatihan Digital Learning</div>
              <div class="foto-date">1 November 2024</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="back-container">
      <a href="#" class="back-button">
        <i class="fas fa-arrow-left"></i>
        Kembali
      </a>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script>
    // Tambahkan interaktivitas untuk filter button
    document.querySelectorAll('.filter-button').forEach(button => {
      button.addEventListener('click', function() {
        document.querySelectorAll('.filter-button').forEach(btn => btn.classList.remove('active'));
        this.classList.add('active');
      });
    });
  </script>
</body>
</html>