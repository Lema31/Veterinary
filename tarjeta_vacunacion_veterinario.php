<?php 
    session_start();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjeta de Vacunacion</title>
    <link rel="stylesheet" href="Estilos/tarjeta_vacunacion_veterinario.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
</head>
<body>
    <?php include('nav-bar.php') ?>
    <div class="container">
        <div class="info-izquierda">
            <div class="info-header">
                <h1>Tarjeta de vacunacion de Mascota</h1>
            </div>
            <form class="formulario-info">    
                <div class="formulario-info-content">
                    <div class="formulario-info-content-unmod">
                        <div class="form-item">
                            <p for="pCodigoMascota"><b>Codigo de la Mascota:</b> </p>
                            <p for="rCodigoMascota">Codigo</p>
                        </div>
                        <div class="form-item">
                            <p for="pNombreMascota"><b>Nombre de la Mascota:</b></p>
                            <p for="rNombreMascota">Nombre</p>
                        </div>
                        <div class="form-item">
                            <p for="fechaNac"><b>Fecha de Nacimiento de la Mascota:</b></p>
                            <p for="rNombreMascota">Fecha</p>
                        </div>
                    </div>
                    <div class="agg-vacuna">
                        <button type="button">Agregar Vacuna</button>
                    </div>            
                    <div class="formulario-info-content-mod">
                        <div class="vacuna-1">
                            
                            <div class="form-item">
                                <label for="nombreVacuna">Nombre Vacuna: </label>
                                <select name="nombreVacuna" id="nombreVacuna">
                                    <option disabled selected>opcion 3</option>
                                    <option value="opcion1">opcion1</option>
                                    <option value="opcion1">opcion1</option>
                                    <option value="opcion1">opcion1</option>
                                    <option value="opcion1">opcion1</option>
                                    <option value="opcion1">opcion1</option>
                                    <option value="opcion1">opcion1</option>
                                    <option value="opcion1">opcion1</option>
                                    <option value="opcion1">opcion1</option>
                                    <option value="opcion1">opcion1</option>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="dosisVacuna">Dosis de Vacuna: </label>
                                <select name="dosisVacuna" id="dosisVacuna">
                                    <option disabled selected>opcion 3</option>
                                    <option value="opcion1">opcion1</option>
                                    <option value="opcion1">opcion1</option>
                                    <option value="opcion1">opcion1</option>
                                    <option value="opcion1">opcion1</option>
                                    <option value="opcion1">opcion1</option>
                                    <option value="opcion1">opcion1</option>
                                    <option value="opcion1">opcion1</option>
                                    <option value="opcion1">opcion1</option>
                                    <option value="opcion1">opcion1</option>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="fechaVacunacion1">Fecha de Vacunacion: </label>
                                <input type="text" id="fechaVacunacion1" placeholder="12/04/2009" onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>
                            <div class="mod-button">
                                <button type="button">Modificar</button>
                            </div>
                        </div> 
                       
                    <div class="botones">
                        <div class="aceptar">
                            <button type="submit" id="boton">Aceptar</button>
                        </div>
                        <div class="cancelar">
                            <button type="submit" id="boton">Cancelar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="info-derecha"></div>
    </div>

    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.4.min.js"></script>
</body>
</html>