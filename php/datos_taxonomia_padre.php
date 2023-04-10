<?php 


	include_once('Connect.php');


	if (isset($upper_taxon_level)) {

		$datos_padre_taxonomia_query = 'select * from '.$upper_taxon_level.'';	
		$datos_padre_taxonomia = $pdo->prepare($datos_padre_taxonomia_query);
		$datos_padre_taxonomia->execute();
		$resultado_padre_taxonomia = $datos_padre_taxonomia->fetchAll();


		$datos_padre_taxonomia = null;

	}

	



 ?>