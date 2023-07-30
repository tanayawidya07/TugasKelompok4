<?php
class Penjualan {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    // Fungsi untuk mengambil semua data penjualan
    public function ambilSemuaPenjualan() {
        $query = "SELECT * FROM Penjualan";
        $result = $this->koneksi->query($query);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    // Fungsi untuk menambah data penjualan
    public function tambahPenjualan($idPenjualan, $jumlahPenjualan, $hargaJual, $idBarang) {
        $query = "INSERT INTO Penjualan (IdPenjualan, JumlahPenjualan, HargaJual, IdBarang) VALUES ('$idPenjualan', $jumlahPenjualan, $hargaJual, '$idBarang')";
        $this->koneksi->query($query);
    }

    // Fungsi untuk mengupdate data penjualan
    public function updatePenjualan($idPenjualan, $jumlahPenjualan, $hargaJual, $idBarang) {
        $query = "UPDATE Penjualan SET JumlahPenjualan = $jumlahPenjualan, HargaJual = $hargaJual, IdBarang = '$idBarang' WHERE IdPenjualan = '$idPenjualan'";
        $this->koneksi->query($query);
    }

    // Fungsi untuk menghapus data penjualan
    public function hapusPenjualan($idPenjualan) {
        $query = "DELETE FROM Penjualan WHERE IdPenjualan = '$idPenjualan'";
        $this->koneksi->query($query);
    }
}
?>
