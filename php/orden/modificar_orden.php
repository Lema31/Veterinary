<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$codigo_actual = $_POST['codigo_actual'];
	$descripcion = $_POST['modificar_descripcion'];
	$cod_clase = $_POST['modificar_clase'];

	$editar_orden_query = 'update tbl_ordenes set descripcion_ord = ?,cod_clase = ? where cod_orden = ?';
	$editar_orden = $pdo->prepare($editar_orden_query);
	$editar_orden->execute(array($descripcion,$cod_clase,$codigo_actual));

	$editar_orden = null;
	$pdo = null;


 ?>