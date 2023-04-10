<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$codigo_actual = $_POST['codigo_actual'];
	$descripcion = $_POST['modificar_descripcion'];
	$cod_orden = $_POST['modificar_orden'];

	$editar_familia_query = 'update tbl_familias set descripcion_fam = ?,cod_orden = ? where cod_familia = ?';
	$editar_familia = $pdo->prepare($editar_familia_query);
	$editar_familia->execute(array($descripcion,$cod_orden,$codigo_actual));

	$editar_familia = null;
	$pdo = null;


 ?>