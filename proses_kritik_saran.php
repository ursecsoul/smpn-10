<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Kritik dan Saran - SMPN 10 Malang</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2E8B57;
            --secondary-color: #3CB371;
            --bg-soft: #F0FFF0;
        }

        body {
            background: linear-gradient(135deg, var(--bg-soft) 0%, #D0F0D0 100%);
            font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 1rem;
        }
        
        .result-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 45px rgba(46,139,87,0.1);
            padding: 3rem;
            text-align: center;
            max-width: 500px;
            width: 90%;
            border: 1px solid rgba(60,179,113,0.2);
            transform: perspective(1000px);
            transition: all 0.3s ease;
        }

        .result-container:hover {
            transform: perspective(1000px) translateY(-10px);
            box-shadow: 0 20px 50px rgba(46,139,87,0.2);
        }

        .status-icon {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 50px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            animation: iconPulse 1.5s infinite alternate;
        }

        .success-icon {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        }

        .error-icon {
            background: linear-gradient(45deg, #f44336, #ff7043);
        }

        .message {
            font-size: 1.25rem;
            color: #2c3e50;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .btn-back {
            background: var(--primary-color);
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            font-size: 1rem;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 5px 15px rgba(46,139,87,0.3);
        }

        .btn-back:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
            color: white;
            box-shadow: 0 7px 20px rgba(46,139,87,0.4);
        }

        @keyframes iconPulse {
            from {
                transform: scale(1);
            }
            to {
                transform: scale(1.05);
            }
        }

        @media (max-width: 576px) {
            .result-container {
                padding: 2rem;
            }

            .status-icon {
                width: 80px;
                height: 80px;
                font-size: 40px;
            }
        }
    </style>
</head>
<body>
    <?php
    include 'db.php';

    echo '<div class="result-container">';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = htmlspecialchars($_POST['nama']);
        $email = htmlspecialchars($_POST['email']);
        $kritik = htmlspecialchars($_POST['kritik']);
        
        $sql = "INSERT INTO kritik_saran (nama, email, kritik) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nama, $email, $kritik);
        
        if ($stmt->execute()) {
            echo '<div class="status-icon success-icon">✓</div>';
            echo '<div class="message">Terima kasih, ' . htmlspecialchars($nama) . '!<br>Masukan Anda telah berhasil dikirim.</div>';
        } else {
            echo '<div class="status-icon error-icon">✕</div>';
            echo '<div class="message">Maaf, terjadi kesalahan.<br>Silakan coba lagi nanti.</div>';
        }
        
        $stmt->close();
        $conn->close();
    } else {
        echo '<div class="status-icon error-icon">✕</div>';
        echo '<div class="message">Akses tidak valid.</div>';
    }
    
    echo '<a href="mandiri.php" class="btn-back">Kembali ke Beranda</a>';
    echo '</div>';
    ?>
</body>
</html>