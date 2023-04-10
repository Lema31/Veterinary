<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$datos_orden_query = 'select * from tbl_ordenes';
	$datos_orden = $pdo->prepare($datos_orden_query);
	$datos_orden->execute();
	$resultado_orden = $datos_orden->fetchAll();

	$datos_orden = null;


 ?>