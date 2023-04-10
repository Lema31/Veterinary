<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$descripcion = $_POST['nuevo_descripcion'];
	$cod_genero = $_POST['nuevo_genero'];

	$add_especie_query = 'insert into tbl_especies (descripcion_esp,cod_genero) values(?,?)';
	$add_especie = $pdo->prepare($add_especie_query);
	$add_especie->execute(array($descripcion,$cod_genero));

	$add_especie = null;
	$pdo = null;

 ?>