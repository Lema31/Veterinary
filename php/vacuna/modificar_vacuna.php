<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$codigo_actual = $_POST['codigo_actual'];
	$nombre = $_POST['modificar_nombre'];
	$descripcion = $_POST['modificar_descripcion'];

	$editar_vacuna_query = 'update tbl_vacunas set nombre = ?,descripcion = ? where cod_vacuna = ?';
	$editar_vacuna = $pdo->prepare($editar_vacuna_query);
	$editar_vacuna->execute(array($nombre,$descripcion,$codigo_actual));

	$editar_vacuna = null;
	$pdo = null;


 ?>