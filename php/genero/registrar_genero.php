<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$descripcion = $_POST['nuevo_descripcion'];
	$cod_familia = $_POST['nuevo_familia'];

	$add_genero_query = 'insert into tbl_generos (descripcion_gen,cod_familia) values(?,?)';
	$add_genero = $pdo->prepare($add_genero_query);
	$add_genero->execute(array($descripcion,$cod_familia));

	$add_genero = null;
	$pdo = null;

 ?>