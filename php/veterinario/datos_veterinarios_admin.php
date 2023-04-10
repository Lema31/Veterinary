<?php 
	
	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$datos_veterinarios_query = "select a.cedula,a.nombre,a.apellido,a.telefono,c.experiencia_lab,c.estudios,c.num_colegio,b.login from tbl_personas as a inner join tbl_usuarios as b on a.cedula = b.cedula inner join tbl_veterinarios as c  on b.cedula = c.cedula where b.nivel_acceso = 'veterinario' order by a.cedula";
	$datos_veterinarios = $pdo->prepare($datos_veterinarios_query);
	$datos_veterinarios->execute();
	$resultado_veterinarios = $datos_veterinarios->fetchAll();

	$datos_veterinarios = null;

	

 ?>