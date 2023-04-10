<?php 
	include_once('Connect.php');

	$cedula = $_POST['cedula'];

	$validar_persona_query = 'select * from tbl_personas where cedula = ?';
	$validar_persona = $pdo->prepare($validar_persona_query);
	$validar_persona->execute(array($cedula));
	$resultado_persona = $validar_persona->fetch();

	if(!$resultado_persona){
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$telefono = $_POST['telefono'];

		$query_add_persona = 'INSERT INTO tbl_personas (cedula, nombre, apellido, telefono ) values(?,?,?,?)';
		$add_element_persona = $pdo->prepare($query_add_persona);
		$add_element_persona->execute(array($cedula, $nombre, $apellido, $telefono));
	}

	$validar_propietario_query = 'select * from tbl_propietarios where cedula = ?';
	$validar_propietario = $pdo->prepare($validar_propietario_query);
	$validar_propietario->execute(array($cedula));
	$resultado_propietario = $validar_propietario->fetch();

	if (!$resultado_propietario) {
		$direccion = $_POST['direccion'];

		$query_add_propietario = 'INSERT INTO tbl_propietarios (cedula, direccion) values(?,?)';
		$add_element_propietario = $pdo->prepare($query_add_propietario);
		$add_element_propietario->execute(array($cedula, $direccion));
	}

	$usuario = $_POST['usuario'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	if (isset($_POST['nivel_acceso'])) {
		$nivel_acceso = $_POST['nivel_acceso'];
	}else{
		$nivel_acceso = 'cliente';
	}

	$query_add_usuario = 'INSERT INTO tbl_usuarios (cedula, login, password, nivel_acceso ) values(?,?,?,?)';
	$add_element_usuario = $pdo->prepare($query_add_usuario);
	$add_element_usuario->execute(array($cedula, $usuario, $password, $nivel_acceso));


  	$add_element = null;
  	$pdo = null;


 ?>