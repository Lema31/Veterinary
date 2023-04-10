<?php 
	include('Connect.php');

	$usuario = $_POST['usuario_validar'];
	$usuario_actual = $_POST['usuario_actual'];

	if($usuario != null){
		if($usuario != $usuario_actual){
			$query_read_usuario = 'select * from tbl_usuarios where login = ?';

			$get_usuario = $pdo->prepare($query_read_usuario);
			$get_usuario->execute(array($usuario));
			$result_usuario = $get_usuario->fetch();

		  	if (!empty($result_usuario)) {
		  		echo "<p class='formulario_mensaje formulario_mensaje-activo'>El nombre de usuario no esta disponible</p>";
		  	}else{
		  		echo "<p>El nombre de usuario esta disponible</p>";
		  		$result_usuario = null;
		  		$pdo = null;
	  		}
		}
		
	}
	
 	
 ?>