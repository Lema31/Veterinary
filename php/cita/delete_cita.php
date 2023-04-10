<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$cod_mascota = $_GET['codigo'];
	$fecha_cita = $_GET['fecha'];

	$delete_query = 'Delete from tbl_citas where fecha_cita = ? and cod_mascota = ?';
	$delete_element = $pdo->prepare($delete_query);
	$delete_element->execute(array($fecha_cita,$cod_mascota));

	$delete_element = null;
	$pdo = null;

	header("location:../../veterinario-citas.php");

 ?>