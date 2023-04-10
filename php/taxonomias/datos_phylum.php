<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$datos_phylum_query = 'select * from tbl_phylums';
	$datos_phylum = $pdo->prepare($datos_phylum_query);
	$datos_phylum->execute();
	$resultado_phylum = $datos_phylum->fetchAll();

	$datos_phylum = null;



 ?>