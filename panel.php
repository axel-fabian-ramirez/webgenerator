<?php  
	require('db.php');
	if (!empty($_SESSION['idUsuario'])) {
		$idUsuario = $_SESSION['idUsuario'];
		$result = mysqli_query($conn,"SELECT * FROM `usuarios` WHERE idUsuario = '$idUsuario'");
		$row = mysqli_fetch_assoc($result);
	}
	else{
		header("Location:login.php");
	}

	if(isset($_POST['submit'])){

	$name = $_POST['web'];

	$date=date("l jS \of F Y h:i:s A");
	echo "$name";
	echo "$idUsuario";

	$duplicate = mysqli_query($conn,"SELECT * FROM `webs` WHERE dominio = '$name'");
	if (mysqli_num_rows($duplicate)>0) {

		echo '<p>existe el dominio</p>';
	}else{
			$dominio=$idUsuario.$name;
			$sql="INSERT INTO `webs` (`idWeb`, `idUsuario`, `dominio`, `fechaCreacion`) VALUES (NULL, '$idUsuario', '$dominio', '$date')";
			mysqli_query($conn,$sql);
			
			echo $dominio;
			$retorno = shell_exec("./wix.sh $dominio");
			$retorno = shell_exec("chmod 777 $dominio");

			echo '<p>Se registro el dominio correctamente</p>';
		
	}


		
	
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bienvenido a tu panel</title>
</head>
<body>
<h1>Welcone <?php echo $row['idUsuario']; ?><h1>
<a href="logout.php">logout</a>
  <form method="post">

    <label for="web">Generar Web de:</label>
    <input type="text" name="web" id="web"><br>
    <button type="submit" name="submit">Generar Web</button>
  </form>
  <?php  
    $ssql = "SELECT * FROM `webs` WHERE webs.idUsuario = '$idUsuario'";
    $res = mysqli_query($conn, $ssql);    

    if (mysqli_num_rows($res) > 0) {
        while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {

            echo '<div style="display:flex;gap:10px;">'.'<a href=' . $fila["dominio"] . '>'  . $fila["dominio"] . '</a>'.'<a href=descargar.php?web=' . $fila["dominio"] . '>' . 'descargar' . '</a>'.'<a href=eliminar.php?web=' . $fila["dominio"] . '>' . 'eliminar' . '</a>'.'</div>';
           
        }
    }

    $adminCheckQuery = "SELECT * FROM `usuarios` WHERE usuarios.idUsuario = '$idUsuario' AND usuarios.email ='admin@server.com'";
    $adminCheckResult = mysqli_query($conn, $adminCheckQuery);

    if (mysqli_num_rows($adminCheckResult) > 0) {
        $webs = "SELECT * FROM `webs`";
        $ress = mysqli_query($conn, $webs);
        
        if (mysqli_num_rows($ress) > 0) {
            while ($fila = mysqli_fetch_array($ress, MYSQLI_ASSOC)) {
                echo '<div style="display:flex;gap:10px;">'.'<a href=' . $fila["dominio"] . '>' . $fila["dominio"] .'</a>'.'<a href=descargar.php?web=' . $fila["dominio"] . '>' . 'descargar' . '</a>'.'<a href=eliminar.php?web=' . $fila["dominio"] . '>' . 'eliminar' . '</a>'.'</div>';
              
            }
        }
    }

  ?>
</body>
</html>