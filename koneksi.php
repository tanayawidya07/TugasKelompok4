<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'TK4';

// Membuat objek koneksi database
$koneksi = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}
?>
