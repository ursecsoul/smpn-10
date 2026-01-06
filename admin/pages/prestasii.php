<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pjbl/pjbl/pages/koneksi.php";

if (!isset($conn)) {
    die("Database connection is not established!");
}

// Proses tambah prestasi
if (isset($_POST['tambah'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $gambar = $_FILES['gambar'];
        $namaFile = time() . "_" . basename($gambar['name']);

        $folderTujuan = "../pages/uploads/";

        $tmp = $gambar['tmp_name']; 

        if (!is_dir($folderTujuan)) {
            mkdir($folderTujuan, 0777, true);
        }

        $pathSimpan = $folderTujuan . $namaFile;
        $simpanFile = "../pages/uploads/" . $namaFile;

        if (move_uploaded_file($tmp, $pathSimpan)) {
            $query = "INSERT INTO achievements (title, description, gambar) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sss", $title, $description, $simpanFile);
            $stmt->execute();
        }
    }
    //header("Location: indexx.php?page=prestasii");
    //exit();
}

// Proses hapus prestasi
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $query = "SELECT gambar FROM achievements WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($gambar);
    $stmt->fetch();
    $stmt->close();
    
    if ($gambar && file_exists("../uploads/" . $gambar)) {
        unlink("../pages/uploads/" . $gambar);
    }

    $query = "DELETE FROM achievements WHERE id=$id";

    if ($conn->query($query)) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='indexx.php?page=prestasii';</script>";
    } else {
        echo "Gagal menghapus data: " . $conn->error;
    }
    
}

// Proses update prestasi
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

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
            $queryOld = "SELECT gambar FROM achievements WHERE id = ?";
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
            $query = "UPDATE achievements SET title=?, description=?, gambar=? WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssi", $title, $description, $simpanFile, $id);
        } else {
            echo "Gagal mengunggah gambar baru!";
            exit;
        }
    } else {
        // Update without changing the image
        $query = "UPDATE achievements SET title=?, description=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $title, $description, $id);
    }

    if ($stmt->execute()) {
        echo "Data berhasil diperbarui!";
        echo "<script>window.location='?page=prestasii';</script>";
    } else {
        echo "Gagal memperbarui data.";
    }
}

// Ambil data prestasi
$result = $conn->query("SELECT * FROM achievements");
?>
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

<h2>Manajemen Prestasi</h2>

<!-- Form Tambah Prestasi -->
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Nama Prestasi" required>
    <textarea name="description" placeholder="Deskripsi" required></textarea>
    <input type="file" name="gambar" accept="image/*" required>
    <button type="submit" name="tambah">Tambah Prestasi</button>
</form>

<!-- Tabel Prestasi -->
<table border="1">
    <tr>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>
    <?php 
     $sql = "SELECT * FROM achievements " ;
     $result = $conn->query($sql);
     
    while ($row = $result->fetch_assoc()) { 
    // echo "<tr>";
// echo   "<td>" . htmlspecialchars($row['title']) . "</td>";
// echo   "<td>" . htmlspecialchars($row['description']) . "</td>";
// echo   "<td><img src='" . htmlspecialchars($row['gambar']) . "' width='100'></td>";
// echo   "<td>
//         <a href='?edit={$row['id']}' onclick='return confirm(\"Yakin ingin mengedit?\")'>Edit</a> 
//         <a href='?hapus={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
//         </td>";
// echo "</tr>";
    ?>
        <tr>
        <td><?= htmlspecialchars($row['title']) ?></td>
<td><?= nl2br(htmlspecialchars($row['description'])) ?></td>
<td><img src="<?= $row['gambar']; ?>" width="100"></td>
<td class="action-buttons">
    <a href="indexx.php?page=prestasii&hapus=<?= $row['id'] ?>" class="hapus-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus prestasi ini?')">
        <i class="fas fa-trash"></i> Hapus
    </a>
    <button class="edit-btn" style="background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%); color: white; padding: 0.8rem 1.2rem; border-radius: 8px; display: flex; align-items: center; gap: 0.5rem; font-weight: 600; transition: all 0.3s ease;" onclick="showEditForm(<?= $row['id'] ?>)">
        <i class="fas fa-edit"></i> Edit
    </button>
</td>

    </tr>

    <!-- Form Edit (Hidden by default) -->
    <tr id="editForm<?= $row['id'] ?>" style="display: none;">
        <td colspan="5">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required>
                <textarea name="description" required><?= htmlspecialchars($row['description']) ?></textarea>
                <input type="file" name="gambar" accept="image/*">
                <button type="submit" name="update" class=".button_action">Update Prestasi</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>

<!-- Script JavaScript -->
<script>
    function showEditForm(id) {
        document.getElementById('editForm' + id).style.display = 'table-row';
    }

    function openPopup(id) {
        document.getElementById(id).style.display = 'block';
    }

    function closePopup(id) {
        document.getElementById(id).style.display = 'none';
    }
</script>
