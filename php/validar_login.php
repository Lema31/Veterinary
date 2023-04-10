<?php 
	include_once("Connect.php");

	$usuario_validar = filter_var($_POST['usuario'], FILTER_SANITIZE_SPECIAL_CHARS);
	$password_validar = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);


	$validar_usuario_query = 'select * from tbl_usuarios where login = ?';
	$validar_usuario = $pdo->prepare($validar_usuario_query);
	$validar_usuario->execute(array($usuario_validar));
	$resultado_usuario = $validar_usuario->fetch();

	if($resultado_usuario){
		if(password_verify($password_validar, $resultado_usuario['password'])){
			session_start();
			$_SESSION[$resultado_usuario['nivel_acceso']] = $usuario_validar;
		}else{
			echo "El nombre de usuario o la contraseña son incorrectos, vuelva a intentarlo";
		}
	}else{
		echo "El nombre de usuario o la contraseña son incorrectos, vuelva a intentarlo";
	}
 ?>