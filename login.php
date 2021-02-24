<?php 
session_start();
if (isset($_SESSION["login"])) {
	header("location: index.php");
}
require 'functions.php';
if(isset($_POST["login"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$result=mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

	if (mysqli_num_rows($result)==1) {
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])){

			$_SESSION["login"] = true;
			if (isset($_POST['remember'])) {
				setcookie('login','true',time()+60);
			}
			header("location:index.php");
			exit;
		}
	}
	$error = true;
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	
</head>
<body style="background-color:#E5FDF6">
<h1 style="color:blue; font-size: :bold; text-align: center;">Halaman Login</h1> <br><br><br><br>

<?php 
if (isset($error)) :?>
	<p style="color: red; font-style: italic; text-align: center">username / password salah</p>
<?php endif; ?>
<form action="" method="post">
	<ul>
		<li style="text-align: center;">
			<label for="username">Username :</label>
			<input type="text" name="username" id="username">
		</li>
		<li style="text-align: center;">
			<label for="password">Password :</label>
			<input type="text" name="password" id="password">
		</li>
		<li style="text-align: center;">
			
			<input type="checkbox" name="remember" id="remember">
			<label for="remember">Remember me</label>
		</li>
		<li style="text-align: center; 
">
			<button style=" background-color:#158DA1" type="submit" name="login">Login</button>
		</li>
	</ul>

</form>
</body>
</html>