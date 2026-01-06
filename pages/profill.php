<?php
   include 'menu.php'
   ?>
    <style>
        .sej1 {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .yey1 {
            margin-top: 120px;
        }

        .profil {
            margin-bottom: 130px;
            font-size: 18px;
        }

        .ps {
            margin-bottom: 70px;
        }

        .skepse {
            font-size: 16px;
            padding-right: 90px;
        }

        .pg-img {
        }

        .judul {
           margin-bottom: 30px;
        }

        .juduldenah {
            margin-bottom: 30px;
            margin-left: 37px;
        }

        .program-unggulan {
            margin-top: 80px;
        }

        .subjud {
            font-size: 22px;
        }

        .denah-sekolah {
            margin-left: 380px;
        }
    </style>
</head>
<body>

    <main class="container mt-5 my-5 mb-5">
        <!-- Profil -->
         <div class="yey1">
        <section class="profil">
            <div class="ps">
            <h1 class="text-center mb-4">Profil SMPN 10 Malang</h1>
    </div>

            <!-- Sejarah --> 
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="sej1">
                        <div class="col-md-8">
                            <h2>Sejarah</h2>
                            <p>SMPN 10 Malang berdiri sejak tahun 1979 dan telah menjadi salah satu sekolah menengah pertama yang unggul di Kota Malang yang ditempuh dalam waktu Tiga tahun pelajaran, sama seperti SMP pada umumnya di Indonesia. Mulai dari Kelas VII sampai Kelas IX. Sekolah ini memiliki <b>akreditasi A</b>, berdasarkan <b>sertifikat 175/BAP-S/M/SK/X/2015.</b></p>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="LOGO-SMP10-1.png" alt="Logo SMPN 10 Malang" class="img-fluid" style="max-width: 120px;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Sambutan Kepala Sekolah -->
    <div class="sambutan-container mb-5" style="background-color: #fac47c; padding: 2rem; width: 100%; margin: 0;">
        <div class="text-center">
            <h2>Sambutan Kepala Sekolah</h2>
        </div>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="kepsekbro.jpg" alt="Foto Kepala Sekolah" class="img-fluid rounded" style="max-width: 300px;">
            </div>
            <div class="col-md-8">
                <p class="skepse">Selamat datang di website resmi SMPN 10 Malang. Website ini kami hadirkan sebagai sarana informasi dan komunikasi yang memudahkan semua pihak, baik siswa, orang tua, maupun masyarakat umum, untuk mengenal lebih dekat sekolah kami. Sebagai lembaga pendidikan yang berkomitmen dalam mencetak generasi cerdas dan berakhlak mulia, kami terus berupaya meningkatkan kualitas pembelajaran serta mengembangkan program unggulan yang berfokus pada nilai-nilai karakter dan kepedulian terhadap lingkungan.<br><br>
                Kami berharap website ini bisa menjadi jembatan untuk memperkuat sinergi antara sekolah, keluarga, dan masyarakat dalam mewujudkan visi pendidikan yang holistik. Terima kasih atas kunjungannya, dan kami siap memberikan yang terbaik bagi perkembangan siswa di SMPN 10 Malang.</p>
            </div>
        </div>
    </div>

    <main class="container mt-5 my-5 mb-5">
        <!-- Program Unggulan -->
        <section class="program-unggulan mb-5">
            <h2 class="judul">Program Unggulan</h2>
            <div class="row">
                <div class="col-md-7">
                    <div class="program-item">
                        <h3 class="subjud"><span><i class="bi bi-globe-americas"></i></span> Sekolah Sehat dan Ramah Lingkungan</h3>
                        <p>SMPN 10 Malang dikenal dengan budaya sekolah sehat dan ramah lingkungan. Sekolah ini memiliki rumah kompos yang dikelola oleh siswa untuk mengolah sampah organik. Gerakan menjaga kebersihan, membuang sampah pada tempatnya, dan membersihkan lingkungan sekolah menjadi rutinitas harian.</p>
                    </div>
                    <div class="program-item">
                        <h3 class="subjud"><span><i class="bi bi-person-raised-hand"></i></span> IMTAQ (Iman dan Taqwa)</h3>
                        <p>Program ini berfokus pada pengembangan spiritual dan akhlakul karimah siswa. Kegiatan keagamaan dan pembinaan karakter sangat ditekankan, membantu siswa tumbuh menjadi individu yang beriman dan berbudi pekerti luhur.</p>
                    </div>
                </div>
                <div class="col-md-5 text-center">
                    <div class="pg-img">
                    <img src="gambar1.png" alt="Illustration of school environment" class="img-fluid" style="max-width: 300px;">
                </div>
            </div>
        </section>

        <!-- Denah Sekolah -->
        <div class="denah-sekolah mb-5">
            <h2 class="juduldenah">Denah Sekolah</h2>
            <img src="isi (1).png" alt="Denah Sekolah" class="img-fluid" style="max-width: 300px;">
        </div>
    </main>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
