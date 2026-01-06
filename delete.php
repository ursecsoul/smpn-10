<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smpn10_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    // Get image file path before deleting record
    $sql = "SELECT gambar FROM kegiatan WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    // Delete the image file
    if($row && file_exists($row['gambar'])) {
        unlink($row['gambar']);
    }
    
    // Delete the record
    $sql = "DELETE FROM kegiatan WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_GET['id']);
    
    if ($stmt->execute()) {
        header("Location: form_kegiatan.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>