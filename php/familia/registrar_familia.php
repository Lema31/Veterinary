<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$descripcion = $_POST['nuevo_descripcion'];
	$cod_orden = $_POST['nuevo_orden'];

	$add_familia_query = 'insert into tbl_familias (descripcion_fam,cod_orden) values(?,?)';
	$add_familia = $pdo->prepare($add_familia_query);
	$add_familia->execute(array($descripcion,$cod_orden));

	$add_familia = null;
	$pdo = null;

 ?>