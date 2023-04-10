const formulario = document.getElementById('formulario_login');

formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	let usuario = $('#usuario').val();
	let password = $('#password').val();

	$.ajax({
		data: {usuario,password},
		url: "./php/validar_login.php",
		type: "POST",

		success: function(mensaje){
			if (mensaje == "El nombre de usuario o la contraseña son incorrectos, vuelva a intentarlo") {
				document.getElementById('mensaje_incorrecto').innerHTML= mensaje;
			}else{
				window.location = './index.php';
			}
		}
	})
	
});