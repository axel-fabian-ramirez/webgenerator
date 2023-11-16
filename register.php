<?php 

	require('db.php');

if(isset($_POST['submit'])){

	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$date=date("l jS \of F Y h:i:s A");
	echo "$email";
	echo "$password";
	echo "$password2";
	$duplicate = mysqli_query($conn,"SELECT * FROM `usuarios` WHERE email = '$email'");
	if (mysqli_num_rows($duplicate)>0) {
		echo '<p>existe el email</p>';
	}else{
		if ($password == $password2) {
			$sql="INSERT INTO `usuarios` (`idUsuario`, `email`, `password`, `fechaRegistro`) VALUES (NULL, '$email', '$password', '$date')";
			mysqli_query($conn,$sql);
			echo '<p>Se registro correctamente</p>';
		}else{
			echo '<p>contraseña no coincide</p>';
		}
	}
// 	$sql="INSERT INTO `usuarios` (`idUsuarios`, `email`, `password`, `fechaRegistro`) VALUES (NULL, '$email', '$password', '$date')";
// 	if (mysqli_query($conn,$sql)){ 
// 		echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

		
	
}






 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrarte es simple</title>
</head>
<body>
 	<form action="" method="POST">
 		
 		<label for="email">email:</label>
 		<input type="email" name="email" id="email">
 		<br>
 		<label for="password">Password :</label>
 		<input type="text" name="password" id="password">
 		<br>
 		<labe for="password2"> password2 :</label>
 		<input type="text" name="password2" id="password2">
 		<br>
 		 <button type="submit" name="submit">submit</button>
 
 	</form>
 	<br>
	<a href="login.php"><p>ir a login<p></a>
</body>
</html>