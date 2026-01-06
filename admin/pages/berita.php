<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pjbl/pjbl/pages/koneksi.php";

if (!isset($conn)) {
    die("Database connection is not established!");
}

// Proses tambah berita dengan gambar
if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $gambar = $_FILES['gambar'];
        $namaFile = time() . "_" . basename($gambar['name']);

        $folderTujuan = "../uploads/";

        $tmp = $gambar['tmp_name']; 

        if (!is_dir($folderTujuan)) {
            mkdir($folderTujuan, 0777, true);
        }

        $pathSimpan = $folderTujuan . $namaFile;
        $simpanFile = "uploads/" . $namaFile;

        if (move_uploaded_file($tmp, $pathSimpan)) {
            $query = "INSERT INTO news (judul, konten, gambar) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sss", $judul, $konten, $simpanFile);
            $stmt->execute();
        }
    }
    // header("Location: indexx.php?page=berita");
    // exit();
}

// Proses hapus berita
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $query = "SELECT gambar FROM news WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($gambar);
    $stmt->fetch();
    $stmt->close();
    
    if ($gambar && file_exists("../uploads/" . $gambar)) {
        unlink("../uploads/" . $gambar);
    }

    $query = "DELETE FROM news WHERE id=$id";

    if ($conn->query($query)) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='indexx.php?page=berita';</script>";
    } else {
        echo "Gagal menghapus data: " . $conn->error;
    }
    
}

// Proses update berita
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];

    // Check if a new file is uploaded
    if ($_FILES['gambar']['name'] !== "") {
        $gambar = $_FILES['gambar'];
        $namaFile = time() . "_" . basename($gambar['name']);

        $folderTujuan = "../uploads/";

        $tmp = $gambar['tmp_name'];

        $pathSimpan = $folderTujuan . $namaFile;
        $simpanFile = "uploads/" . $namaFile;

        // Move file
        if (move_uploaded_file($tmp, $pathSimpan)) {
            // Get old image
            $queryOld = "SELECT gambar FROM news WHERE id = ?";
            $stmtOld = $conn->prepare($queryOld);
            $stmtOld->bind_param("i", $id);
            $stmtOld->execute();
            $resultOld = $stmtOld->get_result();
            $rowOld = $resultOld->fetch_assoc();

            // Delete old image
            if ($rowOld['gambar'] && file_exists($folderTujuan . $rowOld['gambar'])) {
                unlink($folderTujuan . $rowOld['gambar']);
            }

            // Update database with new image
            $query = "UPDATE news SET judul=?, konten=?, gambar=? WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssi", $judul, $konten, $simpanFile, $id);
        } else {
            echo "Gagal mengunggah gambar baru!";
            exit;
        }
    } else {
        // Update without changing the image
        $query = "UPDATE news SET judul=?, konten=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $judul, $konten, $id);
    }

    if ($stmt->execute()) {
        echo "Data berhasil diperbarui!";
        echo "<script>window.location='?page=berita';</script>";
    } else {
        echo "Gagal memperbarui data.";
    }
}



// Ambil data berita
$sql = "SELECT * FROM news";
$result = $conn->query($sql);
if (!$result) {
    die("Query error: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Berita</title>
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
    
    <h2>Manajemen Berita</h2>
    
    <!-- Form Tambah Berita -->
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="judul" placeholder="Judul Berita" required>
        <textarea name="konten" placeholder="Isi Berita" required></textarea>
        <input type="file" name="gambar" accept="image/*" required>
        <button type="submit" name="tambah" class=".button_action">Tambah Berita</button>
    </form>

    <!-- Tabel Berita -->
<table border="1">
    <tr>
        <th>Judul</th>
        <th>Konten</th>
        <th>Gambar</th>
        <th class="action-column">Aksi</th>
    </tr>

    <?php
    $result = $conn->query("SELECT * FROM news ORDER BY id DESC");

    while ($row = $result->fetch_assoc()) {
        // echo "<tr>";
        // echo "<td>{$row['judul']}</td>";
        // echo "<td>{$row['konten']}</td>";
        // echo "<td><img src='{$row['gambar']}' width='100'></td>";
        // echo "<td>
        //         <a href='?edit={$row['id']}' onclick='return confirm(\"Yakin ingin mengedit?\")'>Edit</a> 
        //         <a href='?hapus={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
        //       </td>";
        // echo "</tr>";
        ?>
        <tr>
            <td><?= $row['judul'] ?></td>
            <td><?= $row['konten'] ?></td>
            <td><img src="../<?= $row['gambar']; ?>" width="100"></td>
            <td class="action-buttons">
    <a href="indexx.php?page=berita&edit=<?= $row['id']; ?>" class="edit-btn">
        <i class="fas fa-edit"></i> Edit
    </a>
    <a href="indexx.php?page=berita&hapus=<?= $row['id'] ?>" class="hapus-btn" onclick="return confirm('Hapus data ini?')">
        <i class="fas fa-trash"></i> Hapus
    </a>
</td>
        </tr>
    <?php
    }
    ?>
</table>

    <!-- Form Edit Berita (Muncul Jika Tombol Edit Diklik) -->
<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = "SELECT * FROM news WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $berita = $result->fetch_assoc();
?>
    <h2>Edit Berita</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $berita['id']; ?>">
        <input type="hidden" name="gambar_lama" value="../<?php echo $berita['gambar']; ?>">

        <input type="text" name="judul" value="<?php echo $berita['judul']; ?>" required>
        <textarea name="konten" required><?php echo $berita['konten']; ?></textarea>
        
        <p>Gambar Lama:</p>
        <img src="../<?php echo $berita['gambar']; ?>" width="150">
        <br>
        
        <p>Ganti Gambar (Opsional):</p>
        <input type="file" name="gambar" accept="image/*">
        
        <button type="submit" name="update" class=".button_action">Update Berita</button>
    </form>
<?php } ?>
</body>
</html>