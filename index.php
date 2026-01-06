<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Activities Grid</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .navbar {
    background-color: #00712D;
}

.navbar .nav-link:hover, .navbar .nav-link.active {
    color: #fff !important; 
    border-bottom: 3px solid #fdd835;
}

.navbar .nav-link.active {
    color: #fdd835 !important; 
    border-bottom: 3px solid #fdd835;
}

/* Updated dropdown styles */
.dropdown-menu {
    transform: translateX(-20%); /* Move dropdown slightly left */
    min-width: 200px; /* Set minimum width */
    border: none;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    border-radius: 8px;
    margin-top: 8px;
}

.dropdown-item {
    padding: 10px 20px;
    text-align: center !important;
}

.dropdown-menu .dropdown-item:hover {
    background-color: #fdd835; 
    color: #000 !important; 
}

/* Additional positioning for specific dropdowns if needed */
#profilDropdown + .dropdown-menu,
#kesiswaanDropdown + .dropdown-menu,
#galeriDropdown + .dropdown-menu {
    left: 50%;
    transform: translateX(-50%); /* Center the dropdown under its parent */
}

.footer a:hover {
    color: #fdd835;
    text-decoration: underline;
}

.btn-success:hover {
    background-color: #005923; 
    color: white;
}

/* Add responsiveness */
@media (max-width: 991.98px) {
    .dropdown-menu {
        transform: none;
        margin-top: 0;
        border: none;
        background-color: transparent;
        box-shadow: none;
    }
    
    .dropdown-item {
        color: white !important;
    }
    
    .dropdown-item:hover {
        background-color: transparent;
    }
}

    </style>
</head>
<body>
<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'mandiri';
$pageFile = __DIR__ . "/pages/{$page}.php";

// Cek apakah halaman adalah login 
$noHeaderFooter = in_array($page, ['loginn', 'subkegsek', 'submpls', 'subguru', 'subfasilitas', 'subprestasi', 'subkunjungan']);

if (!$noHeaderFooter) {
    include "menu.php"; // Tampilkan header kecuali di login 
}

if (file_exists($pageFile)) {
    include $pageFile;
} else {
    echo "<h2>Halaman tidak ditemukan!</h2>";
}

if (!$noHeaderFooter) {
    include "footer.php"; // Tampilkan footer kecuali di login 
}
?>
</body>
</html>