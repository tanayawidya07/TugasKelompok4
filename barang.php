<?php
class Barang {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    // Fungsi untuk mengambil semua data barang
    public function ambilSemuaBarang() {
        $query = "SELECT * FROM Barang";
        $result = $this->koneksi->query($query);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    // Fungsi untuk menambah data barang
    public function tambahBarang($idBarang, $namaBarang, $harga, $jumlahStok) {
        $query = "INSERT INTO Barang (IdBarang, NamaBarang, Harga, JumlahStok) VALUES ('$idBarang', '$namaBarang', $harga, $jumlahStok)";
        $this->koneksi->query($query);
    }

    // Fungsi untuk mengupdate data barang
    public function updateBarang($idBarang, $namaBarang, $harga, $jumlahStok) {
        $query = "UPDATE Barang SET NamaBarang = '$namaBarang', Harga = $harga, JumlahStok = $jumlahStok WHERE IdBarang = '$idBarang'";
        $this->koneksi->query($query);
    }

    // Fungsi untuk menghapus data barang
    public function hapusBarang($idBarang) {
        $query = "DELETE FROM Barang WHERE IdBarang = '$idBarang'";
        $this->koneksi->query($query);
    }
}
?>
