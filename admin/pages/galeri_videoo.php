<?php
include $_SERVER['DOCUMENT_ROOT'] . "/pjbl/pjbl/pages/koneksi.php";

if (!isset($conn)) {
    die("Database connection is not established!");
}

// Fungsi untuk mengambil ID video YouTube
function getYoutubeID($url) {
    parse_str(parse_url($url, PHP_URL_QUERY), $params);
    return isset($params['v']) ? $params['v'] : basename(parse_url($url, PHP_URL_PATH));
}

// Tambah Video
if (isset($_POST['add_video'])) {
    $title = $_POST['title'];
    $video_url = $_POST['video_url'];
    
    $query = "INSERT INTO videos (title, video_url) VALUES ('$title', '$video_url')";
    mysqli_query($conn, $query);
    header('Location: indexx.php?page=galeri_videoo');
}

// Edit Video
if (isset($_POST['edit_video'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $video_url = $_POST['video_url'];

    $query = "UPDATE videos SET title='$title', video_url='$video_url' WHERE id=$id";
    mysqli_query($conn, $query);
    //header('Location: indexx.php?page=galeri_videoo');
}

// Hapus Video
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM videos WHERE id=$id";
    mysqli_query($conn, $query);
    //header('Location: indexx.php?page=galeri_videoo');
}

// Ambil Data Video
$result = mysqli_query($conn, "SELECT * FROM videos");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Video</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
    <div class="container">
        <div class="page-header">
            <h2 class="page-title">Kelola Video</h2>
        </div>

        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addVideoModal">
            Tambah Video
        </button>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Video</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= htmlspecialchars($row['title']) ?></td>
                            <td>
    <iframe width="200" height="150" src="https://www.youtube.com/embed/<?= getYoutubeID($row['video_url']) ?>" allowfullscreen></iframe>
</td>
<td class="action-buttons">
    <button class="edit-btn" data-bs-toggle="modal" data-bs-target="#editVideoModal<?= $row['id'] ?>">
        <i class="fas fa-edit"></i> Edit
    </button>
    <a href="indexx.php?page=galeri_videoo&delete=<?= $row['id'] ?>" class="hapus-btn" onclick="return confirm('Yakin ingin menghapus?')">
        <i class="fas fa-trash"></i> Hapus
    </a>
</td>
                        </tr>

                        <!-- Modal Edit Video -->
                        <div class="modal fade" id="editVideoModal<?= $row['id'] ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Video</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST">
                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            <div class="mb-3">
                                                <label class="form-label">Judul Video</label>
                                                <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($row['title']) ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">URL Video</label>
                                                <input type="text" name="video_url" class="form-control" value="<?= htmlspecialchars($row['video_url']) ?>" required>
                                            </div>
                                            <button type="submit" name="edit_video" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Video -->
    <div class="modal fade" id="addVideoModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Judul Video</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">URL Video</label>
                            <input type="text" name="video_url" class="form-control" required>
                        </div>
                        <button type="submit" name="add_video" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
