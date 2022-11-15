<?php 

class Koneksi {
	public $host = 'localhost',
					$username = 'root',
					$pass = '',
					$database = 'pbo';
	public $conn;

	public function __construct() {
		$this->conn = mysqli_connect($this->host,$this->username,$this->pass,$this->database);
	}
    
  public function tampilData($query) {
		$result = mysqli_query($this->conn, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
				$rows[] = $row;
		}
		return $rows;
  }

  public function tambahData($data) {
    $nama = $data["nama"];
    $kelas = $data['kelas'];
    $jurusan = $data['jurusan'];

		$query = "INSERT INTO siswa VALUES('','$nama','$kelas','$jurusan')";
		mysqli_query($this->conn, $query);

		return mysqli_affected_rows($this->conn);
	}

	public function editData($data) {
    
    $id = $data['id'];
		$nama = htmlspecialchars_decode($data['nama']); 
		$kelas = htmlspecialchars_decode($data['kelas']); 
		$jurusan = htmlspecialchars_decode($data['jurusan']); 
		
		$query = "UPDATE siswa SET nama = '$nama', kelas = '$kelas', jurusan = '$jurusan' WHERE id = $id";
		mysqli_query($this->conn, $query);

		return mysqli_affected_rows($this->conn);
	}

  public function hapusData($id) {
		$query = "DELETE FROM siswa WHERE id = $id";
		mysqli_query($this->conn, $query);
	}
	
	public function cariData($keyword)
	{
		$query = "SELECT * FROM siswa WHERE nama LIKE '%$keyword%' OR kelas LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'";
		$result = mysqli_query($this->conn, $query);
		return $result;
	}

}

?>



