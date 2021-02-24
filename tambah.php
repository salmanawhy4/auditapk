<?php
session_start();
if (!isset($_SESSION["login"])) {

	header("location: login.php");
	exit;
	}
require 'functions.php';


if ( isset($_POST["submit"]) ) {
	
	if (tambah($_POST) > 0 ) {
		echo "<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'index.php'
		</script>";
	}else{
		echo "<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'index.php'
		</script>";
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah data auditor</title>
</head>
<body style="background-color:#E5FDF6">
	<h1 style="color:blue; font-size: :bold; text-align: center;">Input data auditor daerah</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li style="text-align: center;">
				<label for="Nama">Nama 		:</label>
				<input type="text" name="Nama" id="Nama">
			</li>
			<li style="text-align: center;">
				<label for="AIMS">AIMS 		:</label>
				<input type="text" name="AIMS" id="AIMS">
			</li>
			<li style="text-align: center;">
				<label for="Jemaat Lokal">Jemaat Lokal 	:</label>
				<input type="text" name="JemaatLokal" id="Jemaat Lokal">
			</li>
			<li style="text-align: center;">
				<label for="Wilayah Tugas">Wilayah Tugas 	:</label>
				<input type="text" name="WilayahTugas" id="Wilayah Tugas">
			</li>
			<li style="text-align: center;">
				<label for="Upload file"> Upload file :</label>
				<input type="file" name = "Uploadfile" >
			</li>
			<li style="text-align: center;" >
				<button style=" background-color:#158DA1" type="submit" name="submit">Simpan</button>
			</li>
			
		</ul>


	</form>

</body>
</html>