<?php 
require ('db.php');
	if (!empty($_SESSION['idUsuarios'])) {
		header("Location:panel.php");
	}
	

if(isset($_POST['submit'])){

	$email = $_POST['email'];
	$password = $_POST['password'];
	$result = mysqli_query($conn,"SELECT * FROM `usuarios` WHERE email = '$email'");
	$row = mysqli_fetch_assoc($result);

	if (mysqli_num_rows($result)>0) {
		if ($password == $row['password']) {
			$_SESSION['login'] = true;
			$_SESSION['idUsuario'] = $row['idUsuario'];
			header("Location: panel.php");
		}
		else{
			echo"<p>contraseña incorrecta</p>";
		}
	}else{
		echo "<p>No esta registrado</p>";
	}
}







 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Webgenerator Axel Ramirez</title>
</head>
<body>
	<form action="" method="POST">
 		
 		<label for="email">email:</label>
 		<input type="email" name="email" id="email">
 		<br>
 		<label for="password">Password :</label>
 		<input type="text" name="password" id="password">
 		 <button type="submit" name="submit">submit</button>
 
 	</form>
	<br>
	<a href="register.php"><p>ir a register<p></a>
</body>
</html>