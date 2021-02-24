<?php 

$conn = mysqli_connect("localhost", "root", "", "auditbaru");


function query($query){
	global $conn;

	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}

	return $rows;
}


function tambah($data){
	global $conn;

	$Nama = htmlspecialchars($data["Nama"]);
	$AIMS = htmlspecialchars($data["AIMS"]);
	$Jemaat_Lokal = htmlspecialchars($data["JemaatLokal"]);
	$Wilayah_Tugas = htmlspecialchars($data["WilayahTugas"]);
	//upload file
	$file = upload();
	if(!$file ){
		return false;
	}


	$query = "INSERT INTO auditcabang
VALUES
('','$Nama', '$AIMS', '$Jemaat_Lokal', '$Wilayah_Tugas')
";
mysqli_query($conn,$query );

return mysqli_affected_rows($conn);
}


function upload(){
	$namaFile = $_FILES['Uploadfile']['name'];
	$ukuranFile = $_FILES['Uploadfile']['size'];
	$error = $_FILES['Uploadfile']['error'];
	$tmpName = $_FILES['Uploadfile']['tmp_name'];

	
}

function hapus ($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM auditcabang WHERE id = $id") ;
	return mysqli_affected_rows($conn);
}


function ubah($data){
	global $conn;
	$id = $data["id"];
	$Nama = htmlspecialchars($data["Nama"]);
	$AIMS = htmlspecialchars($data["AIMS"]);
	$Jemaat_Lokal = htmlspecialchars($data["JemaatLokal"]);
	$Wilayah_Tugas = htmlspecialchars($data["WilayahTugas"]);


	$query = "UPDATE auditcabang SET
		Nama = '$Nama',
		AIMS = '$AIMS',
		JemaatLokal = '$Jemaat_Lokal',
		WilayahTugas = '$Wilayah_Tugas'
		WHERE id = $id
";
mysqli_query($conn,$query );

return mysqli_affected_rows($conn);
}

function cari($keyword){
	$query = "SELECT * FROM auditcabang WHERE 
	nama LIKE '%$keyword%' OR AIMS LIKE '%$keyword%'
	";
	return query($query);
}

function registrasi($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $result= mysqli_query($conn,"SELECT username FROM user WHERE
                    username = '$username'");
    if (mysqli_fetch_assoc($result) ){
        echo "<script>
              alert ('username sudah terdaftar')
             </script>";
        return false;
    }
    if( $password !== $password2 ) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
           </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password')");
    return mysqli_affected_rows($conn);

}


?>


