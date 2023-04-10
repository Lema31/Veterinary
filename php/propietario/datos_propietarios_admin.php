<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');


	$datos_propietarios_query = "select a.cedula,a.nombre,a.apellido,a.telefono,c.direccion,b.login from tbl_personas as a inner join tbl_usuarios as b on a.cedula = b.cedula inner join tbl_propietarios as c  on a.cedula = c.cedula where b.nivel_acceso = 'cliente' order by a.cedula";
	$datos_propietarios = $pdo->prepare($datos_propietarios_query);
	$datos_propietarios->execute();
	$resultado_propietarios = $datos_propietarios->fetchAll();

	$datos_propietarios = null;


 ?>