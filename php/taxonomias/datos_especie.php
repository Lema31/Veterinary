<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$datos_especie_query = 'select * from tbl_especies';
	$datos_especie = $pdo->prepare($datos_especie_query);
	$datos_especie->execute();
	$resultado_especie = $datos_especie->fetchAll();

	$datos_especie = null;


 ?>