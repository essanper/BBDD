<?php
require("basedatos.php");
require("index2.php");
$conectarse = mysqli_connect($host, $nombreBaseDatos , $contraseñaBaseDatos, $basedeDatos);
$nombreCuenta = $_SESSION['usuario'];
$elegirCuenta = "SELECT * FROM Cuenta 
						WHERE NombreCuenta = '$nombreCuenta'";
						
if ($encontrarDatos = mysqli_query($conectarse, $elegirCuenta)){

	while ($fila = mysqli_fetch_assoc($encontrarDatos)) {
		$CuentaN = $fila["NombreCuenta"];
		$passC = $fila["PassCuenta"];
		$nombrePJ = $fila["NombrePersonaje"];
		$borrarCuenta = "DELETE FROM Personajes 
			WHERE NombrePersonaje = '$nombrePJ'";
		$BorrarExito = mysqli_query($conectarse, $borrarCuenta);
			if ($BorrarExito){
			echo '<script language="javascript">
					alert("Éxito al borrar la cuenta personal de la base de datos");
				</script>'; 
				session_destroy();
				echo "<script>location.href='index.php'</script>";
			}
	}

}else{
	echo '<div class ="col-md-4">
		<div class="alert alert-danger alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		<strong>¡Error!</strong> no se pudo borrar el usuario.
		</div>
	</div>';
}
?>