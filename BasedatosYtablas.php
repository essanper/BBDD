<?php
$conectar = mysqli_connect($host, $nombreBaseDatos , $contraseñaBaseDatos);
$crearBaseDatos = "CREATE DATABASE $basedeDatos";
if (mysqli_query($conectar, $crearBaseDatos)){
	echo "Se ha creado la base de datos correctamente. Base de datos creada: $basedeDatos<br/>";
	$crearTablaMazmorra = "CREATE TABLE proyectofinal.Mazmorra (
		nivelMazmorra int(3) NOT NULL,
		IDMazmorra varchar(5) NOT NULL,
						
		primary key(IDMazmorra)
		) ENGINE=InnoDB";
						
		$conectarseNueva = mysqli_connect($host, $nombreBaseDatos , $contraseñaBaseDatos, $basedeDatos);
		if(mysqli_query($conectarseNueva, $crearTablaMazmorra)){
			echo "Se ha creado la tabla  Mazmorra.<br/>";
			$crearTablaItems = "CREATE TABLE IF NOT EXISTS proyectofinal.Items (
			IDItems varchar(5) NOT NULL,
			Nivelitem int(3) NOT NULL,
			NombreItem varchar(25) NOT NULL,
			TipoItem enum('Armadura','Arma') NOT NULL,
						
			primary key(IDItems)
			) ENGINE=InnoDB;";
			
			if(mysqli_query($conectarseNueva, $crearTablaItems)){
				echo "Se ha creado la tabla Items.<br/>";
				$crearTablaMonstruos = "CREATE TABLE proyectofinal.Monstruos (
				NombreMonstruo varchar(50) NOT NULL,
				NivelMonstruo int(3) NOT NULL,
				PuntosMonstruo int(5) NOT NULL,
				JefeMonstruo varchar(50),
				EsJefe varchar(3) NOT NULL,
							
				primary key(NombreMonstruo),
				foreign key fk_reflexiva (JefeMonstruo) REFERENCES Monstruos(NombreMonstruo)
				) ENGINE=InnoDB;";
				
				if (mysqli_query($conectarseNueva, $crearTablaMonstruos)){
					echo "Se ha creado la tabla Monstruos.<br/>";
					$crearTablaPersonajes = "CREATE TABLE IF NOT EXISTS proyectofinal.Personajes (
					NombrePersonaje varchar(10) NOT NULL,
					NivelPersonaje varchar(3) NOT NULL DEFAULT '1',
					PuntosPersonaje int(20) NOT NULL,
					IDMazmorra varchar(5),
					IDItems varchar(5),
					FechaPuntuacion TIMESTAMP NOT NULL,
							  
					primary key(NombrePersonaje),
					foreign key fk1_Personajes (IDMazmorra) REFERENCES Mazmorra(IDMazmorra),
					foreign key fk2_Personajes (IDItems) REFERENCES Items(IDItems)
					) ENGINE=InnoDB";
					
					if(mysqli_query($conectarseNueva, $crearTablaPersonajes)){
						echo "Se ha creado la tabla Personajes.<br/>";
						$crearTablaCuenta = "CREATE TABLE IF NOT EXISTS proyectofinal.Cuenta (
						NombreCuenta varchar(20) NOT NULL,
						PassCuenta varchar(10) NOT NULL,
						NombrePersonaje varchar(10),
								
						primary key(NombreCuenta)
						) ENGINE=InnoDB";
								
						if(mysqli_query($conectarseNueva, $crearTablaCuenta)){
							echo "Se ha creado la tabla Cuenta.<br/>";
							$crearTablaENCUENTRAN = "CREATE TABLE IF NOT EXISTS ENCUENTRAN (
							IDMazmorra varchar(5),
							NombreMonstruo varchar(50),
									  
							primary key(IDMazmorra,NombreMonstruo),
							foreign key fk1_ENCUENTRAN (NombreMonstruo) REFERENCES Monstruos(NombreMonstruo),
							foreign key fk2_ENCUENTRAN (IDMazmorra) REFERENCES Mazmorra(IDMazmorra)
							) ENGINE=InnoDB";
							
							if(mysqli_query($conectarseNueva, $crearTablaENCUENTRAN)){
								echo "Se ha creado la tabla ENCUENTRAN (N:N)<br/>";
								$crearTablaTIRAN = "CREATE TABLE IF NOT EXISTS TIRAN (
								IDItems varchar(5),
								NombreMonstruo varchar(50),
											
								primary key(IDItems,NombreMonstruo),
								foreign key fk1_TIRAN (NombreMonstruo) REFERENCES Monstruos(NombreMonstruo),
								foreign key fk2_TIRAN (IDItems) REFERENCES Items(IDItems)
								) ENGINE=InnoDB";
							
							if(mysqli_query($conectarseNueva, $crearTablaTIRAN)){
									echo "Se ha creado la tabla TIRAN (N:N)<br/>";
									echo '<script language="javascript">alert("Éxito al crear todas las tablas. Vuelva a registrarse, disculpe las molestias");</script>'; 

							}else{
									echo "No se ha podido crear la tabla TIRAN (N:N)";
								}
						}else{
							echo "No se ha podido crear la tabla ENCUENTRAN (N:N)";
						}
					}else{
						echo "No se ha podido crear la tabla Cuenta";
					}
				} else {
					echo "No se ha podido crear la tabla Personajes";
				}
			} else {
				echo "No se ha podido crear la tabla Monstruos";
			}
		}else {
			echo "No se ha podido crear la tabla Items";
		}
	}else{
		echo "No se ha podido crear la tabla Mazmorra";
	}
}else {
	echo "No se ha creado la base de datos $basedeDatos";
}
?>