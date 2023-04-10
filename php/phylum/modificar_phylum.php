<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$codigo_actual = $_POST['codigo_actual'];
	$descripcion = $_POST['modificar_descripcion'];
	$cod_reino = $_POST['modificar_reino'];

	$editar_phylum_query = 'update tbl_phylums set descripcion_phy = ?,cod_reino = ? where cod_phylum = ?';
	$editar_phylum = $pdo->prepare($editar_phylum_query);
	$editar_phylum->execute(array($descripcion,$cod_reino,$codigo_actual));

	$editar_phylum = null;
	$pdo = null;


 ?>