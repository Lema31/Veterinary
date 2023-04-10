<?php  

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$cedula = $_POST['nuevo_cedula'];

	$buscar_persona_query = 'select * from tbl_personas where cedula = ?';
	$buscar_persona = $pdo->prepare($buscar_persona_query);
	$buscar_persona->execute(array($cedula));
	$persona = $buscar_persona->fetch();

	$buscar_veterinario_query = 'select * from tbl_veterinarios where cedula = ?';
	$buscar_veterinario = $pdo->prepare($buscar_veterinario_query);
	$buscar_veterinario->execute(array($cedula));
	$veterinario = $buscar_veterinario->fetch();

	$buscar_usuario_veterinario_query = "select * from tbl_usuarios where cedula = ? and nivel_acceso = 'veterinario'";
	$buscar_usuario_veterinario = $pdo->prepare($buscar_usuario_veterinario_query);
	$buscar_usuario_veterinario->execute(array($cedula));
	$usuario_veterinario = $buscar_usuario_veterinario->fetch();

	$buscar_persona = null;
	$buscar_veterinario = null;
	$buscar_usuario_veterinario = null;

	if(empty($persona)){
		echo "no";
	}else{
		$datos = $persona['nombre'].'_';
		$datos .= $persona['apellido'].'_';
		$datos .= $persona['telefono'];
		if (!empty($veterinario)) {
			$datos .= '_'.$veterinario['experiencia_lab'];
			$datos .= '_'.$veterinario['estudios'];
			$datos .= '_'.$veterinario['num_colegio'];
		}
		if (!empty($usuario_veterinario)) {
			$datos .= '_'.$usuario_veterinario['login'];
		}
		echo $datos;
	}

?>