<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>Proyecto BAE</title>
		
	</head>
	<body background="imagenes/fondo.png" style="background-attachment: fixed">
		<!-- formulario Iniciar sesion, ya registrado -->
		<center>
			<div class = "inicio"><h2 style ="color = #0808F8;"><b>Iniciar de sesion</b></h2>
			</div>
		</center>
		<div class = "Ingreso">
			<table border ="0" align = "center" valign="middle">
					<tr>
						<td>
						
						 <!-- formulario registro, si el usuario está creado -->
						<form action = "validar.php" method= "post">
							<table border = "0">
					</tr>
								<tr>
									<td><label style ="font-size: 12pt; color:#146CF9"><b>Cuenta:</b></label></td>
									<td width=80><input class = "form-group has-success" required style ="border-radius: 15px;" type = "text" name="nombreCuenta"></td>
								</tr>
									<br/>
								<tr>
									<td><label style = "font-size: 12pt; color:#146CF9"><b>Contraseña:</b></label></td>
									<td width=80><input style ="border-radius: 15px;"  type = "password" name = "contraseñaCuenta"></td>
								</tr>
								<tr>
									<td width=80 align="center"><input class ="btn btn-primary" type = "submit" value="Entrar"></td>
								</tr>
							</table>
						</form>
						<br/><br/><br/>
						
					 <!-- formulario registro, si el usuario no está creado -->
					<form method="post" action="registrar.php">
							<legend style ="font-size: 18pt;"><b>Registrarse</b></legend>
							<div class = "form-group">
								<label style = "font-size: 12pt; color:#FE2E2E;"><b>Ingresa el nombre de la cuenta</b></label>
								<input type="text" name = "nombreUsuario" class ="form-control" required placeholder="Máximo 20 caracteres."/>
							</div>
							<div class = "form-group">
								<label style = "font-size: 12pt; color:#FE2E2E;"><b>Nombre del personaje</b></label>
								<input type="text" name = "nombrePersonaje" class ="form-control" required placeholder="Máximo 10 caracteres."/>
							</div>
							<div class = "form-group">
								<label style = "font-size: 12pt; color:#FE2E2E;"><b>Contraseña de la cuenta</b></label>
								<input type="password" name = "contraseñaUsuario" class ="form-control" required placeholder="Máximo 10 caracteres."/>
							</div>
							<div class = "form-group">
								<label style = "font-size: 12pt; color:#FE2E2E;"><b>Repita la contraseña</b></label>
								<input type="password" name = "RcontraseñaUsuario" class ="form-control" required placeholder="Repetir la contraseña."/>
							</div>
							
							<input class ="btn btn-danger" type ="submit" name = "Registrarse" value= "Registrarse"/>
					</form>
			</table>
		</div>
    <section id="footer">
		<br/>
        <div class="container" style="float:left" >
    		<center style="color:#fff;">
    		    <div class="col-md-4 contact-email">
					<legend style ="font-size: 18pt; color:#fff;"><b>Contacto</b></legend>
    		        <h5><a href="index.php">smlsntgprz@gmail.com</a></h5>
    		         <h5>© Copyright Samuel Santiago</h5>
    		    </div><!--end .col-md-4 .contact-email-->
    		</center>
    	</div><!--end .container-->
    </section><!--end #footer-->
	</body>
</html>