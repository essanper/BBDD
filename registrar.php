<?php
session_start(); 
 require("basedatos.php");
 require("index.php");
 
 $nombre = $_POST['nombreUsuario'];
 $contraseña = $_POST['contraseñaUsuario'];
 $Rcontraseña = $_POST['RcontraseñaUsuario'];
 $nombrePJ = $_POST['nombrePersonaje'];

 //comprobamos que las contraseñas son identicas con: ===
 if ($contraseña === $Rcontraseña){
 
	//nos aseguramos de que los datos ingresados por el usuario cumplen las limitaciones de caracteres.
	if (strlen($nombre) <= 20){
		//strlen — Obtiene la longitud de un string
		
		if (strlen($nombrePJ) <= 10){
			if (strlen($contraseña) <= 10){
			
				//conectarse a la base de datos
				 $conectarse = mysqli_connect($host, $nombreBaseDatos , $contraseñaBaseDatos, $basedeDatos);
				  if (!$conectarse){
					echo "Fallo al conectar con la Base de datos: $basedeDatos.<br/>";
					
					//Gracias al require se crea la base de datos y las tablas
					require("BasedatosYtablas.php");
					
				 }else {	
					 mysqli_select_db($conectarse, $basedeDatos) or die ("No se encuentra la Bade de datos.");
					 mysqli_set_charset($conectarse, "utf8");
					 
						$comprobarnombrePJ = mysqli_query($conectarse, "SELECT * FROM personajes WHERE NombrePersonaje = '$nombrePJ'");
						$comprobarnombre = mysqli_query($conectarse, "SELECT * FROM cuenta WHERE NombreCuenta = '$nombre'");
						
						//comprobar que hayan filas con esos datos
						if ((mysqli_num_rows($comprobarnombrePJ) == 0) && (mysqli_num_rows($comprobarnombre) == 0)){
							$insertarPJ = "INSERT INTO personajes (NombrePersonaje) VALUES ('$nombrePJ')";
							
							if(mysqli_query($conectarse, $insertarPJ)){
								$insertarCuenta = "INSERT INTO cuenta VALUES ('$nombre', '$contraseña', '$nombrePJ')";
								if (mysqli_query($conectarse, $insertarCuenta)){
									echo '<div class ="col-md-4">
												<div class="alert alert-success alert-dismissable">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
												<strong>¡Exito!</strong> se ha guardado el registro.
											</div>
										</div>';
								}
							} 	
						} else {
						echo '<div class ="col-md-4">
								<div class="alert alert-danger alert-dismissable">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
								<strong>¡Error!</strong> al crear el registro.
							</div>
						</div>';
						}
					}
			}else {
					echo '<div class ="col-md-4">
							<div class="alert alert-warning alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
							<strong>¡Ojo!</strong> la contraseña debe tener como <strong>máximo de 10 caracteres.</strong>
						</div>
					</div>';
				}
			}else {
				echo '<div class ="col-md-4">
						<div class="alert alert-warning alert-dismissable">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						<strong>¡Paciencia!</strong> el nombre del personaje debe tener como <strong>máximo de 10 caracteres.</strong>
					</div>
				</div>';
			}
	}else {
		echo '<div class ="col-md-4">
					<div class="alert alert-warning alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
					<strong>¡Atención!</strong> el nombre de la cuenta debe tener como <strong>máximo 20 caracteres.</strong>
				</div>
			</div>';
	}
} else {
	echo '<div class ="col-md-4">
				<div class="alert alert-warning alert-dismissable">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				<strong>¡Cuidado!</strong> las contraseñas deben ser iguales.
			</div>
		</div>';
}