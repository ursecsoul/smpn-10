<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pjbl/pjbl/pages/koneksi.php";

if (!isset($conn)) {
    die("Database connection is not established!");
}

// Tambah Data OSIS
if (isset($_POST['tambah'])) {
    $jabatan = $_POST['jabatan'];
    $nama = $_POST['nama'];
    
    if ($_FILES['foto']['error'] == 0) {
        $foto = time() . '_' . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/" . $foto);
    } else {
        $foto = "";
    }

    $stmt = $conn->prepare("INSERT INTO osis (jabatan, nama, foto) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $jabatan, $nama, $foto);
    $stmt->execute();
    //header("Location: indexx.php?page=osiss");
    //exit();
}

// Hapus Data OSIS
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    // Ambil foto sebelum dihapus
    $stmt = $conn->prepare("SELECT foto FROM osis WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($foto);
    $stmt->fetch();
    $stmt->close();

    if (!empty($foto) && file_exists("uploads/" . $foto)) {
        unlink("uploads/" . $foto);
    }

    $stmt = $conn->prepare("DELETE FROM osis WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    //header("Location: indexx.php?page=osiss");
    //exit();
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $jabatan = $_POST['jabatan'];
    $nama = $_POST['nama'];

    if (!empty($_FILES['foto']['name'])) {
        // Upload gambar baru
        $foto = time() . '_' . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/" . $foto);

        // Hapus gambar lama
        $stmt = $conn->prepare("SELECT foto FROM osis WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($old_foto);
        $stmt->fetch();
        $stmt->close();

        if (!empty($old_foto) && file_exists("uploads/" . $old_foto)) {
            unlink("uploads/" . $old_foto);
        }

        // Update dengan foto baru
        $stmt = $conn->prepare("UPDATE osis SET jabatan=?, nama=?, foto=? WHERE id=?");
        $stmt->bind_param("sssi", $jabatan, $nama, $foto, $id);
    } else {
        // Update tanpa mengubah foto
        $stmt = $conn->prepare("UPDATE osis SET jabatan=?, nama=? WHERE id=?");
        $stmt->bind_param("ssi", $jabatan, $nama, $id);
    }

    $stmt->execute();
    //header("Location: indexx.php?page=osiss");
    //exit();
}

// Ambil Data OSIS
$result = $conn->query("SELECT * FROM osis");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen OSIS</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
    <h2>Manajemen OSIS</h2>

    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="jabatan" placeholder="Jabatan (Ketua, Wakil, Sekretaris, Bendahara)" required>
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="file" name="foto" accept="image/*">
        <button type="submit" name="tambah" class=".button_action">
            <i class="fas fa-plus"></i> Tambah Data
        </button>
    </form>

    <table>
        <tr>
            <th>Jabatan</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php 
        while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= htmlspecialchars($row['jabatan']) ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td>
                <?php if ($row['foto']) { ?>
                    <img src="pages/pages/uploads/<?= htmlspecialchars($row['foto']) ?>" alt="Foto <?= htmlspecialchars($row['nama']) ?>">
                <?php } else { ?>
                    <span class="no-photo">Tidak Ada Foto</span>
                <?php } ?>
            </td>
            <td class="action-buttons">
                <a href="indexx.php?page=osiss&hapus=<?= $row['id'] ?>" class="hapus-btn" onclick="return confirm('Hapus data ini?')">
                    <i class="fas fa-trash"></i> Hapus
                </a>
                <button class="edit-btn" onclick="showEditForm(<?= $row['id'] ?>)">
                    <i class="fas fa-edit"></i> Edit
                </button>
            </td>
        </tr>

        <tr id="editForm<?= $row['id'] ?>" style="display: none;">
            <td colspan="4" class="edit-form">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="text" name="jabatan" value="<?= htmlspecialchars($row['jabatan']) ?>" required>
                    <input type="text" name="nama" value="<?= htmlspecialchars($row['nama']) ?>" required>
                    <input type="file" name="foto" accept="image/*">
                    <button type="submit" name="edit">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

    <script>
        function showEditForm(id) {
            const editForm = document.getElementById('editForm' + id);
            editForm.style.display = editForm.style.display === 'none' ? 'table-row' : 'none';
        }
    </script>
</body>
</html>