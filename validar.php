<?php
	session_start(); 
	require("basedatos.php");
	require("index.php");
	$conectarse = mysqli_connect($host, $nombreBaseDatos , $contraseñaBaseDatos, $basedeDatos);
 
 
	/* verificar la conexión */
	if (mysqli_connect_errno()) {
		printf("Conexión fallida: %s<br/>", mysqli_connect_error());
		echo "Intenta registrarte antes de iniciar sesion";
		exit();
	}else {
			$nombre = $_POST['nombreCuenta'];
			$contraseña = $_POST['contraseñaCuenta'];
			
			$consulta = mysqli_query($conectarse,"SELECT * FROM cuenta 
							WHERE NombreCuenta = '$nombre'");
			
			if ((mysqli_num_rows($consulta) > 0)){
			
					/* obtener array de la fila de la consulta*/
					while ($fila = mysqli_fetch_row($consulta)) {
						if(($nombre == $fila[0]) && ($contraseña == $fila[1])) {
							$_SESSION['usuario'] = $fila[0];
							$_SESSION['pass'] = $fila[1];
							echo "<script>location.href='index2.php'</script>";
							
						} else {
							echo '<div class ="col-md-4">
										<div class="alert alert-danger alert-dismissable">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
										<strong>¡Error!</strong> contraseña y usuario no coinciden.
									</div>
								</div>';
						}
						
					}
					
					 /* liberar el conjunto de resultados */
					mysqli_free_result($consulta);
					
				
			}else {
				echo '<div class ="col-md-4">
							<div class="alert alert-warning alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
							<strong>¡Cuidado!</strong> el usuario no existe.
						</div>
				</div>';
			}
	}
?>