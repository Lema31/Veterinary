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
    <<?php include("nav-bar.php") ?>
    <div class="container">
        <div class="formulario-izquierda">
            <div class="formulario-header">
                <h1>Registro de Propietario</h1>
                <p>Por favor rellene los campos para completar el registro</p>
            </div>
            <form class="formulario-propietario" id="formulario-propietario">
                <div class="formulario-propietario-content">
                    <div class="formulario-item">
                        <label for="Cedula">Introduzca la Cédula</label>
                        <input type="text" id="cedula_propietario"> 
                    </div>
                    <div class="formulario-item">
                        <label for="Nombre">Introduzca el Nombre</label>
                        <input type="text" id="nombre_propietario">
                    </div>
                    <div class="formulario-item">
                        <label for="Apellido">Introduzca el Apellido</label>
                        <input type="text" id="apellido_propietario">
                    </div>
                    <div class="formulario-item">
                        <label for="Telefono">Introduzca el Teléfono</label>
                        <input type="text" id="telefono_propietario">
                    </div>
                    <div class="formulario-item">
                        <label for="Direccion">Introduzca la Dirección</label>
                        <input type="text" id="direccion_propietario">
                    </div>
                    <div class="formulario-item">
                        <label for="username">Introduzca el nombre de usuario</label>
                        <input type="text" id="username">
                    </div>
                    <div class="formulario-item">
                        <label for="password">Introduzca la contraseña</label>
                        <input type="password" id="password">
                    </div>
                    <div class="formulario-item">
                        <label for="confirm_password">Repita la contraseña</label>
                        <input type="password" id="confirm_password">
                    </div>
                    <button type="submit">Registrar</button>
                </div>
            </form>
        </div>
        <!-- <div class="formulario-derecha">
            <img src="img/pngegg.png" alt= "A dog">
        </div> -->
    </div>
</body>
</html>