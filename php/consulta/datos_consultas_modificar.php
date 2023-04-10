<?php 

	$datos_consultas_query = 'select * from tbl_consultas where cod_mascota = ? order by fecha_consulta';
	$datos_consulta = $pdo->prepare($datos_consultas_query);
	$datos_consulta->execute(array($cod_mascota));
	$resultado_consultas_modificar = $datos_consulta->fetchAll();

	$datos_consulta = null;

 ?>