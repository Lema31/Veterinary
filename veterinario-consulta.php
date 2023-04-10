<?php 
    session_start();
    include('php/Connect.php');
    $usuario = $_SESSION['veterinario'];
    
    $datos_usuario_query = 'select * from tbl_usuarios where login = ?';
    $datos_usuario = $pdo->prepare($datos_usuario_query);
    $datos_usuario->execute(array($usuario));
    $resultado_usuario = $datos_usuario->fetch();

    $cedula_veterinario = $resultado_usuario['cedula'];

    $datos_usuario = null;

    if(isset($_GET['cod_mascota'])){
        $cod_mascota = $_GET['cod_mascota'];
        $cedula_propietario = $_GET['cedula'];
        include('php/consulta/datos_consultas_modificar.php');
    }
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
    <body>
        <?php include('nav-bar.php') ?>
          
        <div class="container-fluid mt-5">
            <div class="row text-center mt-5">
                <aside class="col-1 pt-2 barra-lateral vh-100 me-3 mt-5" >
                    <h5 class="Menu"> Menu</h5>
                    <ul class="nav nav-pills justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="veterinario.php">Veterinario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="veterinario-propetarios.php">Buscar Mascota</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="veterinario-citas.php">Citas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="veterinario-consulta.php">Consulta</a>
                        </li>                                           
                    </ul>
                </aside>
                
                <div class="container mt-5">
                    <h1 class="mb-5">Consultas</h1>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="veterinario-propetarios.php?cedula_propietario=<?php echo $cedula_propietario; ?>" class="btn btn-primary mb-4">Regresar al propietario</a>
                        </div>
                    </div>
                    <div class="row">
                    
                      <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Fecha Consulta</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Tratamiento</th>
                            <th scope="col">Frecuencia Cardiaca</th>
                            <th scope="col">Fecuencia Respiratoria</th>
                            <th scope="col">Revision Oftalmologica</th>
                            <th scope="col">Temperatura</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($resultado_consultas_modificar as $consulta): ?>
                        <tr>
                            <td scope="row"><?php echo $consulta['fecha_consulta']; ?></td>
                            <td><?php echo $consulta['estado']; ?></td>
                            <td><?php echo $consulta['tratamiento']; ?></td>
                            <td><?php echo $consulta['frec_cardiaca']; ?></td>
                            <td><?php echo $consulta['frec_respiratoria']; ?></td>
                            <td><?php echo $consulta['rev_oftalmologica']; ?></td>
                            <td><?php echo $consulta['temperatura']; ?></td>
                            <td>  
                                <div class="btn-group">
                                    <button class="btn btn-success edit" value="<?php echo $consulta['cod_consulta']; ?>" data-bs-toggle="modal" data-bs-target="#Modificar-Consulta<?php echo $consulta['cod_consulta']; ?>"><span>Modificar</span></button>

                                    <a href="php/consulta/delete_consulta.php?codigo=<?php echo $consulta['cod_consulta']; ?>&cod_mascota=<?php echo $cod_mascota; ?>&cedula=<?php echo $cedula_propietario ?>">
                                        <button class="btn btn-danger">Eliminar</button>
                                    </a>

                                </div> 
                                <div class="modal fade" id="Modificar-Consulta<?php echo $consulta['cod_consulta']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="ModalLabel"> Datos de la Consulta</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form id="form_modificar<?php echo $consulta['cod_consulta']; ?>">
                                            <div class="modal-body text-start">
                                                <div class="row">
                                                      <!--Datos Generales de la Consulta-->
                                                    <div class="col-6">
                                                        
                                                        <div class="input-group mb-3">
                                                            <button class="btn btn-info" type="button" id="Fecha_Consulta">Fecha de la Consulta</button>
                                                            <input type="date" id="fecha_<?php echo $consulta['cod_consulta']; ?>" value='<?php echo $consulta['fecha_consulta']; ?>' class="form-control" placeholder="Fecha de la Consulta">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <button class="btn btn-info" type="text" id="Estado_Consulta">Estado</button>
                                                            <input type="text" id="estado_<?php echo $consulta['cod_consulta']; ?>" value='<?php echo $consulta['estado']; ?>' class="form-control" placeholder="Estado de la Consulta">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <button class="btn btn-info" type="text" id="Tratamiento_Consulta">Tratamiento</button>
                                                            <input type="text" id="tratamiento_<?php echo $consulta['cod_consulta']; ?>" value='<?php echo $consulta['tratamiento']; ?>' class="form-control" placeholder="Tratamiento de la Consulta">
                                                        </div>
                                                    </div>
    
                                                    <div class="col-6">
                                                        <div class="input-group mb-3">
                                                            <button class="btn btn-info" type="text" id="Frecuencia_Cardiaca">Frecuencia Cardiaca</button>
                                                            <input type="number" step="0.01" id="frec_car<?php echo $consulta['cod_consulta']; ?>" value='<?php echo $consulta['frec_cardiaca']; ?>' class="form-control" placeholder="Frecuencia Cardiaca">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <button class="btn btn-info" type="text" id="Frecuencia_Respiratoria">Frecuencia Respiratoria</button>
                                                            <input type="number" step="0.01" id="frec_res<?php echo $consulta['cod_consulta']; ?>" value='<?php echo $consulta['frec_respiratoria']; ?>' class="form-control" placeholder="Frecuencia respiratoria">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <button class="btn btn-info" type="text" id="Revision">Revision Oftalmologica</button>
                                                            <input type="text" id="revision_<?php echo $consulta['cod_consulta']; ?>" value='<?php echo $consulta['rev_oftalmologica']; ?>' class="form-control" placeholder="Revision oftalmologica">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <button class="btn btn-info" type="text" id="Temperatura">Temperatura</button>
                                                            <input type="text" id="temperatura_<?php echo $consulta['cod_consulta']; ?>" value='<?php echo $consulta['temperatura']; ?>' class="form-control" placeholder="Temperatura">
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
                        

                       

                        
                    </div>
                </div>                               
                

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

            $(document).on('click','.edit', function(){
                let codigo_consulta = $(this).val();

                $('#form_modificar'+codigo_consulta).submit(e =>{
                    e.preventDefault();
                    let fecha_consulta = $('#fecha_'+codigo_consulta).val();
                    let estado = $('#estado_'+codigo_consulta).val();
                    let tratamiento = $('#tratamiento_'+codigo_consulta).val();
                    let frec_cardiaca = $('#frec_car'+codigo_consulta).val();
                    let frec_respiratoria = $('#frec_res'+codigo_consulta).val();
                    let revision = $('#revision_'+codigo_consulta).val();
                    let temperatura = $('#temperatura_'+codigo_consulta).val();

                    if(fecha_consulta == '' || fecha_consulta == null || estado.length == 0 || tratamiento.length == 0 || frec_cardiaca.length == 0 || frec_respiratoria.length == 0 || revision.length == 0 || temperatura.length == 0){
                        alert("Debe rellenar todos los campos");
                    }else{

                        $.ajax({
                            data: {codigo_consulta,fecha_consulta,estado,tratamiento,frec_cardiaca,frec_respiratoria,revision,temperatura},
                            url: "php/consulta/modificar_consulta.php",
                            type: "POST",

                            success: recargar()
                                
                            
                        })
                    }
                })
            })
            
        </script>
    </body>
</html>