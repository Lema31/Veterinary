<?php 

	$datos_vacunas_query = 'select b.fecha_consulta,b.cod_consulta,c.dosis,d.nombre,d.cod_vacuna from tbl_mascotas as a inner join tbl_consultas as b on a.cod_mascota = b.cod_mascota inner join tbl_aplica as c on b.cod_consulta = c.cod_consulta inner join tbl_vacunas as d on c.cod_vacuna = d.cod_vacuna where a.cod_mascota = ? order by b.fecha_consulta';
	$datos_vacunas = $pdo->prepare($datos_vacunas_query);
	$datos_vacunas->execute(array($cod_mascota));
	$resultado_vacunas = $datos_vacunas->fetchAll();

	$datos_vacunas = null;


 ?>