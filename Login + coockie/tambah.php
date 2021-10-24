 <?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
require 'functions.php';

if(isset($_POST["submit"]) ) {



	if (tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil ditambahkan');
				document.location.href = 'index.php';
			</script>
		";

	} else{
		echo "
			<script>
				alert('Data gagal ditambahkan');
				document.location.href = 'index.php';
			</script>
		";
	}
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<title>Tambah data siswa</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<img src="img/asset/telkom.png" width="120">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tambah.php">Tambah siswa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      
    </ul>
  </div>
</nav>
<?php //enctype="multipart/form-data"; untuk mengelola file?>

	<form action="" method="post" enctype="multipart/form-data" >
		<ul>
			<li>
				<label for ="Nama">Nama : </label>
				<input type="text" name="Nama" id="Nama" required autocomplete="off" class="form-control">
			</li>
			<li>
				<label for ="Sekolah">Sekolah : </label>
				<input type="text" name="Sekolah" id="Sekolah" required autocomplete="off" class="form-control">
			</li>
			<li>
				<label for ="Kota">Kota : </label>
				<input type="text" name="Kota" id="Kota" required 
				autocomplete="off" class="form-control">
			</li>
			<li>
				<label for ="Kelas">Kelas : </label>
				<input type="text" name="Kelas" id = "Kelas" required 
				autocomplete="off" class="form-control">
			</li>
			<li>
				<label for ="Foto">Foto : </label> <br>
				<input type="file" name="Foto" id = "Foto" required>
			</li>
			<li>

			 <button type="submit" name="submit"  class="btn btn-success">Tambahkan Data</button>

			</li>


		</ul>




	</form>


	<a href="index.php" class="btn btn-danger">Kembali</a>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>