<?php 
include 'menu.php';
include 'koneksi.php';

// Fungsi untuk mengonversi URL YouTube menjadi format embed
function convertToEmbedUrl($url) {
    // Jika URL sudah dalam format embed, langsung return
    if (strpos($url, 'youtube.com/embed') !== false) {
        return $url;
    }

    // Jika URL dalam format watch?v=
    if (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1];
    }

    // Jika URL dalam format youtu.be/
    if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1];
    }

    // Jika URL tidak valid, return string kosong
    return '';
}

// Ambil Data Video dari Database
$result = mysqli_query($conn, "SELECT * FROM videos");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Video</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        .video-card {
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            background-color: #f8f9fa;
            width: 100%;
            margin-top: 20px;
            margin-bottom: 25px;
            cursor: pointer;
        }
        .video-card:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            border-bottom: 4px solid #26901f;
        }
        .card-title {
            font-weight: bold;
            color: #333;
            text-align: center;
        }
        .card-body {
            padding: 15px;
            text-align: center;
        }

        /* Modal styles */
        .modal-dialog {
            max-width: 90%;
            margin: 1.75rem auto;
        }
        .modal-content {
            background-color: transparent;
            border: none;
        }
        .modal-header {
            border: none;
            padding: 0;
            position: relative;
        }
        .modal-body {
            padding: 0;
        }
        .modal-video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }
        .modal-video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        .close-modal {
            position: absolute;
            right: -40px;
            top: -40px;
            color: white;
            font-size: 30px;
            font-weight: bold;
            background: none;
            border: none;
            cursor: pointer;
            z-index: 1051;
        }
    </style>
</head>
<body>

    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close-modal" data-bs-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <div class="modal-video-container">
                        <iframe id="modalVideo" src="" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php while ($row = mysqli_fetch_assoc($result)) { 
                $embedUrl = convertToEmbedUrl($row['video_url']);
                if (!$embedUrl) continue; // Skip jika URL tidak valid
            ?>
                <div class="col-lg-5 col-md-4 ms-md-5">
                    <div class="card video-card" data-video="<?= htmlspecialchars($embedUrl) ?>" data-bs-toggle="modal" data-bs-target="#videoModal">
                        <div class="video-container">
                            <iframe src="<?= htmlspecialchars($embedUrl) ?>" title="<?= htmlspecialchars($row['title']) ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all video cards
    const videoCards = document.querySelectorAll('.video-card');
    const videoModal = document.getElementById('videoModal');
    const modalVideo = document.getElementById('modalVideo');

    // Tambahkan event listener untuk setiap video-card
    videoCards.forEach(card => {
        card.addEventListener('click', function() {
            const videoUrl = this.getAttribute('data-video');
            modalVideo.src = videoUrl;
            const modal = new bootstrap.Modal(videoModal);
            modal.show();
        });
    });

    // Reset video src ketika modal ditutup
    videoModal.addEventListener('hidden.bs.modal', function () {
        modalVideo.src = '';
    });
});
</script>
</body>
</html>
