<?php
   include 'menu.php'
   ?>

    <style>
 :root {
            --primary-color: #00712D;
            --secondary-color: #f8f9fa;
        }

body {
            background-color: var(--secondary-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

.intift {
    border-radius: 100px;
    margin-left: 80px;
    margin-right: 80px;
    margin-top: 110px;
}

.card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 30px;
        }

            
.card:hover {
                transform: scale(1.05); /* Slightly enlarges the card */
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Adds shadow for a pop-up effect */
            }

.card-img-top {
            height: 300px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .card-body {
            padding: 1.5rem;
            background: white;
        }

        .card-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .card-text {
            color: #666;
            font-size: 0.95rem;
        }

        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
   
    <!-- Group Photo -->
     <div class="intift">
    <section class="text-center mb-5">
        <img src="gurukt.jpg" alt="Group Photo of Teachers" class="img-fluid rounded">
    </section>
    </div>
    
    <!-- Main Header -->
    <section class="text-center my-5">
        <h1>GURU</h1>
        <h2>SMPN 10 Malang</h2>
    </section>


   <!-- Teachers Grid -->
<section class="container">
    <div class="row">


            <!-- Teacher 1 -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="kepsekbro.jpg" class="card-img-top" alt="Hadiullah">
                    <div class="card-body text-center">
                        <h5 class="card-title">1. Hadiullah, S.Pd., S.E.</h5>
                        <p class="card-text" style="margin-bottom: 3px">Kepala Sekolah SMP Negeri 10 Malang</p>
                    </div>
                </div>
            </div>

            <!-- Teacher 2 -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="TOTOK-PURWITO-S.Pd_.-4-2-1024x1536.jpg" class="card-img-top" alt="Totok Purwito">
                    <div class="card-body text-center">
                        <h5 class="card-title">2. Totok Purwito, S.Pd</h5>
                        <p class="card-text" style="margin-bottom: 27px">Bagian: Tata Usaha dan Prasarana</p>
                    </div>
                </div>
            </div>

            <!-- Teacher 3 -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="JOKO-YUNIARTO-S.Pd_.-3-1-1024x1536.jpg" class="card-img-top" alt="Joko Yulianto">
                    <div class="card-body text-center">
                        <h5 class="card-title">3. Joko Yulianto, S.Pd</h5>
                        <p class="card-text" style="margin-bottom: 25px;">Bagian: Kurikulum</p>
                    </div>
                </div>
            </div>

            <!-- Teacher 4 -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="Dra.-RAKHMAWATI-2-2-683x1024 (2).jpg" class="card-img-top" alt="Eka Hastarawati">
                    <div class="card-body text-center">
                        <h5 class="card-title">4. Dra. Rakhmawati</h5>
                        <p class="card-text" style="margin-bottom: 28px">Bagian: Hubungan Masyarakat</p>
                    </div>
                </div>
            </div>

            <!-- Teacher 5 -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="KAMALI-S.Pd_.-1-1-683x1024 (1).jpg" class="card-img-top" alt="Komari">
                    <div class="card-body text-center">
                        <h5 class="card-title">5. Kamali, S.Pd</h5>
                        <p class="card-text" style="margin-bottom: 27px">Bagian: Kesiswaan</p>
                    </div>
                </div>
            </div>

            <!-- Teacher 6 -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="RIRIN-EKA.jpg" class="card-img-top" alt="Ririn Eka Wahyuni">
                    <div class="card-body text-center">
                        <h5 class="card-title" style="margin-bottom: 12px">6. Ririn Eka Wahyuni, S.SI</h5>
                        <p class="card-text">Bagian: Perpustakaan</p>
                    </div>
                </div>
            </div>

            <!-- Teacher 7 -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="RENY-SETYOWATI.jpg" class="card-img-top" alt="Reny Setyanani">
                    <div class="card-body text-center">
                        <h5 class="card-title">7. Reny Setyanani, S.Pd</h5>
                        <p class="card-text" style="margin-bottom: 27px">Bagian: Laboratorium</p>
                    </div>
                </div>
            </div>

            <!-- Teacher 8 -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="ACHMAD-JAZULI.jpg" class="card-img-top" alt="Achmad Iswat">
                    <div class="card-body text-center">
                        <h5 class="card-title">8. Achmad Iswat, S.Si</h5>
                        <p class="card-text" style="margin-bottom: 27px">Guru IPA</p>
                    </div>
                </div>
            </div>

            <!-- Teacher 9 -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="ACHMAD-FAISAL.jpg" class="card-img-top" alt="Achmad Iswat">
                    <div class="card-body text-center">
                        <h5 class="card-title">9. Achmad Faisal A, S.Pd</h5>
                        <p class="card-text" style="margin-bottom: 27px">Guru IPA</p>
                    </div>
                </div>
            </div>

            <!-- Teacher 10 -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="ZULFA-HIDAYATI.jpg" class="card-img-top" alt="ZULFA HIDAYATI">
                    <div class="card-body text-center">
                        <h5 class="card-title">10. Zulfa Hidayat, S.Ag</h5>
                        <p class="card-text" style="margin-bottom: 27px">Guru IPA</p>
                    </div>
                </div>
            </div>

            <!-- Teacher 11 -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="YENNI-SUNARYATI.jpg" class="card-img-top" alt="YENNI SUNARYATI">
                    <div class="card-body text-center">
                        <h5 class="card-title">11. Yenni Sunaryati, S.Pd</h5>
                        <p class="card-text" style="margin-bottom: 25px">Guru PPKN</p>
                    </div>
                </div>
            </div>

            <!-- Teacher 12 -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="SHELLY-MERARI-RIZKA.jpg" class="card-img-top" alt="SHELLY MERARI RIZKA">
                    <div class="card-body text-center">
                        <h5 class="card-title">12. Shelly Merari Rizka Ernindita, S.Pd</h5>
                        <p class="card-text">Guru PPKN</p>
                    </div>
                </div>
            </div>
    </section>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>