<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$descripcion = $_POST['nuevo_descripcion'];
	$cod_reino = $_POST['nuevo_reino'];

	$add_phylum_query = 'insert into tbl_phylums (descripcion_phy,cod_reino) values(?,?)';
	$add_phylum = $pdo->prepare($add_phylum_query);
	$add_phylum->execute(array($descripcion,$cod_reino));

	$add_phylum = null;
	$pdo = null;

 ?>