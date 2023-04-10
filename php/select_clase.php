<?php 

	include_once('Connect.php');

	$codigo_phylum = $_POST['codigo'];

	$clases_query = 'select * from tbl_clases where cod_phylum = ?';
	$clases = $pdo->prepare($clases_query);
	$clases->execute(array($codigo_phylum));
	$resultado_clases = $clases->fetchAll();

	$html = "<option value=''>Seleccione una clase</option>";
	//
	foreach ($resultado_clases as $value) 
		$html.="<option value='".$value['cod_clase']."'>".$value['descripcion_cla']."</option>";
	echo $html;  

 ?>