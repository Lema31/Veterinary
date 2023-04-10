<?php 

	include_once('Connect.php');

	$codigo_orden = $_POST['codigo'];

	$familias_query = 'select * from tbl_familias where cod_orden = ?';
	$familias = $pdo->prepare($familias_query);
	$familias->execute(array($codigo_orden));
	$resultado_familias = $familias->fetchAll();

	$html = "<option value=''>Seleccione una familia</option>";
	//
	foreach ($resultado_familias as $value) 
		$html.="<option value='".$value['cod_familia']."'>".$value['descripcion_fam']."</option>";
	echo $html;  

 ?>