<?php
include 'index.php'
?>

<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        /* Container Flex */
        .horizontal-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .content-card {
            width: 45%; /* Membuat card 50% lebar layar, dengan gap antar card */
            margin: 10px;
            margin-left: 30px;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .content-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .image-box img {
            width: 100%;
            height: 100%;
            border-radius: 10px 10px 0 0;
        }

        .text-box {
            padding: 15px;
        }

    /* Popup Effect with Animations */
    .popup-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        justify-content: center;
        align-items: center;
        z-index: 1000; /* Ensures the popup appears above all other content */
        opacity: 0;
        transition: opacity 0.4s ease-in-out;
    }

    .popup-modal.show {
        display: flex;
        opacity: 1;
    }

    .popup-content {
        background-color: #fff;
        padding: 30px;
        border-radius: 20px;
        max-width: 700px;
        width: 100%;
        max-height: 80vh;
        overflow-y: auto;
        transform: scale(0.8);
        transition: transform 0.3s ease-in-out;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .popup-modal.show .popup-content {
        transform: scale(1);
    }

    /* Stylish Close Button */
    .popup-close {
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: #ff4d4d;
        color: white;
        border: none;
        border-radius: 50%;
        padding: 10px;
        cursor: pointer;
        font-size: 15 px;
        transition: background-color 0.3s ease;
    }

    .popup-close:hover {
        background-color: #ff1a1a;
    }

    /* Content inside Popup */
    .popup-content h4 {
        font-size: 24px;
        margin-bottom: 15px;
        color: #333;
        text-align: center;
    }

    .popup-content p {
        line-height: 1.6;
        font-size: 16px;
        color: #555;
    }

    .img1 {
        width: 100%;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .button {
        color: orange;
        border-radius: 20px;
    }

    .yey1 {
        margin-top: 100px;
    }

    </style>
    <script>
    function showPopup(popupId) {
        document.getElementById(popupId).classList.add('show');
    }

    function closePopup(popupId) {
        document.getElementById(popupId).classList.remove('show');
    }
</script>
    
</head>
<body>

<div class="yey1">
<!-- Horizontal Layout -->
<div class="container horizontal-container mt-5">
    <div class="content-card">
        <div class="image-box">
            <img src="TRADISI-JUARA-1-864x1536.png" alt="Tradisi Juara" />
        </div>
        <div class="text-box">
            <h4>Tradisi Juara</h4>
            <p>Salam Sehat! SMPN 10 Malang merupakan salah satu sekolah di Kota Malang yang memiliki segudang prestasi yang membanggakan...</p>
            <div class="button">
            <button class="btn btn-warning" onclick="showPopup('popup1')">Baca Selengkapnya</button>
        </div>
    </div>
    </div>

    <div class="content-card">
        <div class="image-box">
            <img src="pppssss - Copy.jpeg" alt="Upacara Kemerdekaan Image" />
        </div>
        <div class="text-box">
            <h4>Prestasi siswa SMPN 10 Malang</h4>
            <p>Salam Sehat!

                SMPN 10 Malang merupakan salahsatu sekolah di Kota Malang yang memiliki segudang prestasi yang membanggakan. Tidak hanya dalam bidang akademik saja, namun...</p>
            <button class="btn btn-warning" onclick="showPopup('popup2')">Baca Selengkapnya</button>
        </div>
    </div>
</div>

<div class="container horizontal-container mt-5">
    <div class="content-card">
        <div class="image-box">
            <img src="IPA - Copy.jpeg" alt="Tradisi Juara" />
        </div>
        <div class="text-box">
            <h4>Guru IPA SMPNN 10 KOTA MALANG RAIH KALPATARU</h4>
            <p>Adalah IDA WAHYUNI yang tercatat sejak 2005 sebagai ASN guru IPA SMPN 10 Malang, guru berprestasi Juara 1 Kota Malang, sekaligus Guru Penggerak Angkatan 9...</p>
            <button class="btn btn-warning" onclick="showPopup('popup3')">Baca Selengkapnya</button>
        </div>
    </div>
    
    <div class="content-card">
        <div class="image-box">
            <img src="presek.jpeg" alt="Upacara Kemerdekaan Image" />
        </div>
        <div class="text-box">
            <h4>SMPN 10 Malang Sabet Juara 3 Lomba Inovasi Teknologi Kota Malang</h4>
            <p>INOTEK adalah ajang bergengsi untuk memamerkan karya inovatif dari masyarakat Kota Malang. Tema INOTEK tahun 2024 adalah “Inotek Berkembang untuk Kota Malang Berkelas”. Ajang ini juga menjadi...</p>
            <button class="btn btn-warning" onclick="showPopup('popup4')">Baca Selengkapnya</button>
        </div>
    </div>
</div>

    <!-- Popup 1 -->
    <div class="popup-modal" id="popup1">
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
    </div>

    <!-- Popup 2 -->
    <div class="popup-modal" id="popup2">
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
    </div>

    <!-- Popup 3 -->
    <div class="popup-modal" id="popup3">
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
    </div>

    <!-- Popup 4 -->
    <div class="popup-modal" id="popup4">
        <div class="popup-content">
            <button class="popup-close" onclick="closePopup('popup4')">X</button>
            <h4 class="text-center">SMPN 10 Malang Sabet Juara 3 Lomba Inovasi Teknologi Kota Malang</h4>
            <img class="img1" src="presek.jpeg" alt="Upacara Kemerdekaan Image" />
            <p>INOTEK adalah ajang bergengsi untuk memamerkan karya inovatif dari masyarakat Kota Malang. Tema INOTEK tahun 2024 adalah “Inotek Berkembang untuk Kota Malang Berkelas”. Ajang ini juga menjadi upaya mendorong kemajuan teknologi dan inovasi di Kota Malang. Inotek menjadi platform bagi para innovator, baik pelajar, akademisi, dan masyarakat umum untuk menunjukkan kreativitas dan kemampuan dalam mengembangkan solusi teknologi untuk membawa Kota Malang menjadi lebih baik.<br><br>

                Mengambil tema Bidang Agribisnis dan Energi Baru Terbarukan, SMPN 10 Malang mengirimkan inovasi teknologi yangs elama ini dimanfaatkan di sekolah. Mengusung judul “Water Mas” water treatment untuk masyarakat sekolah, SMPN 10 Malang mengembangkan inovasi yang berkaitan dengan pemanfaatan air sungai menjadi air bersih layak pakai. Inovasi ini dikembangkan mulai dari tahun 2010 dengan memanfaatkan bahan sederhana seperti ijuk, koral, arang, dan pasir sebagai filter atau bahan penyaring. selain menghasilkan air bersih layak pakai, inovasi watermas ini juga dimanfaatkan sebagai wahana promosi sekolah dan media pembelajaran siswa SMPN 10 Malang.</p>
        </div>
    </div>
    </div>

<script>
    function showPopup(popupId) {
        document.getElementById(popupId).classList.add('show');
    }

    function closePopup(popupId) {
        document.getElementById(popupId).classList.remove('show');
    }
     
</script>

<?php 
    include 'footer.php'
    ?>  
<script src="bootstrap/js/bootstrap.bundle.min.js"></script> 
</body>
</html>
