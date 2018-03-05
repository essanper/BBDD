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
	
	<link rel="stylesheet" type="text/css" href="css/monstruos.css">
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

<header>
	<div class="fila" align = "center">
	
	</div>
</header>

	<div class="container">
		<ul style ="border-radius: 15px;">
			<li><a href = "index2.php" style="text-decoration:none;">Inicio</a></li>
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
							<h4>Tabla de todos los monstruos</h4>
						</div>
					<div class="row-fluid" >

							<?php 
								require("basedatos.php");
								$conectarse = mysqli_connect($host, $nombreBaseDatos , $contraseñaBaseDatos, $basedeDatos);
								$consultarPersonajes = "SELECT * FROM monstruos
														ORDER BY NivelMonstruo DESC";
					
								//la variable  $conectarse viene de registrar.php que lo traigo con el require("basedatos.php");
								$consultarTablaPersonajes = mysqli_query($conectarse, $consultarPersonajes);
								
								//Titulo de las columnas
								echo "<center><table border='1'; class='table table-hover';>";
									echo "<tr class = 'warning'>";
										echo "<td><center>NombreMonstruo</center></td>";
										echo "<td><center>NivelMonstruo</center></td>";
										echo "<td><center>PuntosMonstruo</center></td>";
										echo "<td><center>JefeMonstruo</center></td>";
										echo "<td><center>EsJefe</center></td>";
									echo "</tr>";						

									//bucle para recorrer todas la informaciones de las filas de la BD
								 while($tablaInfo = mysqli_fetch_array($consultarTablaPersonajes)){
									echo "<tr class='success'>";
										echo "<td><center>$tablaInfo[0]<center></td>";
										echo "<td><center>$tablaInfo[1]<center></td>";
										echo "<td><center>$tablaInfo[2]<center></td>";
										echo "<td><center>$tablaInfo[3]<center></td>";
										echo "<td><center>$tablaInfo[4]<center></td>";
									echo "</tr>";
								}

								echo "</table></center>";
							?>
							
					</div>	
					<br/>		
				</div>
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