<?php
include "koneksi.php";

// Tambah Sambutan
if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    
    $gambar = "";
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = "uploads/" . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
    }

    $query = "INSERT INTO sambutan (judul, isi, gambar) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $judul, $isi, $gambar);
    $stmt->execute();
    header("Location: sambutan.php");
}

// Hapus Sambutan
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query = "DELETE FROM sambutan WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: sambutan.php");
}

// Edit Sambutan
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = "uploads/" . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
        $query = "UPDATE sambutan SET judul=?, isi=?, gambar=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssi", $judul, $isi, $gambar, $id);
    } else {
        $query = "UPDATE sambutan SET judul=?, isi=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $judul, $isi, $id);
    }
    $stmt->execute();
    header("Location: sambutan.php");
}

// Ambil Data Sambutan
$result = $conn->query("SELECT * FROM sambutan");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Sambutan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background-color: #fff5eb;
            padding: 2rem;
            color: #333;
        }

        h2 {
            color: #ff8c42;
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        form {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(255, 140, 66, 0.1);
            max-width: 800px;
            margin: 0 auto 2rem auto;
            display: grid;
            gap: 1.2rem;
        }

        input[type="text"], textarea {
            padding: 1rem;
            border: 2px solid #ffd5b5;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        input[type="text"]:focus, textarea:focus {
            outline: none;
            border-color: #ff8c42;
            box-shadow: 0 0 0 3px rgba(255, 140, 66, 0.2);
        }

        input[type="file"] {
            background: #fff5eb;
            padding: 1rem;
            border-radius: 8px;
            width: 100%;
        }

        button {
            background-color: #ff8c42;
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        button:hover {
            background-color: #ff7425;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 140, 66, 0.2);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(255, 140, 66, 0.1);
            margin-top: 2rem;
        }

        th, td {
            padding: 1.2rem;
            text-align: left;
            border-bottom: 1px solid #ffd5b5;
        }

        th {
            background-color: #ff8c42;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background-color: #fff5eb;
        }

        td img {
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .action-buttons {
            display: flex;
            gap: 0.8rem;
        }

        .action-buttons a, .action-buttons button {
            padding: 0.6rem 1rem;
            text-decoration: none;
            border-radius: 6px;
            font-size: 0.9rem;
        }

        .delete-btn {
            background-color: #ff6b6b;
            color: white;
        }

        .edit-btn {
            background-color: #4ecdc4;
            color: white;
        }

        .edit-form {
            background: #fff9f5;
            padding: 1.5rem;
            border-radius: 8px;
            margin-top: 1rem;
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            
            table {
                display: block;
                overflow-x: auto;
            }
            
            th, td {
                padding: 1rem;
            }

            form {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <h2>Manajemen Sambutan</h2>

    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="judul" placeholder="Judul Sambutan" required>
        <textarea name="isi" placeholder="Isi Sambutan" required></textarea>
        <input type="file" name="gambar" accept="image/*">
        <button type="submit" name="tambah">Tambah Sambutan</button>
    </form>

    <table>
        <tr>
            <th>Judul</th>
            <th>Isi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= htmlspecialchars($row['judul']) ?></td>
            <td><?= htmlspecialchars($row['isi']) ?></td>
            <td>
                <?php if (!empty($row['gambar'])): ?>
                    <img src="<?= htmlspecialchars($row['gambar']) ?>" width="100">
                <?php endif; ?>
            </td>
            <td class="action-buttons">
                <a href="sambutan.php?hapus=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                <button class="edit-btn" onclick="showEditForm(<?= $row['id'] ?>)">Edit</button>
            </td>
        </tr>
        <tr id="editForm<?= $row['id'] ?>" style="display: none;">
            <td colspan="4" class="edit-form">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="text" name="judul" value="<?= htmlspecialchars($row['judul']) ?>" required>
                    <textarea name="isi" required><?= htmlspecialchars($row['isi']) ?></textarea>
                    <input type="file" name="gambar" accept="image/*">
                    <button type="submit" name="edit">Simpan Perubahan</button>
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