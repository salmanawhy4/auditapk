<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("location: login.php");
	exit;
	}
require 'functions.php';

$id = $_GET["id"];

$aud = query("SELECT * FROM auditcabang WHERE id = $id")[0];

if ( isset($_POST["submit"]) ) {
	
	if (ubah($_POST) > 0 ) {
		echo "<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php'
		</script>";
	}else{
		echo "<script>
			alert('data gagal diubah!');
			document.location.href = 'index.php'
		</script>";
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Update data auditor</title>
</head>
<body>
	<h1>Update data auditor daerah</h1>
	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $aud["id"]; ?>">
		<ul>
			<li>
				<label for="Nama">Nama 		:</label>
				<input type="text" name="Nama" id="Nama" required value="<?= $aud ["Nama"]; ?>">
			</li>
			<li>
				<label for="AIMS">AIMS 		:</label>
				<input type="text" name="AIMS" id="AIMS" required value="<?= $aud ["AIMS"]; ?>">>
			</li>
			<li>
				<label for="Jemaat Lokal">Jemaat Lokal 	:</label>
				<input type="text" name="JemaatLokal" id="Jemaat Lokal" required value="<?= $aud ["JemaatLokal"]; ?>">>
			</li>
			<li>
				<label for="Wilayah Tugas">Wilayah Tugas 	:</label>
				<input type="text" name="WilayahTugas" id="Wilayah Tugas" required value="<?= $aud ["WilayahTugas"]; ?>">>
			</li>
			<li>
				<button type="submit" name="submit">Update</button>
			</li>
		</ul>


	</form>

</body>
</html>