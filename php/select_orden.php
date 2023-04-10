<?php 

	include_once('Connect.php');

	$codigo_clase = $_POST['codigo'];

	$ordenes_query = 'select * from tbl_ordenes where cod_clase = ?';
	$ordenes = $pdo->prepare($ordenes_query);
	$ordenes->execute(array($codigo_clase));
	$resultado_ordenes = $ordenes->fetchAll();

	$html = "<option value=''>Seleccione un orden</option>";
	//
	foreach ($resultado_ordenes as $value) 
		$html.="<option value='".$value['cod_orden']."'>".$value['descripcion_ord']."</option>";
	echo $html;  

 ?>