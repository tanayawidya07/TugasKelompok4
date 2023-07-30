<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TK4";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan data dari tabel barang
$sql = "SELECT * FROM daftar_barang";
$result = $conn->query($sql);

$data_barang = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data_barang[] = $row;
    }
}

$conn->close();

// Mengirimkan data sebagai respons HTTP dalam format JSON
header('Content-Type: application/json');
echo json_encode($data_barang);
?>
