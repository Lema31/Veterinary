<?php 
	
	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$cedula = $_POST['nuevo_cedula'];

	$validar_persona_query = 'select * from tbl_personas where cedula = ?';
	$validar_persona = $pdo->prepare($validar_persona_query);
	$validar_persona->execute(array($cedula));
	$resultado_persona = $validar_persona->fetch();
	// echo $resultado_persona['nombre'];

	if($resultado_persona == null){
		$nombre = $_POST['nuevo_nombre'];
		$apellido = $_POST['nuevo_apellido'];
		$telefono = $_POST['nuevo_telefono'];

		$query_add_persona = 'INSERT INTO tbl_personas (cedula, nombre, apellido, telefono ) values(?,?,?,?)';
		$add_element_persona = $pdo->prepare($query_add_persona);
		$add_element_persona->execute(array($cedula, $nombre, $apellido, $telefono));
	}
	$usuario = $_POST['nuevo_usuario'];
	$password = password_hash($_POST['nuevo_password'], PASSWORD_DEFAULT);
	$nivel_acceso = 'admin';

	$query_add_usuario = 'INSERT INTO tbl_usuarios (cedula, login, password, nivel_acceso ) values(?,?,?,?)';
	$add_element_usuario = $pdo->prepare($query_add_usuario);
	$add_element_usuario->execute(array($cedula, $usuario, $password, $nivel_acceso));


  	$add_element_usuario= null;
  	$validar_persona = null;
  	$pdo = null;



	
?>