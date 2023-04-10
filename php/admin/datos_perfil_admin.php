<?php
	session_start();
	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');
	$usuario = $_SESSION['admin'];
	
	$datos_usuario_query = 'select * from tbl_usuarios where login = ?';
	$datos_usuario = $pdo->prepare($datos_usuario_query);
	$datos_usuario->execute(array($usuario));
	$resultado_usuario = $datos_usuario->fetch();

	$cedula = $resultado_usuario['cedula'];

	$datos_persona_query = 'select * from tbl_personas where cedula = ?';
	$datos_persona = $pdo->prepare($datos_persona_query);
	$datos_persona->execute(array($cedula));
	$resultado_persona = $datos_persona->fetch();

	$nombre = $resultado_persona['nombre'];
	$apellido = $resultado_persona['apellido'];
	$telefono = $resultado_persona['telefono'];

	$datos_admins_query = "select a.cedula,a.nombre,a.apellido,a.telefono,b.login from tbl_personas as a inner join tbl_usuarios as b on a.cedula = b.cedula where b.nivel_acceso = 'admin' order by a.cedula";
	$datos_admins = $pdo->prepare($datos_admins_query);
	$datos_admins->execute();
	$resultado_admins = $datos_admins->fetchAll();



?>