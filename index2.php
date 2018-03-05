<!DOCTYPE html>

	<?php
	session_start();
	if (@!$_SESSION['usuario']) {
		echo "<script>location.href='index.php'</script>";
	}
	if (@!$_SESSION['pass']) {
		echo "<script>location.href='index.php'</script>";
	}
	
	?>

<html>
	<head>
	
	<link rel="stylesheet" type="text/css" href="css/index2.css">
    <meta charset="utf-8">
    <title>Proyecto BAE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Samuel Santiago">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>


    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

<body background="imagenes/fondotot.jpg" style="background-attachment: fixed">

	<div class="container">
		<ul style ="border-radius: 15px;">
			<li><a href = "index2.php" style="text-decoration:none;">Inicio</a></li>
			<li><a href = "borrarCuenta.php" style="text-decoration:none;">Borrar Cuenta</a></li>
			<li><a style="text-decoration:none;">Usted se ha identificado como: <strong><?php echo $_SESSION['usuario'];?></strong></a></li>
			<li><a style="text-decoration:none;">Nº de Usuarios<strong>
				<?php 
					require("basedatos.php");
					$conectarse = mysqli_connect($host, $nombreBaseDatos , $contraseñaBaseDatos, $basedeDatos);
					$SeleccionarTotal = "SELECT count(*) as total FROM cuenta";
					$consultarTotal = mysqli_query($conectarse, $SeleccionarTotal);
					$TotalUsuarios = mysqli_fetch_assoc($consultarTotal);
					printf ("%s Usuarios", $TotalUsuarios["total"]);
					
				?>
				</strong></a></li>
			
			<li style="float:right"><a class = "resaltar" href = "desconectar.php" style="text-decoration:none;">Cerrar sesion</a></li>
		</ul>
	</div><!-- /container -->
	
	<div>
			
					
			<!--///////////////////////////////////////////////////Empieza cuerpo del documento interno////////////////////////////////////////////-->
				
				
				<div class = "info" align = "center" >
					<h2><font face="impact" size=6 >Informacion del mundo de SOTAD</font></h2>
				</div>
				
				<div class="container">
						<hr class="soft"/>
						<div class = "tablaJ" align = "center" >
							<h4>Tabla de los mejores Jugadores</h4>
						</div>
					<div class="row-fluid" >

							<?php 
								require("basedatos.php");
								$conectarse = mysqli_connect($host, $nombreBaseDatos , $contraseñaBaseDatos, $basedeDatos);
								$consultarPersonajes = ("SELECT * FROM personajes 
															WHERE PuntosPersonaje > (SELECT avg(PuntosPersonaje) FROM personajes)
															order by PuntosPersonaje DESC");
					
								//la variable  $conectarse viene de registrar.php que lo traigo con el require("basedatos.php");
								$consultarTablaPersonajes = mysqli_query($conectarse, $consultarPersonajes);
								
								//Titulo de las columnas
								echo "<center><table border='2'; class='table table-hover';>";
									echo "<tr class = 'warning'>";
										echo "<td><center>NombrePersonaje</center></td>";
										echo "<td><center>NivelPersonaje</center></td>";
										echo "<td><center>PuntosPersonaje</center></td>";
										echo "<td><center>FechaPuntuacion</center></td>";
									echo "</tr>";						

									//bucle para recorrer todas la informaciones de las filas de la BD
								 while($tablaInfo = mysqli_fetch_array($consultarTablaPersonajes)){
									echo "<tr class='success'>";
										echo "<td><center>$tablaInfo[0]<center></td>";
										echo "<td><center>$tablaInfo[1]<center></td>";
										echo "<td><center>$tablaInfo[2]<center></td>";
										echo "<td><center>$tablaInfo[5]<center></td>";
									echo "</tr>";
								}

								echo "</table></center>";
							?>
							
					</div>	
					<br/>		
				</div>
				
		<!--Imagenes del videoJuego;-->
		<div class="container">
			<div id="misImagenes" class="carousel slide homCar">
				<div class="carousel-inner" style="border-top:18px solid #222; border-bottom:1px solid #222; border-radius:4px;">
					<div class="item active">
					<img src="imagenes/imagen1.png" alt="#" style="min-height:250px; min-width:100%"/>
					<div class="carousel-caption">
						  <h4>Competición Básica</h4>
						<p>
						  Sorprende con tu record y saldrás el primero de todos si eres el mejor.
						</p>
					</div>
				  </div>
				  <div class="item">
					<img src="imagenes/imagen2.jpg" alt="#" style="min-height:250px; min-width:100%"/>
					<div class="carousel-caption">
						  <h4>Dificultad</h4>
						  <p>
							Cada nivel es una nueva aventura. ¿Podrás superar la aventura?
						  </p>
					</div>
				  </div>
				  <div class="item">
					<img src="imagenes/imagen3.png" alt="#" style="min-height:250px; min-width:100%"/>
					<div class="carousel-caption">
						  <h4>Preguntas</h4>
						<p>
							¿Lo sabes todo del juego?. Pues participa en el concurso mensual de preguntas y gana un Item legendario.
						</p>
					</div>
				  </div>
				</div>
				<a class="left carousel-control" href="#misImagenes" data-slide="prev">‹</a>
				<a class="right carousel-control" href="#misImagenes" data-slide="next">›</a>
			</div>
		</div>
		
		<hr/> <!--Tres columnas con el que tiene más puntuación, con los datos de la cuenta y la ultima puntuacion;-->
		
		<h3 align = "center">Informacion Global</h3>
		<br/>
		
		<div class="container">
			<div class="row">
				<div class="span4">
					<div class="thumbnail">
						<h3 style="text-align:center;">Puntuación Mínima</h3>	
						<div class="caption">	
							<p align="justify">
							<?php
								//IMPORTANTE - crear una consulta que me devuelva la fila con menor puntuacion
								$peorPuntuacion = "SELECT * FROM personajes
													WHERE PuntosPersonaje = (SELECT min(PuntosPersonaje) from personajes)";
								$consultarPuntuacion = mysqli_query($conectarse, $peorPuntuacion);
								if($FilaPuntuacionMin = mysqli_fetch_assoc($consultarPuntuacion)){
								printf ("Nombre del Personaje: %s <br/> 
										Nivel del Personaje %s <br/>
										Puntuacion del Personaje %s <br/>", 
														$FilaPuntuacionMin["NombrePersonaje"],
														$FilaPuntuacionMin["NivelPersonaje"],
														$FilaPuntuacionMin["PuntosPersonaje"]);

								}
							?>
							</p>
						</div>
					</div>
				</div>

				<div class="span4">
					<div class="thumbnail">
						<h3 style="text-align:center;">Mi Perfil</h3>	
						<div class="caption">	
						<p align="justify">
							<?php
							//IMPORTANTE - crear un formulario que permita el cambio de contraseña O el cambio de nombre de la cuenta
								$nombre = $_SESSION['usuario'];
								$consultarNombreCuenta = "SELECT * FROM cuenta WHERE NombreCuenta = '$nombre'";
								$consultarDatos = mysqli_query($conectarse, $consultarNombreCuenta);
								
								//De la tabla cuenta coger todos los campos
								if($ConsultarDatosCuenta = mysqli_fetch_array($consultarDatos)){
											echo "Nombre de la cuenta: $ConsultarDatosCuenta[0]<br/>";
											echo "Contraseña de la Cuenta: $ConsultarDatosCuenta[1]<br/>";
											echo "Nombre del Personaje: $ConsultarDatosCuenta[2]<br/>";
											
											//De la tabla personajes solo los puntos y la fecha
											$consultarNombrePersonaje = "SELECT * FROM personajes WHERE NombrePersonaje = '$ConsultarDatosCuenta[2]'";
											$consultarDatosPersonaje = mysqli_query($conectarse, $consultarNombrePersonaje);
											if($ConsultarPuntos = mysqli_fetch_array($consultarDatosPersonaje)){
												echo "Puntos del Personaje: $ConsultarPuntos[2]<br/>";
												echo "Fecha de la Puntuacion:<br/> $ConsultarPuntos[5]<br/>";
											}
								}
							?>
							<br/>
								<!-- Botón que activa el formulario de edicion: modal -->
								<center><button style="align:center" type="button" class="btn btn-primary" data-toggle="modal" data-target="#formularioModal">
								  Cambiar datos personales
								</button></center>

								<!-- formulario: Modal -->
								<div class="modal fade" id="formularioModal" tabindex="-1" role="dialog" aria-labelledby="formulario" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									
										<!-- cabecera Modal -->
										 <div class="modal-header">
											<h5 class="modal-title" id="formulario" style ="font-size: 12pt; text-align:center"><b>Datos de la cuenta</b></h5>
										 </div>
										  
										<!-- Contenido del modal -->
										<div class="modal-body">
										 
											<!-- Formulario del modal para cambiar los datos-->
											<form action = "editar.php" method= "post">
												<table border = "0">
													<?php
														$nombre = $_SESSION['usuario'];
														$consultarNombreCuenta = "SELECT * FROM cuenta WHERE NombreCuenta = '$nombre'";
														$consultarDatos = mysqli_query($conectarse, $consultarNombreCuenta);
														
														//fila de datos donde $nombre coincida
														while($ConsultarDatosCuenta = mysqli_fetch_array($consultarDatos)){
																echo "Nombre de la cuenta (actual):    $ConsultarDatosCuenta[0]<br/>";
																echo "Contraseña de la Cuenta (actual):    $ConsultarDatosCuenta[1]<br/>";
														}
													?>
													<br/>
													<legend style ="font-size: 12pt; text-align:center"><b>Cambiar datos personales</b></legend>
													<tr>
														<td><label style ="font-size: 12pt; color:#146CF9"><b>Nombre Cuenta (nuevo):</b></label></td>
														<td width=80><input class = "form-group has-success" style ="border-radius: 15px;" type = "text" name="editarNombreCuenta" placeholder="Máximo 20 caracteres."></td>
													</tr>
													<br>
													<tr>
														<td><label style = "font-size: 12pt; color:#146CF9"><b>Contraseña (nueva):</b></label></td>
														<td width=80><input style ="border-radius: 15px;"  type = "password" name = "editarContraseña" placeholder="Máximo 10 caracteres."></td>
													</tr>
												</table>	
												<br/>
												<p>Si pulsas <strong>"Enviar datos"</strong>, te permitirá cambiar siempre que quieras la contraseña y el nombre de tu cuenta.</p>
												<p>Ten encuenta que una vez cambiada la contraseña o el nombre de la cuenta, <strong>tendrás que iniciar sesion de nuevo</strong>, recuérdalo bien.</p>
												<p>Debes tener en cuenta <strong>tus datos actuales</strong>, los <strong>datos nuevos no</strong> pueden ser equivalentes a los actuales</p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Omitir</button>
													<input class ="btn btn-success" type = "submit" value="Enviar datos">
												</div>
											</form>
									</div>
								  </div>
								</div>
						</p>
						</div>
					</div>
				</div>
				<div class="span4">
					<div class="thumbnail">
						<h3 style="text-align:center;">Curiosidades</h3>	
						<div class="caption">	
						<p align="justify">
								Descubre que monstruos te esperan por conocer en las mazmorras mas oscuras o quizás ya los hayas conocido
								informaciones de todos los monstruos que te puedes encontrar en las mazmorras del juego.
								<br/>
								<center><button class ="btn btn-primary" type="button" value="enviar" onclick = "location='monstruos.php'">¡Vamos!</button></center>

						</p>
						</div>
					</div>
				</div>
			</div>
		</div><!--Final de las 3 columnas -->
		<br/>
		<div id="footer">
			<div style="float:left" >
				<center style="color:#fff;">
					<div class="col-md-4 contact-email">
						<legend style ="font-size: 18pt; color:#fff;"><b>Contacto</b></legend>
						<h5><a href="index.php">smlsntgprz@gmail.com</a></h5>
						 <h5>© Copyright Samuel Santiago</h5>
					</div><!--end .col-md-4 .contact-email-->
				</center>
			</div><!--end float:left-->
		</div><!--end #footer-->
	</div>
  </body>
</html>