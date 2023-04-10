<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$codigo_actual = $_POST['codigo_actual'];
	$descripcion = $_POST['modificar_descripcion'];
	$cod_phylum = $_POST['modificar_phylum'];

	$editar_clase_query = 'update tbl_clases set descripcion_cla = ?,cod_phylum = ? where cod_clase = ?';
	$editar_clase = $pdo->prepare($editar_clase_query);
	$editar_clase->execute(array($descripcion,$cod_phylum,$codigo_actual));

	$editar_clase = null;
	$pdo = null;


 ?>