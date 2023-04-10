<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$codigo_actual = $_POST['codigo_actual'];
	$descripcion = $_POST['modificar_descripcion'];

	$editar_reino_query = 'update tbl_reinos set descripcion = ? where cod_reino = ?';
	$editar_reino = $pdo->prepare($editar_reino_query);
	$editar_reino->execute(array($descripcion,$codigo_actual));

	$editar_reino = null;
	$pdo = null;


 ?>