<?php 

    session_start();
    include('php/perfil_propietario/datos_propietario.php');
    include('php/perfil_propietario/datos_mascotas_propietario.php');

 ?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Propietario </title>
        <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    </head>
    <style type="text/css">
        table td{
            word-break: break-all !important;
        }
    </style>
    <body>
        <?php include('nav-bar.php') ?>
          
        <div class="container-fluid mt-5">
            <div class="row mt">            
                <section class="col-12 pt-2 ms-5">
                    <div class="text-center">
                        <h2> Datos del Propietario</h2>
                    </div>
                    <div class="row text-start">
                        <p><b>Cédula: </b><?php echo $resultado_propietario['cedula']; ?></p>
                        <p><b>Nombre: </b><?php echo $resultado_propietario['nombre']; ?></p>
                        <p><b>Apellido: </b><?php echo $resultado_propietario['apellido']; ?></p>
                        <p><b>Teléfono: </b><?php echo $resultado_propietario['telefono']; ?></p>
                        <p><b>Dirección: </b><?php echo $resultado_propietario['direccion']; ?></p>
                        
                    </div>
                    
                    <div class="my-3">
                        <h2>Datos de las Mascotas</h2>
                    </div>
                    
                    
                     <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha de nacimiento</th>
                                <th scope="col">Especie</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($resultado_mascotas as $mascota): 
                            include('php/perfil_propietario/datos_cita.php');
                            include('php/perfil_propietario/datos_consultas.php');
                            include('php/perfil_propietario/medicinas_recetadas.php');
                            ?>
                        <tr>
                            <td scope="row"><?php echo $mascota['nombre']; ?></td>
                            <td><?php echo $mascota['fecha_nacimiento']; ?></td>
                            <td><?php echo $mascota['descripcion_esp']; ?></td>

                            <td>  
                                <div class="btn-group">
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Datos_Cita<?php echo $mascota['cod_mascota']; ?>">Cita</button>

                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Consulta<?php echo $mascota['cod_mascota']; ?>"> Consulta</button>

                                    <a class="btn btn-secondary" target="_blank" href="tarjeta_vacunacion_propietario.php?codigo=<?php echo $mascota['cod_mascota']; ?>">Tarjeta de Vacunación</a>

                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Medicina<?php echo $mascota['cod_mascota']; ?>">Medicinas recetadas</button>
                                </div>
                                <!-- Modal de la Cita-->
                                <div class="modal fade" id="Datos_Cita<?php echo $mascota['cod_mascota']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="ModalLabel"> Datos de la Cita</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php if($resultado_cita): ?>
                                                    <p><b>Fecha Cita: </b><?php echo $resultado_cita['fecha_cita'] ?></p>
                                                    <p><b>Número de Consultorio: </b><?php echo $resultado_cita['num_consultorio'] ?></p>
                                                <?php else: ?>
                                                    <h4>No se encuentra ninguna cita pendiente para esta mascota</h4>
                                                <?php endif ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!--Modal para la Consulta-->
                                <div class="modal fade" id="Consulta<?php echo $mascota['cod_mascota']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="ModalLabel"> Datos de la Consulta</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Fecha Consulta</th>
                                                        <th scope="col">Estado</th>
                                                        <th scope="col">Tratamiento</th>
                                                        <th scope="col">Frecuencia Cardiaca</th>
                                                        <th scope="col">Fecuencia Respiratoria</th>
                                                        <th scope="col">Revision oftalmologica</th>
                                                        <th scope="col">Temperatura</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach($resultado_consultas as $consulta): ?>
                                                    <tr>
                                                        <td scope="row"><?php echo $consulta['fecha_consulta'] ?></td>
                                                        <td><?php echo $consulta['estado'] ?></td>
                                                        <td><?php echo $consulta['tratamiento'] ?></td>
                                                        <td><?php echo $consulta['frec_cardiaca'] ?></td>
                                                        <td><?php echo $consulta['frec_respiratoria'] ?></td>
                                                        <td><?php echo $consulta['rev_oftalmologica'] ?></td>
                                                        <td><?php echo $consulta['temperatura'] ?></td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Modal para las Medicinas-->
                                <div class="modal fade" id="Medicina<?php echo $mascota['cod_mascota']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="ModalLabel">Medicinas recetadas</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Fecha</th>
                                                        <th scope="col">Indicaciones</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach($resultado_medicinas as $medicina): ?>
                                                    <tr>
                                                        <td scope="row"><?php echo $medicina['nombre'] ?></td>
                                                        <td><?php echo $medicina['fecha_consulta'] ?></td>
                                                        <td><?php echo $medicina['indicaciones'] ?></td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                        </tbody>
                    </table>
                </section>
            </div>




        </div>
        
        <script src="Bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery-3.6.4.min.js"></script>

    </body>
</html>