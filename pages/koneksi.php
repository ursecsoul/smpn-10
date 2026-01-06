<?php
$host = "localhost"; // Ganti sesuai konfigurasi server Anda
$user = "root"; // Ganti dengan username database Anda
$pass = ""; // Ganti dengan password database Anda
$db   = "sekola_db"; // Ganti dengan nama database Anda

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>