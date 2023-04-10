<?php 

	include_once('Connect.php');

	$codigo_familia = $_POST['codigo'];

	$generos_query = 'select * from tbl_generos where cod_familia = ?';
	$generos = $pdo->prepare($generos_query);
	$generos->execute(array($codigo_familia));
	$resultado_generos = $generos->fetchAll();

	$html = "<option value=''>Seleccione un genero</option>";
	//
	foreach ($resultado_generos as $value) 
		$html.="<option value='".$value['cod_genero']."'>".$value['descripcion_gen']."</option>";
	echo $html;  

 ?>