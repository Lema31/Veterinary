<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$codigo_actual = $_POST['codigo_actual'];
	$descripcion = $_POST['modificar_descripcion'];
	$cod_genero = $_POST['modificar_genero'];

	$editar_especie_query = 'update tbl_especies set descripcion_esp = ?,cod_genero = ? where cod_especie = ?';
	$editar_especie = $pdo->prepare($editar_especie_query);
	$editar_especie->execute(array($descripcion,$cod_genero,$codigo_actual));

	$editar_especie = null;
	$pdo = null;


 ?>