<?php
include 'index.php'
?>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>

        body {
            padding-top: 80px;
            font-family: 'montserrat';
        }
        .navbar {
            background-color: #00712D;
        }

        .image-label {
            position: absolute;
            top: 0;
            width: 175px;
            margin-top: 25px;
            background-color: #09bf55a2; 
            color: #333;
            font-weight: bold;
            padding: 5px;
            text-align: right;
        }
        .card {
            position: relative;
            overflow: hidden;
        }

        .footer {
            background-color: #00712D; 
            color: white;
            padding: 20px;
            margin: 0px;

        }
        .footer a {
            color: white;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }

        .copyright {
            background-color: black;
            color: white;
            padding: 10px 0;
            margin: 0px;
        }
    </style>
</head>
<body>


    <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            
            <!-- kegiatan sekolah -->
            <div class="col">
                <div class="card h-97">
                    <div class="image-label">Kegiatan</div>
                    <img src="10.jpg" class="card-img-top" alt="Kegiatan">
                </div>
            </div>
            
            <!-- MPLS -->
            <div class="col">
                <div class="card h-97">
                    <div class="image-label">MPLS</div>
                    <img src="mp.png" class="card-img-top" alt="MPLS">
                </div>
            </div>

            <!-- Guru -->
            <div class="col">
                <div class="card h-97">
                    <div class="image-label">Guru</div>
                    <img src="guru.jpg" class="card-img-top" alt="Guru" style="width: 390px;">
                </div>
            </div>
            
            <!-- fasilitas -->
            <div class="col">
                <div class="card h-97">
                    <div class="image-label">Fasilitas Sekolah</div>
                    <img src="fli.png" class="card-img-top" alt="Fasilitas Sekolah">
                </div>
            </div>
            
            <!-- perpisahan-->
            <div class="col">
                <div class="card h-97">
                    <div class="image-label">Perpisahan</div>
                    <img src="perpi.png" class="card-img-top" alt="Perpustakaan">
                </div>
            </div>
            
            <!-- kunjuangan -->
            <div class="col">
                <div class="card h-97">
                    <div class="image-label">Kunjungan</div>
                    <img src="kunju.png" class="card-img-top" alt="Kunjungan">
                </div>
            </div>
            
        </div>
    </div>

    <?php
    include 'footer.php'
    ?>
        <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>