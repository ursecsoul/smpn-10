    <?php
    include('menu.php'); 
    ?>
        <title>Prestasi SMPN 10 Malang</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        
        <style>
            :root {
                --primary-color: #FF8C00;
                --secondary-color: #FFA500;
                --accent-color: #FFD700;
                --text-dark: #333;
                --text-light: #666;
            }

            body {
                background-color: #f5f5f5;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            /* Navbar */
            .navbar {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 100;
            }

            .news-section {
                padding: 2rem 0;
                margin-top: 80px;
                position: relative;
                z-index: 1;
            }

            .section-title {
                text-align: center;
                margin-bottom: 3rem;
                color: var(--text-dark);
                font-weight: 600;
                position: relative;
                padding-bottom: 15px;
            }

            .section-title::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 50%;
                transform: translateX(-50%);
                width: 100px;
                height: 3px;
                background: var(--primary-color);
            }

            .horizontal-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 2rem;
                padding: 0 1.5rem;
            }

            .content-card {
                background: white;
                border-radius: 15px;
                overflow: hidden;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            }

            .image-box {
                position: relative;
                padding-top: 66.67%; /* 3:2 Aspect Ratio */
                overflow: hidden;
            }

            .image-box img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s;
            }

            .text-box {
                padding: 1.5rem;
            }

            .text-box h4 {
                color: var(--text-dark);
                font-size: 1.25rem;
                margin-bottom: 1rem;
                font-weight: 600;
                line-height: 1.4;
            }

            .text-box p {
                color: var(--text-light);
                font-size: 0.95rem;
                line-height: 1.6;
                margin-bottom: 1.5rem;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .btn-read-more {
                background: var(--primary-color);
                color: white;
                padding: 0.75rem 1.5rem;
                border-radius: 25px;
                border: none;
                font-weight: 500;
                transition: all 0.3s ease;
            }

            .btn-read-more:hover {
                background: var(--secondary-color);
                transform: translateY(-2px);
            }

            /* Popup Styles */
            .popup-modal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.85);
                backdrop-filter: blur(8px);
                z-index: 1000;
                opacity: 0;
                transition: opacity 0.5s ease;
            }

            .popup-modal.show {
                display: flex;
                opacity: 1;
            }

            .popup-content {
                background: white;
                width: 90%;
                max-width: 900px;
                max-height: 90vh;
                margin: auto;
                border-radius: 25px;
                padding: 2.5rem;
                position: relative;
                overflow-y: auto;
                transform: scale(0.7) translateY(50px);
                opacity: 0;
                transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            }

            .popup-modal.show .popup-content {
                transform: scale(1) translateY(0);
                opacity: 1;
            }

            .popup-close {
                position: absolute;
                top: 1.5rem;
                right: 1.5rem;
                background: #ff4d4d;
                color: white;
                border: none;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.4s ease;
                font-size: 1.2rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .popup-close:hover {
                background: #ff1a1a;
                transform: rotate(90deg) scale(1.1);
                box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
            }

            .popup-content h4 {
                color: #333;
                font-size: 1.8rem;
                margin-bottom: 1.5rem;
                font-weight: 700;
                border-bottom: 3px solid var(--primary-color);
                padding-bottom: 0.75rem;
                text-transform: uppercase;
            }

            .img1 {
                width: 100%;
                max-width: 600px; /* Limit maximum width */
                max-height: 400px; /* Limit maximum height */
                height: auto;
                object-fit: contain; /* Maintain aspect ratio */
                border-radius: 15px;
                margin: 1.5rem auto; /* Center the image */
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
                transition: transform 0.3s ease;
                display: block; /* Make margins work with block element */
            }   

            .popup-content p {
        color: #444;
        font-size: 1.1rem;
        line-height: 1.8;
        margin-top: 1.5rem;
        margin-bottom: 1.5rem; /* Add this line for bottom spacing */
    }

            .popup-content::-webkit-scrollbar {
        width: 8px;
    }

    .popup-content::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .popup-content::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    .popup-content::-webkit-scrollbar-thumb:hover {
        background: #666; 
    }


            .popup-loading {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                display: none;
            }

            .popup-loading.show {
                display: block;
            }

            @media (max-width: 768px) {
                .popup-content {
                    width: 95%;
                    padding: 1.5rem;
                }

                .popup-content h4 {
                    font-size: 1.4rem;
                }

                .popup-close {
                    width: 35px;
                    height: 35px;
                    top: 1rem;
                    right: 1rem;
                }
            }
        </style>
    </head>
    <body>

    

    <!-- Popup 1 -->
    <!-- <div class="popup-modal" id="popup1">
        <div class="popup-content">
            <button class="popup-close text-center" onclick="closePopup('popup1')">X</button>
            <h4 class="text-center">Tradisi Juara</h4>
            <img class="img1" src="TRADISI-JUARA-1-864x1536.png">
            <p>Salam Sehat! SMPN 10 Malang merupakan salahsatu sekolah di Kota Malang yang memiliki segudang prestasi yang membanggakan. Tidak hanya dalam bidang akademik saja, namun juga bidang non akademik. Berikut daftar prestasi siswa SMPN 10 Malang yang di dapatkan pada Bulan Oktober 2024:<br><br>

                <br>1. <span style="color: orange;"><b>Juara 1</b></span> Robotic Creative Bootcamp diraih oleh : Alditwo Barca N. H (9C), Nararya Wirazahran P. (9C), M. Bima Al Akbar P. (9C), M. Bagas Ardzi A. (9C)<br>
                <br>2. <span style="color: orange;"><b>Juara 2 </b></span>Tanding Pra Remaja Putra Kelas E pada Kejuaraan Pencak Silat National Kanjuruhan Fighter Competition 2024 diraih oleh Marcel Athaya Firdaus (8C)<br>
                <br>3. <span style="color: orange;"><b>Juara Harapan 2</b></span> Tingkat SMP/MTS pada Olimpiade Matematika Edutalenta Tingkat Kota Malang diraih oleh Vickry Aldiano Firmansyah (9G)<br>
                <br>4. <span style="color: orange;"><b>Juara 1</b></span> Tangan Kosong pada Kejuaraan Pencak Silat National Kanjuruhan Fighter Competition 2024 diraih oleh Gemma Narraya Muntaha kelas 7D<br>
                <br>5. <span style="color: orange;"><b>Juara 2</b></span> Tunggal Senjata pada Kejuaraan Pencak Silat National Kanjuruhan Fighter Competition 2024 diraih oleh Fela Kurniala kelas 7G<br>
                <br>6. <span style="color: orange;"><b>Juara 3</b></span> Tanding Pra Remaja pada Kejuaraan Pencak Silat National Kanjuruhan Fighter Competition 2024 diraih oleh Rahmatul Sasi Maulida kelas 8H<br>
                <br>7. <span style="color: orange;"><b>Juara 3</b></span> Tanding Pra Remaja pada Kejuaraan Pencak Silat National Kanjuruhan Fighter Competition 2024 diraih oleh Salsabila Mahendra Putri kelas 8D<br>
                <br>8. <span style="color: orange;"><b>Juara 2</b></span> Tanding Pra Remaja pada Kejuaraan Pencak Silat National Kanjuruhan Fighter Competition 2024 diraih oleh Ahmad Bustomi kelas 8B<br>
                <br>9. <span style="color: orange;"><b>Juara 3</b></span> Tanding Pra Remaja pada Kejuaraan Pencak Silat National Kanjuruhan Fighter Competition 2024 diraih oleh Java Mahadirga Putra Sholeh Kelas 8H</p>
        </div>
    </div> -->

    <!-- Popup 2 -->
    <!-- <div class="popup-modal" id="popup2">
        <div class="popup-content">
            <button class="popup-close text-center" onclick="closePopup('popup2')">X</button>
            <h4 class="text-center">Prestasi siswa SMPN 10 Malang</h4>
            <img class="img1" src="pppssss - Copy.jpeg">
            <p>SMPN 10 Malang merupakan salahsatu sekolah di Kota Malang yang memiliki segudang prestasi yang membanggakan. Tidak hanya dalam bidang akademik saja, namun juga bidang non akademik. Berikut daftar prestasi siswa SMPN 10 Malang yang di dapatkan pada Bulan Juli-September 2024:<br><br>

                1.Aisar Fathan kelas 7H: Best player dan Juara 1 Sepakbola Pemuda Pancasila Cup th 2024<br>
                <br>2.Tim PASKIBRA SMPN 10 Malang : Harapan 2 LKBB Nusantara th 2024<br>
                <br>3.Tim Inovasi SMPN 10 Malang : Juara 3 INOTEK Kota Malang th 2024<br>
                <br>4.Chintya Jasmine kelas 9F : Juara 2 Olimpiade Sains Nasional IPS tingkat Kota Malang th 2024<br>
                <br>5.Elfian Kelas 9B : Juara 3 Olimpiade Sains Nasional IPS tingkat Kota Malang th 2024</p>
        </div>
    </div>  -->

    <!-- Popup 3 -->
    <!-- <div class="popup-modal" id="popup3">
        <div class="popup-content">
            <button class="popup-close" onclick="closePopup('popup3')">X</button>
            <h4 class="text-center">GURU IPA SMPNN 10 KOTA MALANG RAIH KALPATARU</h4><br>
            <img class="img1" src="IPA - Copy.jpeg" alt="Tradisi Juara" />
            <p>Adalah IDA WAHYUNI yang tercatat sejak 2005 sebagai ASN guru IPA SMPN 10 Malang, guru berprestasi Juara 1 Kota Malang, sekaligus Guru Penggerak Angkatan 9 ini berhasil mendapatkan penghargaan bergengsi dibidang Lingkungan Hidup dari Pemerintah Provinsi Jawa Timur yaitu Pelestari Pungsi Lingkungan Hidup (PFLH) atau yang lebih di kenal dengan Penghargaan Kalpataru, dalam Kategori Pengabdi Lingkungan. Penghargaan itu diberikan langsung oleh Pj. Gubernur Jawa Timur Adhy Karyono, A.Ks., M.A.P pada Puncak Peringatan Hari Lingkungan Hidup Provinsi Jawa Timur, di Taman Pandan Wilis Kabupaten Nganjuk pada hari Rabu 9-10-2024  lalu. <br><br>
                Seleksinya ketat, mulai dari seleksi administrasi sampai verifikasi lapangan. Saya bersyukur, Kota Malang ada dua yang lolos PFLH yaitu, Saya dan Pak Sulaiman Sulang sedangkan tiga lainnya diraih oleh Organisasi Penggiat Lingkungan dari Kabupaten Pasuruan, Ponorogo dan Nganjuk. Kompetitornya dari 38 Kabupaten/Kota se-Jawa Timur.<br><br>
                Dengan diraihnya penghargaan bergengsi ini bukti bahwa Ida Wahyuni adalah seorang penggiat lingkungan yang secara terbuka waktunya, tenaganya maupun pikirannya untuk melestarikan fungsi lingkungan hidup baik Lokal, Nasional, maupun Internasional. Tidak hanya di SMPN 10 Malang tetapi juga berkontribusi untuk sekolah Adiwiyata di seluruh Nusantara. Ida Wahyuni  menulis 9 judul buku dan 10 Artikel populer bertema lingkungan hidup, menggelorakan Gerakan Peduli dan Berbudaya Lingkungan Hidup di Sekolah (GPBLHS) hingga ke Tanah Papua, Risertnya bertajuk lingkungan dalam study S2 dan S3nya sangat mendukung pula dalam kegiatan 
                praktek baik untuk sekolah Adiwiyata. Menjadi Tim Sekolah Adiwiyata di SMPN 10 Malang mulai tingkat Kota di tahun 2012 hingga mencapai Asean Eco School saat ini mencetaknya menjadi praktisi penggiat lingkungan yang bisa diandalkan. Ida Wahyuni juga menjadi Tim Puskurjar Kemendikbudristek untuk menyusun modul ajar kurmer Bermuatan Lingkungan sekaligus Narasumber Nasional Puncak Peringatan 17 tahun Adiwiyata di Manggala Wanabakti Kementrian Lingkungan Hidup dan Kehutanan (KLHK). Menjadi Delegasi DLH Kota Malang dalam Kegiatan Workshop Environmental Data Base Challenge  Profesionalism and Managing Change In 21’ Century Education – di 
                Malaysia sekaligus Presenter International Conference on Community Development in the ASEAN (ICCD) di Bandar Seri Begawan Brunei Darussalam, Title of paper: The Critical Education View Of The Modern Community Against The Environment.<br><br>
                Konsistensi ini lah yang akhirnya Ida Wahyuni dinobatkan oleh Gubernur Jawa Timur sebagai Tokoh Pelestari Fungsi Lingkungan Hidup Kategori Pengabdi Lingkungan didampingi pejabat Dinas Lingkungan Hidup Kota Malang dan Kepala Sekolah SMPN 10 Malang.</br><br>
                Dengan apresiasi ini harapan besar menjadi motivasi serta contoh bagi generasi muda calon pemimpin bangsa untuk terus melakukan  kegiatan yang mendukung kelestarian lingkungan hidup secara konsisten dan berkelanjutan begitu pula program di bidang lingkungan hidup akan terus di lakukan tanpa henti.<br></p>
        </div>
    </div> -->

    <!-- Popup 4 -->
    <!-- <div class="popup-modal" id="popup4">
        <div class="popup-content">
            <button class="popup-close" onclick="closePopup('popup4')">X</button>
            <h4 class="text-center">SMPN 10 Malang Sabet Juara 3 Lomba Inovasi Teknologi Kota Malang</h4>
            <img class="img1" src="presek.jpeg" alt="Upacara Kemerdekaan Image" />
            <p>INOTEK adalah ajang bergengsi untuk memamerkan karya inovatif dari masyarakat Kota Malang. Tema INOTEK tahun 2024 adalah “Inotek Berkembang untuk Kota Malang Berkelas”. Ajang ini juga menjadi upaya mendorong kemajuan teknologi dan inovasi di Kota Malang. Inotek menjadi platform bagi para innovator, baik pelajar, akademisi, dan masyarakat umum untuk menunjukkan kreativitas dan kemampuan dalam mengembangkan solusi teknologi untuk membawa Kota Malang menjadi lebih baik.<br><br>

                Mengambil tema Bidang Agribisnis dan Energi Baru Terbarukan, SMPN 10 Malang mengirimkan inovasi teknologi yangs elama ini dimanfaatkan di sekolah. Mengusung judul “Water Mas” water treatment untuk masyarakat sekolah, SMPN 10 Malang mengembangkan inovasi yang berkaitan dengan pemanfaatan air sungai menjadi air bersih layak pakai. Inovasi ini dikembangkan mulai dari tahun 2010 dengan memanfaatkan bahan sederhana seperti ijuk, koral, arang, dan pasir sebagai filter atau bahan penyaring. selain menghasilkan air bersih layak pakai, inovasi watermas ini juga dimanfaatkan sebagai wahana promosi sekolah dan media pembelajaran siswa SMPN 10 Malang.</p>
        </div>
    </div>   -->
    <section class="news-section">
        <div class="container">
            <h2 class="section-title">Prestasi Terkini</h2>
    <?php
// Include file koneksi database
include('koneksi.php');
?>
            <!-- Horizontal Layout -->
            <div class="horizontal-container">
                <?php
                // Ambil data prestasi dari database
                $sql = "SELECT * FROM achievements";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Loop melalui hasil query untuk menampilkan setiap card
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="content-card">
                            <div class="image-box">
                                <img src="pages/<?php echo $row['gambar']; ?>" alt="<?php echo $row['title']; ?>" />
                            </div>
                            <div class="text-box">
                                <h4><?php echo $row['title']; ?></h4>
                                <p><?php echo substr($row['description'], 0, 100) . '...'; ?></p><br>
                                <button class="btn-read-more" onclick="showPopup('popup<?php echo $row['id']; ?>')">
                                    <i class="fas fa-book-open me-2"></i>Baca Selengkapnya
                                </button>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>Tidak ada prestasi yang ditemukan.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Popup Modals -->
    <?php
    // Ambil data prestasi dari database dan tampilkan untuk masing-masing popup
    $sql = "SELECT * FROM achievements " ;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <!-- Popup untuk setiap prestasi -->
            <div class="popup-modal" id="popup<?php echo $row['id']; ?>">
                <div class="popup-content">
                    <button class="popup-close text-center" onclick="closePopup('popup<?php echo $row['id']; ?>')">X</button>
                    <h4 class="text-center"><?php echo $row['title']; ?></h4>
                    <!-- <h4 class="text-center">test</h4> -->
                    <img class="img1" src="pages/<?php echo $row['gambar']; ?>" alt="<?php echo $row['title']; ?>">
                    <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p>Tidak ada prestasi yang ditemukan.</p>";
    }
    ?>
    
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        function showPopup(popupId) {
            document.getElementById(popupId).classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closePopup(popupId) {
            document.getElementById(popupId).classList.remove('show');
            document.body.style.overflow = 'auto';
        }
    </script>

    </body>
