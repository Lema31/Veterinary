<?php 

	$datos_mascotas_query = 'select a.nombre,a.fecha_nacimiento,a.cod_mascota,b.descripcion_esp from tbl_mascotas as a inner join tbl_especies as b on a.cod_especie = b.cod_especie where a.ced_propietario = ? order by a.nombre';
	$datos_mascotas = $pdo->prepare($datos_mascotas_query);
	$datos_mascotas->execute(array($resultado_propietario['cedula']));
	$resultado_mascotas = $datos_mascotas->fetchAll();

	$datos_mascotas = null;

 ?>