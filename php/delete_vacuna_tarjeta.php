<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$codigo_consulta = $_GET['cod_consulta'];
	$codigo_vacuna = $_GET['cod_vacuna'];
	$codigo_mascota = $_GET['cod_mascota'];

	$delete_query = 'Delete from tbl_aplica where cod_consulta = ? and cod_vacuna = ?';
	$delete_element = $pdo->prepare($delete_query);
	$delete_element->execute(array($codigo_consulta,$codigo_vacuna));

	$delete_element = null;
	$pdo = null;

	header("location:../tarjeta_vacunacion_veterinario2.php?codigo=$codigo_mascota");

 ?>