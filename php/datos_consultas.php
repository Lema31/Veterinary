<?php 

	$datos_consultas_query = 'select * from tbl_consultas where cod_mascota = ? limit 5';
	$datos_consultas = $pdo->prepare($datos_consultas_query);
	$datos_consultas->execute(array($cod_mascota));
	$resultado_consultas = $datos_consultas->fetchAll();

	$datos_consultas = null;

 ?>