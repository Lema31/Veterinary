<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$descripcion = $_POST['nuevo_descripcion'];
	$cod_clase = $_POST['nuevo_clase'];

	$add_orden_query = 'insert into tbl_ordenes (descripcion_ord,cod_clase) values(?,?)';
	$add_orden = $pdo->prepare($add_orden_query);
	$add_orden->execute(array($descripcion,$cod_clase));

	$add_orden = null;
	$pdo = null;

 ?>