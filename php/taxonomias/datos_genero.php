<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$datos_genero_query = 'select * from tbl_generos';
	$datos_genero = $pdo->prepare($datos_genero_query);
	$datos_genero->execute();
	$resultado_genero = $datos_genero->fetchAll();

	$datos_genero = null;


 ?>