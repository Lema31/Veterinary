<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$usuario_eliminar = $_GET['usuario'];

	$cedula_usuario_actual_query = 'select * from tbl_usuarios where login = ?';
	$cedula_usuario_actual = $pdo->prepare($cedula_usuario_actual_query);
	$cedula_usuario_actual->execute(array($usuario_eliminar));
	$resultado_cedula_usuario = $cedula_usuario_actual->fetch();

	$cedula_actual = $resultado_cedula_usuario['cedula'];


	$delete_query = 'Delete from tbl_usuarios where login = ?';
	$delete_element = $pdo->prepare($delete_query);
	$delete_element->execute(array($usuario_eliminar));

	$delete_element = null;
	$delete_propietario = null;
	$pdo = null;

	header("location:../../admin_propietarios.php");

 ?>