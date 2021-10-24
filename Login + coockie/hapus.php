<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
require 'functions.php';

$ID = $_GET["ID"];

	if (hapus($ID) > 0 ) {
		echo "
			<script>
				alert('Data behasil dihapus!');
				document.location.href = 'index.php';
			</script>
		";
	}else {
		echo "
			<script>
				alert('Data behasil dihapus!');
				document.location.href = 'index.php';
			</script>
		";


	}

 ?>