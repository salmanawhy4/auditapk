<?php 
session_start();
if (!isset($_SESSION["login"])) {
	header("location: login.php");
	exit;
}
require 'functions.php';
$auditcabang = query("SELECT * FROM auditcabang ");

if(isset($_POST["cari"])){
	$auditcabang = cari($_POST["keyword"]);
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body style="background-color:#E5FDF6">
	<a href="logout.php">Logout</a>
<h1 style="color:blue; font-size: :bold; text-align: center;">Data Auditor Daerah</h1>
<table >
	<a href="tambah.php">+ Tambah Data</a><br><br><br>
<form action="" method="post">
	<input type="text" name="keyword" size="30" autofocus placeholder="Masukkan pencarian.." autocomplete="off">
	<button type="submit" name="cari">cari</button>
</form>

</table><br>
<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>AIMS</th>
		<th>Jemaat Lokal</th>
		<th>Wilayah Tugas</th>
		<th>#</th>
	</tr>
	<?php  $i = 1; ?>
	<?php 
	foreach ($auditcabang as $row ) :
	 ?>
<tr>
	<td><?= $i; ?></td>
	<td><?= $row ["Nama"]; ?></td>
	<td><?= $row ["AIMS"]; ?></td>
	<td><?= $row ["JemaatLokal"]; ?></td>
	<td><?= $row ["WilayahTugas"]; ?></td>
	<td><a href="ubah.php?id=<?= $row ["id"];?>">ubah</a>
		<a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?');">hapus</a>
	</td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</table>
</body>
</html>