<?php 


$conn = mysqli_connect("localhost","root","","demo");


function query($query){
	global $conn;
	
	$result = mysqli_query($conn, $query);
	$rows = []; 
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;

	}
		return $rows;
}


function tambah($data){
	
			global $conn;
				//htmlspecialchars(); aman.. memastikan yang masuk adalah spc char

			$Nama = htmlspecialchars($data["Nama"]);
			$Sekolah = htmlspecialchars($data["Sekolah"]);
			$Kota = htmlspecialchars($data["Kota"]);
			$Kelas = htmlspecialchars($data["Kelas"]);

			//Upload gambar
			$Foto = upload();
			if ( !$Foto ) {
				return false;
			}


					//insert into untuk menambah
			$query = "INSERT INTO list
						VALUES 
						('', '$Nama', '$Sekolah','$Kota','$Kelas','$Foto')
						";
			mysqli_query($conn, $query);


		return mysqli_affected_rows($conn);

}

function upload(){
		$printNama = $_FILES['Foto']['name'];
		$printUkuran=$_FILES['Foto']['size'];
		$printError = $_FILES['Foto']['error'];
		$tmpName = $_FILES['Foto']['tmp_name'];

		//cek upload foto
		if ($printError === 4) {
			echo 	"<script>
						alert('Pilh gambar terlebih dahulu');
					</script>";
			return false;
		}

		//Hanya upload gambar
		//delimiter untuk memecah 

			//ValidExt dari default dev
			//EctFoto dari upload user



		$ValidExt = ['jpg','jpeg','png'];
		$ExtFoto = explode('.', $printNama);
		$ExtFoto = strtolower(end($ExtFoto));

		if ( !in_array($ExtFoto, $ValidExt)) {
			echo 	"<script>
						alert('Tolong upload gambar!');
					</script>";
			return false;
		}

		//jika ukurannya terlalu besar

		if ($printUkuran > 1000000) {
			echo 	"<script>
						alert('ukuran gambar terlalu besar');
					</script>";
			return false;
		}

		//lolos syarat
		//generate nama baru
		$newName = uniqid();
		$newName .='.';
		$newName .= $ExtFoto;


		move_uploaded_file($tmpName, 'img/' . $newName);

		return $newName;


}

function hapus($ID){
	global $conn;
	mysqli_query($conn, "DELETE FROM list WHERE ID = $ID");
	return mysqli_affected_rows($conn);
}

function ubah($data){
		global $conn;
				//htmlspecialchars(); aman.. memastikan yang masuk adalah spc char
			$ID = $data["id"];
			$Nama = htmlspecialchars($data["Nama"]);
			$Sekolah = htmlspecialchars($data["Sekolah"]);
			$Kota = htmlspecialchars($data["Kota"]);
			$Kelas = htmlspecialchars($data["Kelas"]);
			$gambarlama = htmlspecialchars($data["gambarlama"]);

			if ($_FILES['Foto']['error'] ===4) {
				$Foto = $gambarlama;
			}else{
				$Foto = upload();
			}

					//insert into untuk menambah
			$query = "UPDATE list SET
						Nama = '$Nama',
						Sekolah = '$Sekolah',
						Kota = '$Kota',
						Kelas = '$Kelas'
						Foto = '$Foto'
						
						WHERE ID = $ID
						";
			mysqli_query($conn, $query);


		return mysqli_affected_rows($conn);
}



function cari($keyword){
	$query = "SELECT * FROM list

		 WHERE 
		 Nama LIKE '%$keyword%' OR 
		 Sekolah LIKE '%$keyword%' OR
		 Kelas LIKE '%$keyword%' OR
		 Kota LIKE '%$keyword%'

	";

return query($query);



}

function regist($data){

	global $conn;

	$username = strtolower(stripcslashes($data["user"]));
	$password = mysqli_real_escape_string($conn ,$data["password"]);
	$password2 = mysqli_real_escape_string($conn ,$data["password2"]);

	// cek username sudah ada apa belum
	$result = mysqli_query($conn, "SELECT User FROM user WHERE User = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('Username sudah terdaftar!');
			</script>";

		return false;
	}
	//konfirmasi password
	if ($password !== $password2) {
		echo "
			<script>
				alert('Password tidak sesuai!');
			</script>
		";
		return false;
	}

	//enskripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user ke database

	mysqli_query($conn,"INSERT INTO user VALUES('','$username','$password') ");


	return mysqli_affected_rows($conn);
}



 ?>
