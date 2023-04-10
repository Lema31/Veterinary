<?php 

	$datos_cita_query = 'select * from tbl_citas where cod_mascota = ?  and fecha_cita >= current_date order by fecha_cita limit 1';
	$datos_cita = $pdo->prepare($datos_cita_query);
	$datos_cita->execute(array($mascota['cod_mascota']));
	$resultado_cita = $datos_cita->fetch();

	$datos_cita = null;

 ?>