<?php 

	include_once('Connect.php');

	$codigo_genero = $_POST['codigo'];

	$especies_query = 'select * from tbl_especies where cod_genero = ?';
	$especies = $pdo->prepare($especies_query);
	$especies->execute(array($codigo_genero));
	$resultado_especies = $especies->fetchAll();

	$html = "<option value=''>Seleccione una especie</option>";
	//
	foreach ($resultado_especies as $value) 
		$html.="<option value='".$value['cod_especie']."'>".$value['descripcion_esp']."</option>";
	echo $html;  

 ?>