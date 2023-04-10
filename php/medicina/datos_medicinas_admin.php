<?php 
	
	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$datos_medicinas_query = 'select * from tbl_medicinas order by nombre';
	$datos_medicinas = $pdo->prepare($datos_medicinas_query);
	$datos_medicinas->execute();
	$resultado_medicinas = $datos_medicinas->fetchAll();


	$datos_medicinas = null;


 ?>