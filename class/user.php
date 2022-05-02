<?php
	class user
	{
		private $username;
		private $password;

		/* Properties */
		private $conn;

		/* Get database access */
		public function __construct(\PDO $database) {
			$this->conn = $database;
		}

		function setUsername($username)
		{
			$this->username = $username;
		}
		function setPassword($password)
		{
			$this->password = $password;
		}

		function Authentication()
		{
			try {
				$query = "SELECT * FROM pegawai where username=? AND password=?";
				$prepareDB = $this->conn->prepare($query);
				$prepareDB->execute([$this->username, $this->password]);
				$checkUserExist = $prepareDB->fetchAll();
				if(count($checkUserExist) > 0){
					return $checkUserExist;
				} else {
					return false;
				}
			} catch (Exception $e) {
				throw $e;
			}
		}

		public static function cekLogin()
		{
			$logged_in = false;
			//jika session username belum dibuat, atau session username kosong
			if (!isset($_SESSION) || empty($_SESSION)) {
				//redirect ke halaman login
				header("Location:../index.php");
			} else {
				$logged_in = true;
			}
		}

	}

?>