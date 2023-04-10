<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$descripcion = $_POST['nuevo_descripcion'];
	$cod_phylum = $_POST['nuevo_phylum'];

	$add_clase_query = 'insert into tbl_clases (descripcion_cla,cod_phylum) values(?,?)';
	$add_clase = $pdo->prepare($add_clase_query);
	$add_clase->execute(array($descripcion,$cod_phylum));

	$add_clase = null;
	$pdo = null;

 ?>