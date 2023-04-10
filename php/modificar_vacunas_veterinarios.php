<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$codigo = explode('_', $_POST['codigo']);
	$cod_vacuna = $_POST['cod_vacuna'];
	$dosis = $_POST['dosis'];

	$editar_vacuna_query = 'update tbl_aplica set cod_vacuna = ?,dosis = ? where cod_vacuna = ? and cod_consulta = ?';
	$editar_vacuna = $pdo->prepare($editar_vacuna_query);
	$editar_vacuna->execute(array($cod_vacuna,$dosis,$codigo[1],$codigo[0]));

	$editar_vacuna = null;

 ?>