<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$datos_clase_query = 'select * from tbl_clases';
	$datos_clase = $pdo->prepare($datos_clase_query);
	$datos_clase->execute();
	$resultado_clase = $datos_clase->fetchAll();

	$datos_clase = null;


 ?>