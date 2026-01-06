<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pjbl/pjbl/pages/koneksi.php";

if (!isset($conn)) {
    die("Database connection is not established!");
}

// Menangani upload foto dan kategori
if (isset($_POST['upload'])) {
    if (!empty($_FILES['foto']['name']) && $_FILES['foto']['error'] === 0) {
        $kategori = $_POST['kategori']; // Ambil kategori yang dipilih
        $foto = $_FILES['foto'];

        // Validasi jenis file yang diizinkan
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($foto['type'], $allowedTypes)) {
            die("Format file tidak didukung! Hanya JPG, PNG yang diperbolehkan.");
        }

        // Buat nama file unik
        $namaFile = time() . "_" . basename($foto['name']);
        $folderTujuan = "../uploads/";

        // Buat folder jika belum ada
        if (!is_dir($folderTujuan)) {
            mkdir($folderTujuan, 0777, true);
        }

        $pathSimpan = $folderTujuan . $namaFile;
        $simpanFile = "uploads/" . $namaFile; // Path yang disimpan di database

        // Pindahkan file ke folder tujuan
        if (move_uploaded_file($foto['tmp_name'], $pathSimpan)) {
            // Simpan ke database
            $query = "INSERT INTO photos (kategori, gambar) VALUES (?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $kategori, $simpanFile);
            $stmt->execute();

            // if ($stmt->execute()) {
            //     $stmt->close();
            //     $conn->close();
                
                // Redirect ke halaman galeri foto setelah berhasil upload
                //header("Location: indexx.php?page=galeri_foto");
                // exit();
            // } else {
            //     die("Gagal menyimpan ke database!");
            // }
        } else {
            die("Gagal mengupload file!");
        }
    } else {
        die("Tidak ada file yang diupload atau terjadi kesalahan!");
    }
}

// Hapus foto
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    // Ambil nama file sebelum dihapus
    $query = "SELECT gambar FROM photos WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($gambar);
    $stmt->fetch();
    $stmt->close();

    // Hapus file dari folder
    if (!empty($gambar) && file_exists("../" . $gambar)) {
        unlink("../" . $gambar);
    }

    // Hapus data dari database
    $query = "DELETE FROM photos WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Redirect setelah menghapus
    //header("Location: indexx.php?page=galeri_foto");
    //exit();
}

// Edit foto
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    if (!empty($_FILES['new_foto']['name']) && $_FILES['new_foto']['error'] === 0) {
        $namaFoto = $_FILES['new_foto']['name'];
        $lokasiFoto = $_FILES['new_foto']['tmp_name'];
        $targetDir = "uploads/";

        // Ambil nama file lama
        $query = "SELECT gambar FROM photos WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($fileLama);
        $stmt->fetch();
        $stmt->close();

        // Simpan file baru
        $pathSimpan = $targetDir . time() . "_" . basename($namaFoto);
        if (move_uploaded_file($lokasiFoto, "../" . $pathSimpan)) {
            // Update database
            $query = "UPDATE photos SET gambar = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("si", $pathSimpan, $id);
            $stmt->execute();
            $stmt->close();

            // Hapus file lama
            if (!empty($fileLama) && file_exists("../" . $fileLama)) {
                unlink("../" . $fileLama);
            }

            // Redirect setelah edit sukses
            //header("Location: indexx.php?page=galeri_foto");
            //exit();
        } else {
            die("Gagal memperbarui foto.");
        }
    } else {
        die("Tidak ada file baru yang diunggah!");
    }
}

// Tampilkan foto berdasarkan kategori
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : 'kegiatan'; 
$result = $conn->query("SELECT * FROM photos ");


?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Galeri Foto</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');        

    form {
        background: white;
        padding: 2.5rem;
        border-radius: 20px;
        box-shadow: 0 15px 30px rgba(46, 125, 50, 0.1);
        max-width: 800px;
        margin: 0 auto 3rem auto;
        display: grid;
        gap: 1.5rem;
        transform: translateY(0);
        transition: all 0.3s ease;
    }

    form:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(46, 125, 50, 0.15);
    }

    input[type="text"], textarea {
        padding: 1.2rem;
        border: 2px solid #a5d6a7;
        border-radius: 12px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        background: #f1f8e9;
        width: 100%;
    }

    input[type="text"]:focus, textarea:focus {
        outline: none;
        border-color: #43a047;
        box-shadow: 0 0 0 4px rgba(67, 160, 71, 0.2);
        background: white;
    }

    textarea {
        min-height: 150px;
        resize: vertical;
    }

    .button_class {
        background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%);
        color: white;
        border: none;
        padding: 1.2rem;
        border-radius: 12px;
        cursor: pointer;
        font-weight: bold;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(46, 125, 50, 0.3);
        background: linear-gradient(135deg, #2e7d32 0%, #1b5e20 100%);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 30px rgba(46, 125, 50, 0.1);
    }

    th, td {
        padding: 1.5rem;
        text-align: left;
        border-bottom: 1px solid rgba(165, 214, 167, 0.3);
    }

    th {
        background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%);
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 1.1rem;
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:hover {
        background-color: #f1f8e9;
        transition: all 0.3s ease;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
    }

    .hapus-btn, .edit-btn {
        color: white;
        padding: 0.8rem 1.2rem;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .hapus-btn {
        background: linear-gradient(135deg, #e53935 0%, #c62828 100%);
    }

    .hapus-btn:hover {
        background: linear-gradient(135deg, #c62828 0%, #b71c1c 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(198, 40, 40, 0.2);
    }

    .edit-btn {
        background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%);
    }

    .edit-btn:hover {
        background: linear-gradient(135deg, #2e7d32 0%, #1b5e20 100%);
    }

    .gallery {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 20px;
    }

    .gallery-item {
        width: 250px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gallery-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
    }

    .gallery-item img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-bottom: 2px solid #43a047;
    }

    .gallery-action {
        display: flex;
        justify-content: space-around;
        padding: 10px;
        background: #f1f8e9;
        border-top: 1px solid rgba(165, 214, 167, 0.3);
    }

    @media (max-width: 768px) {
        body {
            padding: 1.5rem;
        }
        
        table {
            display: block;
            overflow-x: auto;
        }
        
        th, td {
            padding: 1.2rem;
        }

        form {
            padding: 2rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        h2 {
            font-size: 2rem;
        }
    }
    </style>
</head>
<body>
    <h2>Manajemen Galeri Foto</h2>

    <!-- Form Upload Foto berdasarkan kategori -->
    <div class="upload-form">
        <form method="POST" enctype="multipart/form-data">
            <label for="kategori">Pilih Kategori:</label>
            <select name="kategori" id="kategori">
                <option value="kegiatan" <?= ($kategori == 'kegiatan') ? 'selected' : '' ?>>Kegiatan</option>
                <option value="mpls" <?= ($kategori == 'mpls') ? 'selected' : '' ?>>MPLS</option>
                <option value="guru" <?= ($kategori == 'guru') ? 'selected' : '' ?>>Guru</option>
                <option value="fasilitas_sekolah" <?= ($kategori == 'fasilitas_sekolah') ? 'selected' : '' ?>>Fasilitas Sekolah</option>
                <option value="prestasi" <?= ($kategori == 'prestasi') ? 'selected' : '' ?>>Prestasi</option>
                <option value="kunjungan" <?= ($kategori == 'kunjungan') ? 'selected' : '' ?>>Kunjungan</option>
            </select>
            <br><br>
            <label class="file-input-label">
                <input type="file" name="foto" required>
                📁 Pilih Foto
            </label>
            <br><br>
            <button type="submit" name="upload" class=".button_action">Upload Foto</button>
        </form>
    </div>

    <div class="gallery">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="gallery-item">
                    <img src="../<?= htmlspecialchars($row['gambar']) ?>" alt="Foto <?= htmlspecialchars($row['kategori']) ?>">
                    <div class="gallery-action">
        <a href="indexx.php?page=galeri_foto&hapus=<?= $row['id'] ?>" class="hapus-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
            <i class="fas fa-trash"></i> Hapus
        </a>
        <button class="edit-btn" onclick="showEditForm(<?= $row['id'] ?>)">
            <i class="fas fa-edit"></i> Edit
        </button>
    </div>

                <!-- Form untuk Edit Foto -->
                <form class="edit-form" method="POST" enctype="multipart/form-data" id="editForm<?= $row['id'] ?>" style="display: none;">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <label class="file-input-label">
                        <input type="file" name="new_foto" required>
                        📁 Pilih Foto Baru
                    </label>
                    <button type="submit" name="edit">Simpan Perubahan</button>
                </form>
            </div>
        <?php } ?>
    </div>

    <script>
        function showEditForm(id) {
            const form = document.getElementById('editForm' + id);
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
        document.getElementById("tombol").addEventListener("click", function() {
    window.location.href = "indexx.php?page=galeri_foto";
});

    </script>
</body>
</html>