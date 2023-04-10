<?php 

	$datos_mascota_query = 'select * from tbl_mascotas where cod_mascota = ?';
	$datos_mascota = $pdo->prepare($datos_mascota_query);
	$datos_mascota->execute(array($cod_mascota));
	$resultado_mascota = $datos_mascota->fetch();

	$datos_mascota = null;

 ?>