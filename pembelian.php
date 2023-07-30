<?php
class Pembelian {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    // Fungsi untuk mengambil semua data pembelian
    public function ambilSemuaPembelian() {
        $query = "SELECT * FROM Pembelian";
        $result = $this->koneksi->query($query);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    // Fungsi untuk menambah data pembelian
    public function tambahPembelian($idPembelian, $jumlahPembelian, $hargaBeli, $idBarang) {
        $query = "INSERT INTO Pembelian (IdPembelian, JumlahPembelian, HargaBeli, IdBarang) VALUES ('$idPembelian', $jumlahPembelian, $hargaBeli, '$idBarang')";
        $this->koneksi->query($query);
    }

    // Fungsi untuk mengupdate data pembelian
    public function updatePembelian($idPembelian, $jumlahPembelian, $hargaBeli, $idBarang) {
        $query = "UPDATE Pembelian SET JumlahPembelian = $jumlahPembelian, HargaBeli = $hargaBeli, IdBarang = '$idBarang' WHERE IdPembelian = '$idPembelian'";
        $this->koneksi->query($query);
    }

    // Fungsi untuk menghapus data pembelian
    public function hapusPembelian($idPembelian) {
        $query = "DELETE FROM Pembelian WHERE IdPembelian = '$idPembelian'";
        $this->koneksi->query($query);
    }
}
?>
