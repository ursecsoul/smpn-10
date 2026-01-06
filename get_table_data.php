<?php
// Koneksi database (gunakan konfigurasi yang sama dengan file utama)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smpn10_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Generate table HTML
echo '<table class="table table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>';

$sql = "SELECT * FROM kegiatan ORDER BY tanggal DESC";
$result = $conn->query($sql);
$no = 1;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . htmlspecialchars($row['judul']) . "</td>";
        echo "<td>" . date('d F Y', strtotime($row['tanggal'])) . "</td>";
        echo "<td>
                <a href='edit_kegiatan.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning me-2'>Edit</a>
                <a href='hapus_kegiatan.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin ingin menghapus?\");'>Hapus</a>
            </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4' class='text-center'>Tidak ada data kegiatan</td></tr>";
}

echo '</tbody></table>';

$conn->close();
?>