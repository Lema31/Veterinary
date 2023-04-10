<?php session_start();  ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="Estilos/login2.css">

    </head>
    <body>
        <?php include("nav-bar.php") ?>
        <div class="wrapper">
            <div class="container main">
                <div class="row">
                    <div class="col-md-6 side-image">
                        <!-- Aquí va la imágen del tope.-->
                    </div>

                    <div class="col-md-6 right">
                        <form id="formulario_login">
                            <div class="input-box mb-5">
                                <header class="display-6"> Inicia sesion </header>
                                <!--Correo-->
                                <div class="input-field mt-5">
                                    <input type="text" class="input" id="usuario" required autocomplete="off">
                                    <label for="usuario">Usuario</label>
                                </div>
                                <!--Contraseña-->
                                <div class="input-field">
                                    <input type="password" class="input" id="password" required>
                                    <label for="password">Contraseña</label>
                                </div>
                                <div class="input-field">
                                    <input type="submit" class="submit" value="Iniciar" id="submit">
                                </div>
                                <p class="text-danger mt-3"><b id="mensaje_incorrecto"></b></p>

                                <!--¿Tienes ya una cuenta?-->
                                <div class="signin">
                                    <span>¿No tienes cuenta? <a href="formulario_registro_propietario.php"> Registrate aquí</a>
                                    </span>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
           
        <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
        <!-- Frontend Logic -->
        <script src="js/login2.js"></script>
        <script src="Bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>