<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$nombre = $_POST['nuevo_nombre'];
	$descripcion = $_POST['nuevo_descripcion'];
	$cantidad = $_POST['nuevo_cantidad'];
	$costo  = $_POST['nuevo_costo'];


	$add_medicina_query = 'insert into tbl_medicinas (nombre,descripcion,cant_disponible,costo) values(?,?,?,?)';
	$add_medicina = $pdo->prepare($add_medicina_query);
	$add_medicina->execute(array($nombre,$descripcion,$cantidad,$costo));

	$pdo = null;
	$add_medicina = null;

 ?>