<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
require'functions.php';

$siswa = query("SELECT * FROM list ");




// if tombol cari ditekan
if (isset($_POST["cari"])) {
	$siswa = cari($_POST["keyword"]);
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman admin</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title></title>
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

<center><h2>DATA SISWA</h2></center>

	<br><br>

<center>
	<form action = ""method="post">	
		<input type="text" name="keyword" size="45" autofocus placeholder="Cari namamu!"
		autocomplete="off">
		<button type="submit" name="cari">Search!</button>
	</form>
</center>

<br>

<table border="1" cellpadding="10" cellspacing="0" table class="table table-hover table-striped">


	<tr>
		<th>No. </th>
		<th>Aksi </th>
		<th>Foto </th>
		<th>Nama </th>
		<th>Sekolah</th>
		<th>Kelas </th>
		<th>Kota Asal </th>

	</tr>
	<?php $i = 1; ?>
<?php foreach( $siswa as $row): ?>

	<tr>
		<td><?php echo $i; ?></td>
		<td>
			<a href="Edit.php?ID=<?php echo $row["ID"]; ?>" class="btn btn-success">Edit</a> |
			<a href="hapus.php?ID= <?php echo $row["ID"]; ?>" class="btn btn-danger">Delete</a>
		</td>
		<td><img src="img/<?php echo $row["Foto"]; ?>" width = "50"></td>
		<td><?php echo $row["Nama"]; ?></td>
		<td><?php echo $row["Sekolah"]; ?></td>
		<td><?php echo $row["Kelas"]; ?></td>
		<td><?php echo $row["Kota"]; ?></td>
		
	</tr>
	<?php $i++; ?>
<?php endforeach ?>

</table>
	
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>