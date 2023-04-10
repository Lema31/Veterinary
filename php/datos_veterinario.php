<?php 

	include_once('Connect.php');
	$usuario = $_SESSION['veterinario'];
	
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

	$datos_veterinario_query = 'select * from tbl_veterinarios where cedula = ?';
	$datos_veterinario = $pdo->prepare($datos_veterinario_query);
	$datos_veterinario->execute(array($cedula));
	$resultado_veterinario = $datos_veterinario->fetch();

	$experiencia = $resultado_veterinario['experiencia_lab'];
	$estudios = $resultado_veterinario['estudios'];
	$num_colegio = $resultado_veterinario['num_colegio'];

 ?>