<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$codigo_actual = $_POST['codigo_actual'];
	$descripcion = $_POST['modificar_descripcion'];
	$cod_familia = $_POST['modificar_familia'];

	$editar_genero_query = 'update tbl_generos set descripcion_gen = ?,cod_familia = ? where cod_genero = ?';
	$editar_genero = $pdo->prepare($editar_genero_query);
	$editar_genero->execute(array($descripcion,$cod_familia,$codigo_actual));

	$editar_genero = null;
	$pdo = null;


 ?>