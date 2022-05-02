<?php
	class pengambilan
	{
		private $id_pengambilan;
		private $nama_pengambil;
		private $id_produksi;
		private $id_barang;
		private $jumlah_pengambilan;

		/* Properties */
		private $conn;

		/* Get database access */
		public function __construct(\PDO $database) {
			$this->conn = $database;
		}

		function setId_Pengambilan ($id_pengambilan)
		{
			$this->id_pengambilan = $id_pengambilan;
		}
		function setNama_Pengambil ($nama_pengambil)
		{
			$this->nama_pengambil = $nama_pengambil;
		}
		function setId_Produksi ($id_produksi)
		{
			$this->id_produksi = $id_produksi;
		}
		function setId_Barang ($id_barang)
		{
			$this->id_barang = $id_barang;
		}
		function setjumlah_pengambilan ($jumlah_pengambilan)
		{
			$this->jumlah_pengambilan = $jumlah_pengambilan;
		}
		function getId_Pengambilan ()
		{
			return $id_pengambilan;
		}
		function getNama_Pengambil ()
		{
			return $nama_pengambil;
		}
		function getId_Produksi ()
		{
			return $id_produksi;
		}
		function getId_Barang ()
		{
			return $id_barang;
		}
		function getjumlah_pengambilan ()
		{
			return $jumlah_pengambilan;
		}
		function AddAmbil_Barang ()
		{
			try {
				$query = "INSERT INTO pengambilan (id_pengambilan, nama_pengambil, id_barang, jumlah_pengambilan) VALUES (?, ?, ?, ?)";
				$prepareDB = $this->conn->prepare($query);
				$sqlAddBarang = $prepareDB->execute([$this->id_pengambilan, $this->nama_pengambil, $this->id_barang, $this->jumlah_pengambilan]);

				return $sqlAddBarang;
			} catch (Exception $e) {
				throw $e;
			}
		}
		function AmbilBarangList ()
		{
			$query = "SELECT pengambilan.nama_pengambil, barang.nama_barang, pengambilan.jumlah_pengambilan FROM pengambilan JOIN barang ON pengambilan.id_barang = barang.id_barang";
			$prepareDB = $this->conn->prepare($query);
			$prepareDB->execute();
			$barangList = $prepareDB->fetchAll();

			return $barangList;
		}
	}
?>