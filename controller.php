<?php
class Controller {
    private $barang;
    private $penjualan;
    private $pembelian;

    public function __construct($barang, $penjualan, $pembelian) {
        $this->barang = $barang;
        $this->penjualan = $penjualan;
        $this->pembelian = $pembelian;
    }

    // Fungsi untuk mengambil semua data barang
    public function ambilSemuaBarang() {
        return $this->barang->ambilSemuaBarang();
    }

    // Fungsi untuk menambah data barang
    public function tambahBarang($data) {
        $idBarang = $data['idBarang'];
        $namaBarang = $data['namaBarang'];
        $harga = $data['harga'];
        $jumlahStok = $data['jumlahStok'];
        $this->barang->tambahBarang($idBarang, $namaBarang, $harga, $jumlahStok);
    }

    // Fungsi untuk mengupdate data barang
    public function updateBarang($data) {
        $idBarang = $data['idBarang'];
        $namaBarang = $data['namaBarang'];
        $harga = $data['harga'];
        $jumlahStok = $data['jumlahStok'];
        $this->barang->updateBarang($idBarang, $namaBarang, $harga, $jumlahStok);
    }

    // Fungsi untuk menghapus data barang
    public function hapusBarang($idBarang) {
        $this->barang->hapusBarang($idBarang);
    }

    // Fungsi untuk mengambil semua data penjualan
    public function ambilSemuaPenjualan() {
        return $this->penjualan->ambilSemuaPenjualan();
    }

    // Fungsi untuk menambah data penjualan
    public function tambahPenjualan($data) {
        $idPenjualan = $data['idPenjualan'];
        $jumlahPenjualan = $data['jumlahPenjualan'];
        $hargaJual = $data['hargaJual'];
        $idBarang = $data['idBarang'];
        $this->penjualan->tambahPenjualan($idPenjualan, $jumlahPenjualan, $hargaJual, $idBarang);
    }

    // Fungsi untuk mengupdate data penjualan
    public function updatePenjualan($data) {
        $idPenjualan = $data['idPenjualan'];
        $jumlahPenjualan = $data['jumlahPenjualan'];
        $hargaJual = $data['hargaJual'];
        $idBarang = $data['idBarang'];
        $this->penjualan->updatePenjualan($idPenjualan, $jumlahPenjualan, $hargaJual, $idBarang);
    }

    // Fungsi untuk menghapus data penjualan
    public function hapusPenjualan($idPenjualan) {
        $this->penjualan->hapusPenjualan($idPenjualan);
    }

    // Fungsi untuk mengambil semua data pembelian
    public function ambilSemuaPembelian() {
        return $this->pembelian->ambilSemuaPembelian();
    }

    // Fungsi untuk menambah data pembelian
    public function tambahPembelian($data) {
        $idPembelian = $data['idPembelian'];
        $jumlahPembelian = $data['jumlahPembelian'];
        $hargaBeli = $data['hargaBeli'];
        $idBarang = $data['idBarang'];
        $this->pembelian->tambahPembelian($idPembelian, $jumlahPembelian, $hargaBeli, $idBarang);
    }

    // Fungsi untuk mengupdate data pembelian
    public function updatePembelian($data) {
        $idPembelian = $data['idPembelian'];
        $jumlahPembelian = $data['jumlahPembelian'];
        $hargaBeli = $data['hargaBeli'];
        $idBarang = $data['idBarang'];
        $this->pembelian->updatePembelian($idPembelian, $jumlahPembelian, $hargaBeli, $idBarang);
    }

    // Fungsi untuk menghapus data pembelian
    public function hapusPembelian($idPembelian) {
        $this->pembelian->hapusPembelian($idPembelian);
    }
}
?>
