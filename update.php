<?php
// Koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smpn10_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Membuat direktori uploads jika belum ada
$upload_dir = "uploads/";
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// Proses form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];
    
    // Handle file upload
    if(isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == 0) {
        $target_dir = "uploads/";
        
        // Generate unique filename
        $file_extension = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);
        $unique_filename = uniqid() . "." . $file_extension;
        $target_file = $target_dir . $unique_filename;
        
        $uploadOk = 1;
        $imageFileType = strtolower($file_extension);
        
        // Check if image file is actual image or fake image
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if($check === false) {
            echo "<div class='alert alert-danger'>File is not an image.</div>";
            $uploadOk = 0;
        }
        
        // Check file size (5MB limit)
        if ($_FILES["gambar"]["size"] > 5000000) {
            echo "<div class='alert alert-danger'>Sorry, your file is too large. Maximum size is 5MB.</div>";
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "<div class='alert alert-danger'>Sorry, only JPG, JPEG & PNG files are allowed.</div>";
            $uploadOk = 0;
        }
        
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                // File uploaded successfully, now insert into database
                $sql = "INSERT INTO kegiatan (judul, tanggal, deskripsi, gambar) 
                        VALUES (?, ?, ?, ?)";
                
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $judul, $tanggal, $deskripsi, $target_file);
                
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Kegiatan berhasil ditambahkan!</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
                    // If database insert fails, delete the uploaded file
                    unlink($target_file);
                }
                $stmt->close();
            } else {
                echo "<div class='alert alert-danger'>Sorry, there was an error uploading your file.</div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger'>Please select an image to upload.</div>";
    }
}

// Rest of your HTML code remains the same
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Update Kegiatan Sekolah</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            padding-top: 80px;
            font-family: 'montserrat';
            background-color: #f8f9fa;
        }
        
        .form-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        .btn-success {
            background-color: #00712D;
            border: none;
            padding: 10px 25px;
            transition: all 0.3s ease;
        }
        
        .btn-success:hover {
            background-color: #005923;
            transform: translateY(-2px);
        }
        
        .form-control:focus {
            border-color: #00712D;
            box-shadow: 0 0 0 0.2rem rgba(0,113,45,0.25);
        }
        
        .preview-image {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
            border-radius: 10px;
        }

        .alert {
            margin-bottom: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4" style="color: #00712D;">Update Kegiatan Sekolah</h2>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Kegiatan</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Kegiatan</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
                
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Kegiatan</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Kegiatan</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" onchange="previewImage(this);" required>
                    <small class="text-muted">Format yang diperbolehkan: JPG, JPEG, PNG. Maksimal ukuran: 5MB</small>
                    <img id="preview" class="preview-image d-none">
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Simpan Kegiatan</button>
                </div>
            </form>
        </div>
        
        <!-- Tabel Kegiatan -->
        <div class="form-container">
            <h3 class="text-center mb-4" style="color: #00712D;">Daftar Kegiatan</h3>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM kegiatan ORDER BY tanggal DESC";
                        $result = $conn->query($sql);
                        $no = 1;
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . htmlspecialchars($row['judul']) . "</td>";
                                echo "<td>" . date('d F Y', strtotime($row['tanggal'])) . "</td>";
                                echo "<td>
                                        <a href='edit_kegiatan.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning me-2'>Edit</a>
                                        <a href='hapus_kegiatan.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin ingin menghapus?\");'>Hapus</a>
                                    </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' class='text-center'>Tidak ada data kegiatan</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            var preview = document.getElementById('preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>