<?php

class pemesanan {

    private $id_pesanan;
    private $nama_pemesan;
    private $id_barang;
    private $jumlah_pesanan;

    /* Properties */
    private $conn;

    /* Get database access */
    public function __construct(\PDO $database) {
        $this->conn = $database;
    }

    function setId_Pesanan($id_pesanan) {
        $this->id_pesanan = $id_pesanan;
    }

    function setNama_Pemesan($nama_pemesan) {
        $this->nama_pemesan = $nama_pemesan;
    }

    function setId_Barang($id_barang) {
        $this->id_barang = $id_barang;
    }

    function setJumlah_Pesanan($jumlah_pesanan) {
        $this->jumlah_pesanan = $jumlah_pesanan;
    }

    function getId_Pesanan() {
        return $id_pesanan;
    }

    function getNama_Pemesan() {
        return $nama_pemesan;
    }

    function getId_Barang() {
        return $id_barang;
    }

    function getJumlah_Pesanan() {
        return $jumlah_pesanan;
    }

    function PesananTambah() {
        try {
            $query = "INSERT INTO pemesanan (id_pesanan, nama_pemesan, id_barang, jumlah_pesanan) VALUES (?, ?, ?, ?)";
            $prepareDB = $this->conn->prepare($query);
            $pesananTambah = $prepareDB->execute([$this->id_pesanan, $this->nama_pemesan, $this->id_barang, $this->jumlah_pesanan]);

            return $pesananTambah;
        } catch (Exception $e) {
            throw $e;
        }
    }

    function PesananList() {
        $query = "SELECT pemesanan.id_pesanan, pemesanan.nama_pemesan, pemesanan.jumlah_pesanan, nama_barang FROM pemesanan JOIN barang USING (id_barang)";
        $prepareDB = $this->conn->prepare($query);
        $prepareDB->execute();
        $pesananList = $prepareDB->fetchAll();

        return $pesananList;
    }

    function PesananEditList() {
        try {
            $query = "UPDATE pemesanan
                SET nama_pemesan = ?,
                    id_barang = ?,
                    jumlah_pesanan = ?
                WHERE id_pesanan = ?";
            $prepareDB = $this->conn->prepare($query);
            $pesananUpdate = $prepareDB->execute([$this->nama_pemesan, $this->id_barang, $this->jumlah_pesanan, $this->id_pesanan]);

            return $pesananUpdate;
        } catch (Exception $e) {
            throw $e;
        }
    }

}

?>