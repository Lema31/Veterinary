<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$nombre = $_POST['modificar_nombre'];
	$cedula = $_POST['modificar_cedula'];
	$apellido = $_POST['modificar_apellido'];
	$telefono = $_POST['modificar_telefono'];
	$experiencia = $_POST['modificar_exp'];
	$estudios = $_POST['modificar_estudios'];
	$colegio = $_POST['modificar_colegio'];
	$usuario = $_POST['modificar_usuario'];
	$password = password_hash($_POST['modificar_password'], PASSWORD_DEFAULT);
	$usuario_actual = $_POST['usuario_actual'];


	$cedula_usuario_actual_query = 'select * from tbl_usuarios where login = ?';
	$cedula_usuario_actual = $pdo->prepare($cedula_usuario_actual_query);
	$cedula_usuario_actual->execute(array($usuario_actual));
	$resultado_cedula_usuario = $cedula_usuario_actual->fetch();

	$cedula_actual = $resultado_cedula_usuario['cedula'];



	$editar_persona_query = 'update tbl_personas set cedula = ?,nombre = ?,apellido = ?,telefono = ? where cedula = ?';
	$editar_persona = $pdo->prepare($editar_persona_query);
	$editar_persona->execute(array($cedula,$nombre,$apellido,$telefono,$cedula_actual));

	$editar_veterinario_query = 'update tbl_veterinarios set experiencia_lab = ?,estudios = ?,num_colegio = ? where cedula = ?';
	$editar_veterinario = $pdo->prepare($editar_veterinario_query);
	$editar_veterinario->execute(array($experiencia,$estudios,$colegio,$cedula_actual));

	$editar_usuario_query = 'update tbl_usuarios set login = ?,password = ? where login = ?';
	$editar_usuario = $pdo->prepare($editar_usuario_query);
	$editar_usuario->execute(array($usuario,$password,$usuario_actual));


	$resultado_cedula_usuario = null;
	$editar_persona= null;
  	$editar_usuario = null;
  	$pdo = null;



 ?>