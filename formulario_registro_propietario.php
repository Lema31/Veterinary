
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Propietario</title>
    <link rel="stylesheet" href="Estilos/registro_propietario.css">

</head>
<body>
    <?php include('nav-bar.php') ?>
    <div class="container">
        <div class="formulario-izquierda">
            <div class="formulario-header">
                <h1>Registro de Propietario</h1>
                <p>Por favor rellene los campos para completar el registro</p>
            </div>
            <form class="formulario-propietario" id="formulario" method="POST">
                <div class="formulario-propietario-content">

                    <div class="formulario-item" id="input_cedula">
                        <label for="cedula" class="over formulario_label">Introduzca la Cédula</label>
                        <div class="formulario_grupo_input">
                            <input type="text" id="cedula" name="cedula" class="formulario_input">
                            <i class="formulario_validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario_input-error">La cedula solo puede contener digitos</p>
                    </div>

                    <div class="formulario-item" id="input_nombre">
                        <label for="nombre" class="over formulario_label">Introduzca el nombre</label>
                        <div class="formulario_grupo_input">
                            <input type="text" id="nombre" name="nombre" class="formulario_input">
                            <i class="formulario_validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario_input-error">El nombre solo puede contener letras</p>
                    </div>

                    <div class="formulario-item" id="input_apellido">
                        <label for="apellido" class="over formulario_label">Introduzca el apellido</label>
                        <div class="formulario_grupo_input">
                            <input type="text" id="apellido" name="apellido" class="formulario_input">
                            <i class="formulario_validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario_input-error">El apellido solo puede contener letras</p>
                    </div>

                    <div class="formulario-item" id="input_telefono">
                        <label for="telefono" class="over formulario_label">Introduzca el telefono</label>
                        <div class="formulario_grupo_input">
                            <input type="text" id="telefono" name="telefono" class="formulario_input">
                            <i class="formulario_validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario_input-error">El telefono debe cumplir con el formato adecuado</p>
                    </div>

                    <div class="formulario-item" id="input_direccion">
                        <label for="direccion" class="over formulario_label">Introduzca la direccion</label>
                        <div class="formulario_grupo_input">
                            <input type="text" id="direccion" name="direccion" class="formulario_input">
                            <i class="formulario_validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario_input-error">La direccion solo puede contener letras y digitos</p>
                    </div>

                    <div class="formulario-item" id="input_usuario">
                        <label for="usuario" class="over formulario_label">Introduzca el usuario</label>
                        <div class="formulario_grupo_input">
                            <input type="text" id="usuario" name="usuario" class="formulario_input">
                            <i class="formulario_validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario_input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                        <p class="mt-2" id="mensaje_usuario"></p>                        
                    </div>

                    <div class="formulario-item" id="input_password">
                        <label for="password" class="over formulario_label">Introduzca la contraseña</label>
                        <div class="formulario_grupo_input">
                            <input type="password" id="password" name="password" class="formulario_input">
                            <i class="formulario_validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario_input-error">La contraseña tiene que ser de 4 a 12 caracteres.</p>
                    </div>

                    <div class="formulario-item" id="input_password2">
                        <label for="password" class="over formulario_label">Repita la contraseña</label>
                        <div class="formulario_grupo_input">
                            <input type="password" id="password2" name="password2" class="formulario_input">
                            <i class="formulario_validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario_input-error">Ambas contraseñas deben der iguales</p>
                    </div>

                    <div class="formulario_mensaje" id="formulario_mensaje">
                        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                    </div>
                    
                    <button type="submit" class="formulario_btn" name="send">Registrar</button>

                </div>
            </form>
        </div>
        <div class="formulario-derecha">
            <img src="img/pngegg.png" alt= "A dog">
        </div>
    </div>

    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.4.min.js"></script>

    <script src="js/formulario_propietario.js"></script>
  
    <script src="https://kit.fontawesome.com/62c8c22c54.js" crossorigin="anonymous"></script>

</body>
</html>