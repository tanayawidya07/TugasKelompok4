<?php
require 'koneksi.php';
require 'barang.php';
require 'penjualan.php';
require 'pembelian.php';
require 'controller.php';

// Membuat objek class Barang, Penjualan, dan Pembelian
$barang = new Barang($koneksi);
$penjualan = new Penjualan($koneksi);
$pembelian = new Pembelian($koneksi);

// Membuat objek controller dan memastikan objek Barang, Penjualan, dan Pembelian terinisialisasi
$controller = new Controller($barang, $penjualan, $pembelian);

// Proses permintaan dari form untuk data barang
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tambah'])) {
        $controller->tambahBarang($_POST);
    } elseif (isset($_POST['update'])) {
        $controller->updateBarang($_POST);
    } elseif (isset($_POST['hapus'])) {
        $controller->hapusBarang($_POST['idBarang']);
    }
}

// Proses permintaan dari form untuk data penjualan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tambahPenjualan'])) {
        $controller->tambahPenjualan($_POST);
    }
}

// Proses permintaan dari form untuk data pembelian
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tambahPembelian'])) {
        $controller->tambahPembelian($_POST);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>CRUD Barang, Penjualan, dan Pembelian</title>
</head>

<body>
    <h2>Data Barang</h2>
    <table border="1">
        <tr>
            <th>Id Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah Stok</th>
        </tr>
        <?php
        // Menampilkan data barang dari database
        $dataBarang = $controller->ambilSemuaBarang();
        foreach ($dataBarang as $barang) {
            echo "<tr>";
            echo "<td>" . $barang['IdBarang'] . "</td>";
            echo "<td>" . $barang['NamaBarang'] . "</td>";
            echo "<td>" . $barang['Harga'] . "</td>";
            echo "<td>" . $barang['JumlahStok'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <!-- Form Tambah Barang -->
    <h3>Tambah Barang</h3>
    <form method="POST">
        <input type="text" name="idBarang" placeholder="Id Barang" required>
        <input type="text" name="namaBarang" placeholder="Nama Barang" required>
        <input type="number" name="harga" placeholder="Harga" required>
        <input type="number" name="jumlahStok" placeholder="Jumlah Stok" required>
        <button type="submit" name="tambah">Tambah</button>
    </form>

    <!-- Form Update dan Hapus Barang -->
    <h3>Update dan Hapus Barang</h3>
    <table border="1">
        <tr>
            <th>Update</th>
            <th>Hapus</th>
        </tr>
        <?php
        // Menampilkan data barang dari database dalam form untuk update dan hapus
        foreach ($dataBarang as $barang) {
            echo "<td>
                <form method='POST'>
                    <input type='hidden' name='idBarang' value='" . $barang['IdBarang'] . "'>
                    <input type='text' name='namaBarang' value='" . $barang['NamaBarang'] . "' required>
                    <input type='number' name='harga' value='" . $barang['Harga'] . "' required>
                    <input type='number' name='jumlahStok' value='" . $barang['JumlahStok'] . "' required>
                    <button type='submit' name='update'>Update</button>
                </form>
            </td>";
            echo "<td>
                <form method='POST'>
                    <input type='hidden' name='idBarang' value='" . $barang['IdBarang'] . "'>
                    <button type='submit' name='hapus'>Hapus</button>
                </form>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Data Penjualan</h2>
    <!-- Menampilkan Data Penjualan -->
    <table border="1">
        <tr>
            <th>Id Penjualan</th>
            <th>Jumlah Penjualan</th>
            <th>Harga Jual</th>
            <th>Id Barang</th>
        </tr>
        <?php
        $dataPenjualan = $controller->ambilSemuaPenjualan();
        if (is_array($dataPenjualan) || is_object($dataPenjualan)) {
            foreach ($dataPenjualan as $penjualan) {
                echo "<tr>";
                echo "<td>" . $penjualan['IdPenjualan'] . "</td>";
                echo "<td>" . $penjualan['JumlahPenjualan'] . "</td>";
                echo "<td>" . $penjualan['HargaJual'] . "</td>";
                echo "<td>" . $penjualan['IdBarang'] . "</td>";
                echo "</tr>";
            }
        }
    ?>
     </table>
    <!-- Tambah Data Penjualan -->
    <h3>Tambah Penjualan</h3>
    <form method="POST">
        <input type="text" name="idPenjualan" placeholder="Id Penjualan" required>
        <input type="number" name="jumlahPenjualan" placeholder="Jumlah Penjualan" required>
        <input type="number" name="hargaJual" placeholder="Harga Jual" required>
        <input type="text" name="idBarang" placeholder="Id Barang" required>
        <button type="submit" name="tambahPenjualan">Tambah Penjualan</button>
    </form>
    </table>

    <!-- Form Update dan Hapus Penjaulan -->
    <h3>Update dan Hapus Penjualan</h3>
    <table border="1">
        <tr>
            <th>Update</th>
            <th>Hapus</th>
        </tr>
        <?php
        // Menampilkan data barang dari database dalam form untuk update dan hapus
        foreach ($dataPenjualan as $penjualan) {
            echo "<td>
                <form method='POST'>
                    <input type='text' name='idPenjualan' value='" . $penjualan['IdPenjualan'] . "'>
                    <input type='text' name='jumlahPenjualan' value='" . $penjualan['JumlahPenjualan'] . "' required>
                    <input type='number' name='hargaJual' value='" . $penjualan['HargaJual'] . "' required>
                    <input type='text' name='idBarang' value='" . $penjualan['IdBarang'] . "' required>
                    <button type='submit' name='update'>Update</button>
                </form>
            </td>";
            echo "<td>
                <form method='POST'>
                    <input type='hidden' name='idPenjualan' value='" . $penjualan['IdPenjualan'] . "'>
                    <button type='submit' name='hapus'>Hapus</button>
                </form>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Data Pembelian</h2>
    <!-- Menampilkan Data Pembelian -->
    <table border="1">
        <tr>
            <th>Id Pembelian</th>
            <th>Jumlah Pembelian</th>
            <th>Harga Beli</th>
            <th>Id Barang</th>
        </tr>
        <?php
        $dataPembelian = $controller->ambilSemuaPembelian();
        if (is_array($dataPembelian) || is_object($dataPembelian)) {
            foreach ($dataPembelian as $pembelian) {
                echo "<tr>";
                echo "<td>" . $pembelian['IdPembelian'] . "</td>";
                echo "<td>" . $pembelian['JumlahPembelian'] . "</td>";
                echo "<td>" . $pembelian['HargaBeli'] . "</td>";
                echo "<td>" . $pembelian['IdBarang'] . "</td>";
                echo "</tr>";
            }
        }
    ?>
    <table>

    <!-- Tambah Data Pembelian -->
    <h3>Tambah Pembelian</h3>
    <form method="POST">
        <input type="text" name="idPembelian" placeholder="Id Pembelian" required>
        <input type="number" name="jumlahPembelian" placeholder="Jumlah Pembelian" required>
        <input type="number" name="hargaBeli" placeholder="Harga Beli" required>
        <input type="text" name="idBarang" placeholder="Id Barang" required>
        <button type="submit" name="tambahPembelian">Tambah Pembelian</button>
    </form>

    <!-- Form Update dan Hapus Pembelian -->
    <h3>Update dan Hapus Pembelian</h3>
    <table border="1">
        <tr>
            <th>Update</th>
            <th>Hapus</th>
        </tr>
        <?php
        // Menampilkan data barang dari database dalam form untuk update dan hapus
        foreach ($dataPembelian as $pembelian) {
            echo "<td>
                <form method='POST'>
                    <input type='text' name='idPembelian' value='" . $pembelian['IdPembelian'] . "'>
                    <input type='text' name='jumlahPembelian' value='" . $pembelian['JumlahPembelian'] . "' required>
                    <input type='number' name='hargaBeli' value='" . $pembelian['HargaBeli'] . "' required>
                    <input type='text' name='idBarang' value='" . $pembelian['IdBarang'] . "' required>
                    <button type='submit' name='update'>Update</button>
                </form>
            </td>";
            echo "<td>
                <form method='POST'>
                    <input type='hidden' name='idPembelian' value='" . $pembelian['IdPembelian'] . "'>
                    <button type='submit' name='hapus'>Hapus</button>
                </form>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
<body>
</html>