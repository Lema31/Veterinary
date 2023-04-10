<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$usuario = $_SESSION['cliente'];

	$cedula_usuario_query = 'select cedula from tbl_usuarios where login = ?';
	$cedula_usuario = $pdo->prepare($cedula_usuario_query);
	$cedula_usuario->execute(array($usuario));
	$resultado_cedula = $cedula_usuario->fetch();

	$datos_propietario_query = 'select a.cedula,a.nombre,a.apellido,a.telefono,b.direccion from tbl_personas as a inner join tbl_propietarios as b on a.cedula = b.cedula where a.cedula = ?';
	$datos_propietario = $pdo->prepare($datos_propietario_query);
	$datos_propietario->execute(array($resultado_cedula['cedula']));
	$resultado_propietario = $datos_propietario->fetch();

	$cedula_usuario = null;
	$datos_propietario = null;

 ?>