<?php 
	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');
	
	$codigo = $_GET['codigo'];
	$cod_mascota = $_GET['cod_mascota'];
	$cedula_propietario = $_GET['cedula'];


	$delete_query = 'Delete from tbl_consultas where cod_consulta = ?';
	$delete_element = $pdo->prepare($delete_query);
	$delete_element->execute(array($codigo));

	$delete_element = null;
	$pdo = null;

	header("location:../../veterinario-consulta.php?cod_mascota=$cod_mascota&cedula=$cedula_propietario");


 ?>