<?php 
    session_start();
    include('php/Connect.php');

    $usuario = $_SESSION['veterinario'];
    
    $datos_usuario_query = 'select * from tbl_usuarios where login = ?';
    $datos_usuario = $pdo->prepare($datos_usuario_query);
    $datos_usuario->execute(array($usuario));
    $resultado_usuario = $datos_usuario->fetch();

    $cedula_veterinario = $resultado_usuario['cedula'];

    $vacunas_query = 'select * from tbl_vacunas order by nombre';
    $vacunas = $pdo->prepare($vacunas_query);
    $vacunas->execute();
    $tbl_vacunas = $vacunas->fetchAll();

    $medicinas_query = 'select * from tbl_medicinas order by nombre';
    $medicinas = $pdo->prepare($medicinas_query);
    $medicinas->execute();
    $tbl_medicinas = $medicinas->fetchAll();

    $vacunas = null;
    $medicinas = null;
    $datos_usuario = null;

 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Veterinario</title>
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
            <div class="row text-center mt-5">
                
                <aside class="col-1 pt-2 barra-lateral vh-100 me-3 mt-5">
                    <h5 class="Menu"> Menu</h5>
                    <ul class="nav nav-pills text-center justify-content-start">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="veterinario.php">Veterinario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="veterinario-propetarios.php"> Buscar Mascota</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="veterinario-citas.php">Cita</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="veterinario-consulta.php">Consulta</a>
                        </li> -->
        
                    </ul>
                </aside>
                
                <section class="col ms-5 mt-5">
                    <h1 class="mb-4"> Buscar Mascota</h1>

                   <div class="text-start">
                        <div class="row text-center">
                            <div class="col d-flex justify-content-center">
                                <form class="form-floating ms-5 w-100" action="" method="GET" id="form_buscar">

                                    <input type="number" class="form-control" id="cedula_propietario" name="cedula_propietario" placeholder="Buscar Administradores">
                                    <label for="floatingInput">Buscar por cédula del Propietario</label>

                                </form>
                                <button class="btn btn-primary ml-4" onclick="document.getElementById('form_buscar').submit();">Buscar</button>                                      
                            </div>
                            <?php if(isset($_GET['cedula_propietario'])){ 
                                $cedula = $_GET['cedula_propietario'];
                                $propietario_query = 'select * from tbl_personas as a inner join tbl_propietarios as b on a.cedula = b.cedula where b.cedula = ?';
                                $propietario = $pdo->prepare($propietario_query);
                                $propietario->execute(array($cedula));
                                $resultado = $propietario->fetch();
                                if($resultado){
                                    $resultado_propietario = $resultado;
                                }
                            }
                            if(isset($resultado_propietario) and $resultado_propietario != null):
                                ?>

                                <div class="row mt-4" id="datos_propietario">
                                    <div>
                                        <h1>Datos del Propietario</h1>
                                    </div>
                                    <div class="text-start p-2 ">
                                        <p><b>Cédula: </b><?php echo $resultado_propietario['cedula']; ?></p>
                                        <p><b>Nombre: </b><?php echo $resultado_propietario['nombre']; ?></p>
                                        <p><b>Apellido: </b><?php echo $resultado_propietario['apellido']; ?></p>
                                        <p><b>Teléfono: </b><?php echo $resultado_propietario['telefono']; ?></p>
                                        <p><b>Dirección: </b><?php echo $resultado_propietario['direccion']; ?></p>
                                    </div>

                                </div>
                                <table class="table mt-3" id="tabla_mascotas">
                                    <thead>
                                        <h3 class="" id="titulo_mascotas">Mascotas del Propietario</h3>
                                        <tr>
                                            <th>Código Mascota</th>
                                            <th> Nombre</th>
                                            <th>Fecha de Nacimiento</th>
                                            <th>Especie</th>
                                            <th> Acciones</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <?php 
                                                include('php/datos_mascotas.php');
                                                foreach($resultado_mascotas as $data):
                                             ?>
                                            <tr>
                                                <td><?php echo $data['cod_mascota']; ?></td>
                                                <td><?php echo $data['nombre']; ?></td>
                                                <td><?php echo $data['fecha_nacimiento']; ?></td>
                                                <td><?php echo $data['descripcion_esp']; ?></td>
                                                <td class="justify-content-end">

                                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_Ultimas_Consultas<?php echo $data['cod_mascota']; ?>"> Últimas consultas</button>

                                                    <a class="btn btn-primary" href="tarjeta_vacunacion_veterinario2.php?codigo=<?php echo $data['cod_mascota']; ?>" target="_blank">Carta de Vacunación</a>

                                                    <button class="btn btn-success new_cita" value="<?php echo $data['cod_mascota']; ?>" data-bs-toggle="modal" data-bs-target="#Modal_Cita<?php echo $data['cod_mascota']; ?>"><span>Hacer cita</span></button>

                                                    <button class="btn btn-success new_consulta" value="<?php echo $data['cod_mascota']; ?>"data-bs-toggle="modal" data-bs-target="#Modal_Consulta<?php echo $data['cod_mascota']; ?>"><span>Hacer consulta</span></button>

                                                    <!--Modal para las ultimas consultas-->
                                                    <div class="modal fade" id="Modal_Ultimas_Consultas<?php echo $data['cod_mascota']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header text-center">
                                                                    <h5 class="modal-title" id="ModalLabel"> Datos de las ultimas consultas</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-start">
                                                                    <div class="row">
                                                                        <!--Datos Generales de la Consulta-->
                                                                        <table class="table mt-3" id="tabla_mascotas">
                                                                        <thead>
                                                                            
                                                                            <tr>
                                                                                <th>Fecha</th>
                                                                                <th> Estado</th>
                                                                                <th>Tratamiento</th>
                                                                                <th> Frecuencia cardiaca</th>
                                                                                <th> Frecuencia respiratoria</th>
                                                                                <th> Revision oftalmologica</th>
                                                                                <th> Temperatura</th>
                                                                            </tr>
                                                                        </thead>
                                                                            <tbody>
                                                                                <?php 
                                                                                    $cod_mascota = $data['cod_mascota'];
                                                                                    include('php/datos_consultas.php');
                                                                                    foreach($resultado_consultas as $consulta):
                                                                                 ?>
                                                                                <tr>
                                                                                    <th><?php echo $consulta['fecha_consulta']; ?></th>
                                                                                    <th><?php echo $consulta['estado']; ?></th>
                                                                                    <th><?php echo $consulta['tratamiento']; ?></th>
                                                                                    <th><?php echo $consulta['frec_cardiaca']; ?></th>
                                                                                    <th><?php echo $consulta['frec_respiratoria']; ?></th>
                                                                                    <th><?php echo $consulta['rev_oftalmologica']; ?></th>
                                                                                    <th><?php echo $consulta['temperatura']; ?></th>
                                                                                </tr>
                                                                            <?php endforeach ?>
                                                                            </tbody>
                                                                        </table>

                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                                <a class="btn btn-success" href="veterinario-consulta.php?cod_mascota=<?php echo $cod_mascota ?>&cedula=<?php echo $resultado_propietario['cedula'] ?>">Modificar</a>
                                                                            </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Modal para la  Consulta-->
                                                    <div class="modal fade" id="Modal_Consulta<?php echo $data['cod_mascota']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header text-center">
                                                                    <h5 class="modal-title" id="ModalLabel"> Datos de la Consulta</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form id="form_consulta<?php echo $data['cod_mascota']; ?>">
                                                                <div class="modal-body text-start">
                                                                    <div class="row">
                                                                          <!--Datos Generales de la Consulta-->
                                                                            
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text" id="Estado">Estado</span>
                                                                                <input type="text" id="estado<?php echo $data['cod_mascota']; ?>" class="form-control" placeholder="Estado de la Consulta">
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text">Tratamiento</span>
                                                                                <input type="text" id="tratamiento<?php echo $data['cod_mascota']; ?>" class="form-control" placeholder="Tratamiento de la Consulta">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-6">
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text">Frecuencia cardiaca</span>
                                                                                <input type="number" id="frec_c<?php echo $data['cod_mascota']; ?>" class="form-control" placeholder="Frecuencia Cardiaca">
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text">Frecuencia respiratoria</span>
                                                                                <input type="number" id="frec_r<?php echo $data['cod_mascota']; ?>" class="form-control" placeholder="Frecuencia respiratoria">
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text">Revision oftalmologica</span>
                                                                                <textarea class="form-control" id="revision<?php echo $data['cod_mascota']; ?>" placeholder="Revision oftalmologica"></textarea>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text">Temperatura</span>
                                                                                <input type="text" id="temperatura<?php echo $data['cod_mascota']; ?>" class="form-control" placeholder="Temperatura">
                                                                            </div>
                                                                            <h4>Vacunas (opcional)</h4>
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-8">
                                                                                    <select class="form-control" id="cod_vacuna1<?php echo $data['cod_mascota']; ?>">
                                                                                        <option value="" selected>Seleccione una vacuna</option>
                                                                                        <?php foreach($tbl_vacunas as $vacuna): ?>

                                                                                            <option value="<?php echo $vacuna['cod_vacuna'] ?>"><?php echo $vacuna['nombre'] ?></option>
                                                                                        <?php endforeach ?>

                                                                                    </select>
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                    <input type="text" id="dosis1_<?php echo $data['cod_mascota']; ?>" class="form-control" placeholder="dosis">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-8">
                                                                                    <select class="form-control" id="cod_vacuna2<?php echo $data['cod_mascota']; ?>">
                                                                                        <option value="" selected>Seleccione una vacuna</option>

                                                                                    </select>
                                                                                </div>
                                                                                
                                                                                <div class="col-md-4">
                                                                                    <input type="text" id="dosis2_<?php echo $data['cod_mascota']; ?>" class="form-control" placeholder="dosis">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-8">
                                                                                    <select class="form-control" id="cod_vacuna3<?php echo $data['cod_mascota']; ?>">
                                                                                        <option value="" selected>Seleccione una vacuna</option>

                                                                                    </select>
                                                                                </div>
                                                                                
                                                                                <div class="col-md-4">
                                                                                    <input type="text" id="dosis3_<?php echo $data['cod_mascota']; ?>" class="form-control" placeholder="dosis">
                                                                                </div>
                                                                            </div>
                                                                            <h4>Medicina (opcional)</h4>
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-7">
                                                                                    <select class="form-control" id="cod_medicina<?php echo $data['cod_mascota']; ?>">
                                                                                        <option value="" selected>Seleccione medicina</option>
                                                                                        <?php foreach($tbl_medicinas as $medicina): ?>

                                                                                            <option value="<?php echo $medicina['cod_medicina'] ?>"><?php echo $medicina['nombre'] ?></option>
                                                                                        <?php endforeach ?>

                                                                                    </select>
                                                                                </div>

                                                                                <div class="col-md-5">
                                                                                    <textarea id="indicaciones_<?php echo $data['cod_mascota']; ?>" class="form-control" placeholder="Indicaciones"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                        <button type="submit" class="btn btn-success">Enviar</button>
                                                                     </div>
                                                                    </form>
                                                                    </div>
                                                                </div>

                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Modal para hacer la cita-->
                                                    <div class="modal fade" id="Modal_Cita<?php echo $data['cod_mascota']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header text-center">
                                                                    <h5 class="modal-title" id="ModalLabel"> Hacer cita</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form id="form_cita<?php echo $data['cod_mascota']; ?>">
                                                                <div class="modal-body text-start">
                                                                    <div class="row justify-content-center">

                                                                        <!--Datos Generales de la Cita-->
                                                                        <div class="col-6">
                                                                            <div class="input-group mb-3">
                                                                                <button class="btn btn-info" type="button" id="Fecha_Cita">Fecha de la cita</button>
                                                                                <input type="date" id="fecha_cita<?php echo $data['cod_mascota']; ?>" class="form-control" placeholder="">
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <button class="btn btn-info" type="button" id="Numero_Consultorio">Número de Consultorio</button>
                                                                                <input type="number" id="num_consultorio<?php echo $data['cod_mascota']; ?>" class="form-control" placeholder="Numero del consultorio">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                    <button type="submit" class="btn btn-success">Enviar</button>
                                                                 </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>     
                                </table>

                                

                                

                                
                            
                            <?php elseif(isset($_GET['cedula_propietario']) and !isset($resultado_propietario)): ?>
                                <h3 class="mt-4">No se ha encontrado ningun propietario con la cedula indicada.<br> Vuelva a intentarlo</h3>
                            <?php endif ?>
                        </div>
                   </div>
                </section>
                

            </div>


        </div>
        <script src="Bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery-3.6.4.min.js"></script>
        <script >
            const getCurrentDateFormatted = () => new Date(new Date().getTime() - (new Date().getTimezoneOffset() * 60 * 1000)).toISOString().split('T')[0]

            function recargar(){
                setTimeout(function(){
                    location.reload();
                }, 300);
            }

            $(document).on('click','.new_consulta', function(){
                let cod_mascota_actual = $(this).val();
                let cedula_vet = <?php echo $cedula_veterinario ; ?>;

                $('#cod_vacuna1'+cod_mascota_actual).change(function(){
                    let cod_vacuna1 = $('#cod_vacuna1'+cod_mascota_actual).val();
                    
                    $.ajax({
                        data: {cod_vacuna1},
                        url: 'php/select_vacuna.php',
                        type: 'POST',

                        error: function(request, status, error){
                            alert("ocurrio un error "+request.responseText)
                            console.log(error)
                            },
                        success: function(response){
                            $('#cod_vacuna2'+cod_mascota_actual).html(response);
                            $('#cod_vacuna3'+cod_mascota_actual).html("<option value=''>Seleccione una vacuna</option>");
                        }
                    })
                })

                $('#cod_vacuna2'+cod_mascota_actual).change(function(){
                    let cod_vacuna1 = $('#cod_vacuna1'+cod_mascota_actual).val();
                    let cod_vacuna2 = $('#cod_vacuna2'+cod_mascota_actual).val();
                    
                    $.ajax({
                        data: {cod_vacuna1,cod_vacuna2},
                        url: 'php/select_vacuna.php',
                        type: 'POST',

                        error: function(request, status, error){
                            alert("ocurrio un error "+request.responseText)
                            console.log(error)
                            },
                        success: function(response){
                            $('#cod_vacuna3'+cod_mascota_actual).html(response);
                        }
                    })
                })

                $('#form_consulta'+cod_mascota_actual).submit(e =>{
                    e.preventDefault();
                    let fecha_consulta = getCurrentDateFormatted();
                    let estado = $('#estado'+cod_mascota_actual).val();
                    let tratamiento = $('#tratamiento'+cod_mascota_actual).val();
                    let frec_cardiaca = $('#frec_c'+cod_mascota_actual).val();
                    let frec_respiratoria = $('#frec_r'+cod_mascota_actual).val();
                    let revision = $('#revision'+cod_mascota_actual).val();
                    let temperatura = $('#temperatura'+cod_mascota_actual).val();
                    let cod_vacuna1 = $('#cod_vacuna1'+cod_mascota_actual).val();
                    let cod_vacuna2 = $('#cod_vacuna2'+cod_mascota_actual).val();
                    let cod_vacuna3 = $('#cod_vacuna3'+cod_mascota_actual).val();
                    let dosis1 = $('#dosis1_'+cod_mascota_actual).val();
                    let dosis2 = $('#dosis2_'+cod_mascota_actual).val();
                    let dosis3 = $('#dosis3_'+cod_mascota_actual).val();
                    let cod_medicina = $('#cod_medicina'+cod_mascota_actual).val();
                    let indicaciones = $('#indicaciones_'+cod_mascota_actual).val();

                    if(fecha_consulta == '' || fecha_consulta == null || estado.length == 0 || tratamiento.length == 0 || frec_cardiaca.length == 0 || frec_respiratoria.length == 0 || revision.length == 0 || temperatura.length == 0){
                        alert("Debe rellenar todos los campos");
                    }else{

                        $.ajax({
                            data: {cod_mascota_actual,cedula_vet,fecha_consulta,estado,tratamiento,frec_cardiaca,frec_respiratoria,revision,temperatura,cod_vacuna1,cod_vacuna2,cod_vacuna3,dosis1,dosis2,dosis3,cod_medicina,indicaciones},
                            url: "php/consulta/registrar_consulta.php",
                            type: "POST",

                            success: function(response){
                                if(response){
                                    alert(response);
                                }else{
                                    recargar();
                                }
                            }
                        
                        })
                            
                    }
                })
            })

            $(document).on('click','.new_cita', function(){
                let cod_mascota_actual = $(this).val();
                let cedula_vet = <?php echo $cedula_veterinario ; ?>;
                let cedula_propietario = <?php echo $resultado_propietario['cedula']; ?>;
                $('#fecha_cita'+cod_mascota_actual).attr('min',getCurrentDateFormatted());

                $('#form_cita'+cod_mascota_actual).submit(e =>{
                    e.preventDefault();
                    let fecha_cita = $('#fecha_cita'+cod_mascota_actual).val();
                    let num_consultorio = $('#num_consultorio'+cod_mascota_actual).val();

                    if(fecha_cita == '' || fecha_cita == null || num_consultorio.length == 0){
                        alert("Debe rellenar todos los campos");
                    }else{

                        $.ajax({
                            data: {cod_mascota_actual,cedula_vet,cedula_propietario,fecha_cita,num_consultorio},
                            url: "php/cita/registrar_cita.php",
                            type: "POST",

                            success: recargar()
                                
                            
                        })
                    }
                })
            })
            
        </script>

    </body>
</html>