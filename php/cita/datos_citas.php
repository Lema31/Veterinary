<?php 



	$datos_citas_query = 'select a.fecha_cita,a.num_consultorio,b.cedula,b.nombre,b.apellido,c.nombre as nombre_mascota,c.cod_mascota,d.descripcion_esp from tbl_citas as a inner join tbl_personas as b on a.ced_propietario = b.cedula inner join tbl_mascotas as c on a.cod_mascota = c.cod_mascota inner join tbl_especies as d on c.cod_especie = d.cod_especie where a.ced_veterinario = ? order by a.fecha_cita';
	$datos_citas = $pdo->prepare($datos_citas_query);
	$datos_citas->execute(array($cedula_veterinario));
	$resultado_citas = $datos_citas->fetchAll();

	$datos_citas = null;

 ?>