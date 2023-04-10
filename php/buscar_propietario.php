<?php  

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$cedula = $_POST['nuevo_cedula'];

	$buscar_persona_query = 'select * from tbl_personas where cedula = ?';
	$buscar_persona = $pdo->prepare($buscar_persona_query);
	$buscar_persona->execute(array($cedula));
	$persona = $buscar_persona->fetch();

	$buscar_direccion_query = 'select * from tbl_propietarios where cedula = ?';
	$buscar_direccion = $pdo->prepare($buscar_direccion_query);
	$buscar_direccion->execute(array($cedula));
	$direccion = $buscar_direccion->fetch();

	$buscar_persona = null;
	$buscar_direccion = null;

	if(empty($persona)){
		echo "no";
	}else{
		$datos = $persona['nombre'].'_';
		$datos .= $persona['apellido'].'_';
		$datos .= $persona['telefono'];
		if (!empty($direccion)) {
			$datos .= '_'.$direccion['direccion'];
		}
		echo $datos;
	}

?>