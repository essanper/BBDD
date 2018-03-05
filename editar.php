<?php
	require("basedatos.php");
	require("index2.php");
	$conectarse = mysqli_connect($host, $nombreBaseDatos , $contraseñaBaseDatos, $basedeDatos);
	$nombreAntiguo = $_SESSION['usuario'];
	$contraseñaAntigua = $_SESSION['pass'];
	$nombreNuevo = $_POST['editarNombreCuenta'];
	$contraseñaNueva = $_POST['editarContraseña'];
	
	if (mysqli_connect_errno()){
		echo "Fallo al conectar con la Base de datos.";
		exit();
	}else {
			if(empty($contraseñaNueva) && !empty($nombreNuevo)){
				if($nombreNuevo != $nombreAntiguo){
					if(strlen($nombreNuevo) <= 20){
						$existeNombreCuenta = "SELECT * FROM cuenta 
												WHERE NombreCuenta = '$nombreAntiguo'";
												
						$existenDatos = mysqli_query($conectarse, $existeNombreCuenta);
						
						//fila de datos donde $nombreAntiguo exista
						while($existe = mysqli_fetch_array($existenDatos)){
							if ($existe[0] == $nombreAntiguo){
								$actualizarNombre = "UPDATE cuenta 
														SET NombreCuenta='$nombreNuevo' 
														WHERE NombreCuenta='$nombreAntiguo'";
														
								if (mysqli_query($conectarse, $actualizarNombre)) {
									session_destroy();
									echo "<script>location.href='index.php'</script>";
								
								} else {
									echo '<div class ="col-md-4">
										<div class="alert alert-danger alert-dismissable">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
										<strong>¡Error!</strong> intentalo con otro nombre de cuenta.
									</div>
								</div>';
								}
							}
						}
					}else{
						echo '<div class ="col-md-4">
										<div class="alert alert-warning alert-dismissable">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
										<strong>¡Cuidado!</strong> te has pasado del limite de 20 caracteres..
									</div>
								</div>';
					}
				}else{
					echo '<div class ="col-md-4">
									<div class="alert alert-danger alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>¡OJO!</strong> Ya posees ese nombre de cuenta.
								</div>
							</div>';
				}
			}else if (!empty($contraseñaNueva) && empty($nombreNuevo)){
				if($contraseñaNueva != $contraseñaAntigua){
					if(strlen($contraseñaNueva) <= 10){
						$existeContraseñaCuenta = "SELECT * FROM cuenta 
													WHERE NombreCuenta = '$nombreAntiguo'";
						$existeContraseña = mysqli_query($conectarse, $existeContraseñaCuenta);
						
						//fila de datos donde $nombreAntiguo exista
						while($existe2 = mysqli_fetch_array($existeContraseña)){
							if ($existe2[0] == $nombreAntiguo){
								$actualizarContraseña = "UPDATE cuenta 
														SET PassCuenta ='$contraseñaNueva' 
														WHERE NombreCuenta ='$nombreAntiguo'";
														
								if (mysqli_query($conectarse, $actualizarContraseña )) {
									session_destroy();
									echo "<script>location.href='index.php'</script>";
									
								} else {
									echo '<div class ="col-md-4">
										<div class="alert alert-danger alert-dismissable">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
										<strong>¡Error!</strong> intentalo con otra contraseña de cuenta.
									</div>
								</div>';
								}
							}
						}
					}else{
						echo '<div class ="col-md-4">
									<div class="alert alert-warning alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>¡Cuidado!</strong> te has pasado del limite de 10 caracteres..
								</div>
							</div>';
					}
				}else{
					echo '<div class ="col-md-4">
									<div class="alert alert-danger alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>¡OJO!</strong> Ya posees esa contraseña.
								</div>
							</div>';
				}
			} else if (!empty($contraseñaNueva) && !empty($nombreNuevo)){
				if($contraseñaNueva != $contraseñaAntigua && $nombreAntiguo != $nombreNuevo){
					if(strlen($contraseñaNueva) <= 10 && strlen($nombreNuevo) <= 20){
						$existenAmbos = "SELECT * FROM cuenta 
										WHERE NombreCuenta = '$nombreAntiguo'";
										
						$existeTodo = mysqli_query($conectarse, $existenAmbos);
						while($existe3 = mysqli_fetch_array($existeTodo)){
							if ($existe3[0] == $nombreAntiguo){
								$actualizarContraseña = "UPDATE cuenta 
												SET NombreCuenta='$nombreNuevo', PassCuenta='$contraseñaNueva' 
												WHERE NombreCuenta='$nombreAntiguo'";
														
								if (mysqli_query($conectarse, $actualizarContraseña )) {
									session_destroy();
									echo "<script>location.href='index.php'</script>";
									
								} else {
									echo '<div class ="col-md-4">
										<div class="alert alert-danger alert-dismissable">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
										<strong>¡Error!</strong> intentalo con otra contraseña de cuenta.
									</div>
								</div>';
								}
							}
						}
					
					} else {
						echo '<div class ="col-md-4">
									<div class="alert alert-warning alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
									<strong>¡Cuidado!</strong> te has pasado del limite de caracteres..
								</div>
							</div>';
					}
				}else {
					echo '<div class ="col-md-4">
								<div class="alert alert-danger alert-dismissable">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
								<strong>¡OJO!</strong> Ya posees esos datos.
							</div>
						</div>';
				}
					
			}
	}
?>