<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$datos_familia_query = 'select * from tbl_familias';
	$datos_familia = $pdo->prepare($datos_familia_query);
	$datos_familia->execute();
	$resultado_familia = $datos_familia->fetchAll();

	$datos_familia = null;


 ?>