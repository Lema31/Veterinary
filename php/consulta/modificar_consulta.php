<?php 
	
	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$cod_consulta = $_POST['codigo_consulta'];
	$fecha = $_POST['fecha_consulta'];
	$estado = $_POST['estado'];
	$tratamiento = $_POST['tratamiento'];
	$frec_cardiaca = $_POST['frec_cardiaca'];
	$frec_respiratoria = $_POST['frec_respiratoria'];
	$revision = $_POST['revision'];
	$temperatura = $_POST['temperatura'];

	$editar_consulta_query = 'update tbl_consultas set	fecha_consulta = ?,estado = ?,tratamiento = ?,frec_cardiaca = ?, frec_respiratoria = ?, rev_oftalmologica = ?,temperatura = ? where cod_consulta = ?';
	$editar_consulta = $pdo->prepare($editar_consulta_query);
	$editar_consulta->execute(array($fecha,$estado,$tratamiento,$frec_cardiaca,$frec_respiratoria,$revision,$temperatura,$cod_consulta));


	$editar_consulta = null;
	$pdo = null;

 ?>