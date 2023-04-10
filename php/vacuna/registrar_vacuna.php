<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$nombre = $_POST['nuevo_nombre'];
	$descripcion = $_POST['nuevo_descripcion'];


	$add_vacuna_query = 'insert into tbl_vacunas (nombre,descripcion) values(?,?)';
	$add_vacuna = $pdo->prepare($add_vacuna_query);
	$add_vacuna->execute(array($nombre,$descripcion));

	$pdo = null;
	$add_vacuna = null;

 ?>