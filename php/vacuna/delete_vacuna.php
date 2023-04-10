<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$codigo_eliminar = $_GET['codigo'];

	$delete_query = 'Delete from tbl_vacunas where cod_vacuna = ?';
	$delete_element = $pdo->prepare($delete_query);
	$delete_element->execute(array($codigo_eliminar));

	$delete_element = null;
	$pdo = null;

	header("location:../../admin_vacunas.php");

 ?>