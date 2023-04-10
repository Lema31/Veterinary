const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');


const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^[\w\ \#\$\@\%\^\*\/\-\+]{4,12}$/, // 4 a 12 digitos.
	telefono: /^[\d\+]{10,13}$/, // 10 a 13 numeros.
	cedula: /^\d{5,10}$/, 
	direccion: /^[\w\,\.\ \#]{5,40}$/ //letras, numeros, coma y punto de 5 a 40 caracteres
}

const campos = {
	usuario: true,
	nombre: false,
	password: false,
	direccion: false,
	telefono: false,
	apellido: false,
	cedula: false
}

function comprobar_usuario(){
    if (campos.usuario){
    	let usuario_validar = $('#usuario').val();
	   	$.ajax({
	        data: {usuario_validar},
	        url: "./php/comprobar_usuario.php",
	        type: "POST",

	        success: function(mensaje){
	            document.getElementById('mensaje_usuario').innerHTML= mensaje;
	        }
	   	})
	}
}

function registrar_propietario(){
	let cedula = $('#cedula').val();
	let nombre = $('#nombre').val();
	let apellido = $('#apellido').val();
	let telefono = $('#telefono').val();
	let direccion = $('#direccion').val();
	let usuario = $('#usuario').val();
	let password = $('#password').val();
	$.ajax({
		data: {cedula,nombre,apellido,telefono,direccion,usuario,password},
		url: "./php/registrar_propietario.php",
		type: "POST",

		success: function(){
			alert('Usuario registrado');
  			window.location = './login2.php';
		}
	})
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "usuario":
			validarCampo(expresiones.usuario, e.target, 'usuario');
			comprobar_usuario();
		break;
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
	case "apellido":
			validarCampo(expresiones.nombre, e.target, 'apellido');
		break;
		case "password":
			validarCampo(expresiones.password, e.target, 'password');
			validarPassword2();
		break;
		case "password2":
			validarPassword2();
		break;
		case "direccion":
			validarCampo(expresiones.direccion, e.target, 'direccion');
		break;
		case "telefono":
			validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
		case "cedula":
			validarCampo(expresiones.cedula, e.target, 'cedula');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`input_${campo}`).classList.remove('formulario_item-incorrecto');
		document.getElementById(`input_${campo}`).classList.add('formulario_item-correcto');
		document.querySelector(`#input_${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#input_${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#input_${campo} .formulario_input-error`).classList.remove('formulario_input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`input_${campo}`).classList.add('formulario_item-incorrecto');
		document.getElementById(`input_${campo}`).classList.remove('formulario_item-correcto');
		document.querySelector(`#input_${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#input_${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#input_${campo} .formulario_input-error`).classList.add('formulario_input-error-activo');
		campos[campo] = false;
	}
}

const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`input_password2`).classList.add('formulario_item-incorrecto');
		document.getElementById(`input_password2`).classList.remove('formulario_item-correcto');
		document.querySelector(`#input_password2 i`).classList.add('fa-times-circle');
		document.querySelector(`#input_password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#input_password2 .formulario_input-error`).classList.add('formulario_input-error-activo');
		campos['password'] = false;
	} else {
		document.getElementById(`input_password2`).classList.remove('formulario_item-incorrecto');
		document.getElementById(`input_password2`).classList.add('formulario_item-correcto');
		document.querySelector(`#input_password2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#input_password2 i`).classList.add('fa-check-circle');
		document.querySelector(`#input_password2 .formulario_input-error`).classList.remove('formulario_input-error-activo');
		campos['password'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});


formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	if(campos.usuario && campos.nombre && campos.apellido && campos.password && campos.direccion && campos.telefono && campos.cedula){
		if (document.getElementById('mensaje_usuario').innerHTML == "<p>El nombre de usuario esta disponible</p>") {
			document.getElementById('formulario_mensaje').classList.remove('formulario_mensaje-activo');
			registrar_propietario();
		}
	} else {
		document.getElementById('formulario_mensaje').classList.add('formulario_mensaje-activo');
	}
});



