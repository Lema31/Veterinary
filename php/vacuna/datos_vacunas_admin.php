<?php 
	
	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');
	
	$datos_vacunas_query = "select * from tbl_vacunas order by nombre";
	$datos_vacunas = $pdo->prepare($datos_vacunas_query);
	$datos_vacunas->execute();
	$resultado_vacunas = $datos_vacunas->fetchAll();


	$datos_vacunas = null;


 ?>