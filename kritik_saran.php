<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kritik dan Saran - SMPN 10 Malang</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2E8B57;
            --secondary-color: #3CB371;
            --text-color: #0E5E3E;
            --bg-soft: #F0FFF0;
        }

        body {
            background: linear-gradient(135deg, var(--bg-soft) 0%, #D0F0D0 100%);
            font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0;
        }
        
        .feedback-wrapper {
            width: 100%;
            max-width: 600px;
        }

        .form-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 45px rgba(46,139,87,0.1);
            overflow: hidden;
            border: 1px solid rgba(60,179,113,0.2);
        }

        .header-section {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2.5rem 2rem;
            text-align: center;
            position: relative;
        }

        .header-section::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 0;
            right: 0;
            height: 30px;
            background: inherit;
            transform: skewY(-3deg);
        }

        .school-logo {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid rgba(255,255,255,0.2);
            box-shadow: 0 10px 25px rgba(46,139,87,0.2);
        }

        .form-content {
            padding: 3rem 2.5rem;
            position: relative;
        }

        .form-label {
            font-weight: 600;
            color: var(--text-color);
        }

        .form-control {
            border: 2px solid var(--secondary-color);
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
            color: var(--text-color);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(46,139,87,0.15);
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
            padding: 12px 2rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-weight: 600;
            transition: all 0.4s ease;
        }

        .btn-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: 0 7px 14px rgba(46,139,87,0.2);
        }

        .required-star {
            color: #dc3545;
            margin-left: 4px;
        }

        @media (max-width: 768px) {
            .form-content {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="feedback-wrapper">
        <div class="form-container">
            <div class="header-section">
                <img src="LOGO-SMP10-1.png" alt="Logo SMPN 10 Malang" class="school-logo mb-3">
                <h1 class="h3 mb-3">Kritik dan Saran</h1>
                <p class="text-white-75">Bantu kami menjadi lebih baik. Masukan Anda sangat berarti!</p>
            </div>
            
            <div class="form-content">
                <form action="proses_kritik_saran.php" method="POST">
                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama Lengkap<span class="required-star">*</span></label>
                        <input type="text" class="form-control" id="nama" name="nama" required 
                               placeholder="Masukkan nama lengkap Anda">
                    </div>
                    
                    <div class="mb-4">
                        <label for="email" class="form-label">Email<span class="required-star">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required 
                               placeholder="Alamat email Anda">
                    </div>
                    
                    <div class="mb-4">
                        <label for="kritik" class="form-label">Kritik & Saran<span class="required-star">*</span></label>
                        <textarea class="form-control" id="kritik" name="kritik" rows="5" required 
                                  placeholder="Tuliskan masukan konstruktif Anda untuk kemajuan sekolah"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            Kirim Masukan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>