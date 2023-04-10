<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$codigo_actual = $_POST['codigo_actual'];
	$nombre = $_POST['modificar_nombre'];
	$descripcion = $_POST['modificar_descripcion'];
	$cantidad = $_POST['modificar_cantidad'];
	$costo = $_POST['modificar_costo'];

	$editar_medicina_query = 'update tbl_medicinas set nombre = ?,descripcion = ?,cant_disponible = ?,costo = ? where cod_medicina = ?';
	$editar_medicina = $pdo->prepare($editar_medicina_query);
	$editar_medicina->execute(array($nombre,$descripcion,$cantidad,$costo,$codigo_actual));

	$editar_medicina = null;
	$pdo = null;


 ?>