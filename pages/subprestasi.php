<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeri Foto</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }

    .galeri-header {
      text-align: center;
      padding: 40px 0;
      background-color: white;
      border-bottom: 1px solid #eee;
    }

    .galeri-header h2 {
      font-weight: 600;
      color: #00712D;
      font-size: 32px;
      margin-bottom: 10px;
    }

    .galeri-header p {
      color: #6c757d;
      margin-bottom: 0;
    }

    .galeri-foto {
      padding: 40px 0;
    }

    .foto-container {
      margin-bottom: 30px;
      transition: transform 0.3s ease;
    }

    .foto-container:hover {
      transform: translateY(-5px);
    }

    .foto {
      width: 100%;
      height: 250px;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      transition: box-shadow 0.3s ease;
    }

    .foto-container:hover .foto {
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .back-section {
      text-align: center;
      padding: 20px 0 50px 0;
    }

    .back-button {
      display: inline-flex;
      align-items: center;
      padding: 12px 30px;
      background-color: #00712D;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 500;
      transition: all 0.3s ease;
      box-shadow: 0 2px 8px rgba(0,113,45,0.2);
    }

    .back-button:hover {
      background-color: #005020;
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0,113,45,0.3);
    }

    .back-button svg {
      margin-right: 8px;
      width: 20px;
      height: 20px;
    }

    @media (max-width: 768px) {
      .galeri-header h2 {
        font-size: 28px;
      }

      .foto {
        height: 200px;
      }

      .back-button {
        padding: 10px 25px;
      }
    }
  </style>
</head>
<body>
  <div class="galeri-header">
    <h2>Galeri Foto</h2>
    <p>Prestasi yang diraih siswa-siswi SMPN 10 Malang</p>
  </div>

  <div class="container galeri-foto">
    <div class="row">
      <div class="col-md-4">
        <div class="foto-container">
          <img src="pencak.jpg" class="foto" alt="Foto 1">
        </div>
      </div>

      <div class="col-md-4">
        <div class="foto-container">
          <img src="liter.jpeg" class="foto" alt="Foto 2">
        </div>
      </div>

      <div class="col-md-4">
        <div class="foto-container">
          <img src="juara.jpeg" class="foto" alt="Foto 3">
        </div>
      </div>

      <div class="col-md-4">
        <div class="foto-container">
          <img src="juara1.jpeg" class="foto" alt="Foto 4">
        </div>
      </div>

      <div class="col-md-4">
        <div class="foto-container">
          <img src="pencakkk.jpeg" class="foto" alt="Foto 5">
        </div>
      </div>

      <div class="col-md-4">
        <div class="foto-container">
          <img src="lombaa0.jpeg" class="foto" alt="Foto 6">
        </div>
      </div>
    </div>
    <?php
// Include file koneksi database
include ('koneksi.php');

// Query untuk mengambil foto dengan kategori "prestasi"
$sql = "SELECT * FROM photos WHERE kategori = 'prestasi'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo '<div class="container galeri-foto">';
  echo '<div class="row">'; // Mulai baris di sini
  while ($row = $result->fetch_assoc()) {
      echo '<div class="col-md-4">'; // Kolom untuk setiap gambar
      echo '    <div class="foto-container">';
      echo '        <img src="' . htmlspecialchars($row['gambar']) . '" class="foto" alt="Gambar prestasi">';
      echo '    </div>';
      echo '</div>'; // Akhiri kolom di sini
  }
  echo '</div>'; // Akhiri baris di sini
  echo '</div>'; // Akhiri kontainer di sini
}
 else {
  echo "<p class='text-center'>Tidak ada foto dalam kategori 'kegiatan'.</p>";
}
?>
  </div>

  <div class="back-section">
    <a href="index.php?page=galeri" class="back-button">
      Kembali
    </a>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>