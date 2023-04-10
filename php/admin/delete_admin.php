<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$usuario_eliminar = $_GET['usuario'];

	$delete_query = 'Delete from tbl_usuarios where login = ?';
	$delete_element = $pdo->prepare($delete_query);
	$delete_element->execute(array($usuario_eliminar));

	$delete_element = null;
	$pdo = null;

	header("location:../../admin.php");

 ?>