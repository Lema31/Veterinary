<?php 

	$datos_medicinas_query = 'select a.fecha_consulta,b.indicaciones,c.nombre from tbl_consultas as a inner join tbl_receta as b on a.cod_consulta = b.cod_consulta inner join tbl_medicinas as c on b.cod_medicina = c.cod_medicina where a.cod_mascota = ? limit 5';
	$datos_medicinas = $pdo->prepare($datos_medicinas_query);
	$datos_medicinas->execute(array($mascota['cod_mascota']));
	$resultado_medicinas = $datos_medicinas->fetchAll();

	$datos_medicinas = null;

 ?>