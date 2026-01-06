<?php
$host = "localhost";
$user = "root"; // Default user XAMPP
$password = ""; // Kosongkan jika tidak ada password
$database = "sekola_db"; // Sesuaikan dengan nama database Anda

$koneksi = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>