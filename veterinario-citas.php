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
    include('php/cita/datos_citas.php');
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
                <aside class="col-1 pt-2 barra-lateral vh-100 me-3 mt-5 " >
                    <h5 class="Menu"> Menu</h5>
                    <ul class="nav nav-pills justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="veterinario.php">Veterinario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="veterinario-propetarios.php">Buscar Mascota</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="veterinario-citas.php">Citas</a>
                      </li>
                      <!-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="veterinario-consulta.php">Consulta</a>
                      </li> -->
                    
                    </ul>
                </aside>
                
                <div class="container mt-5">
                    <h1>Citas</h1>
                    <div class="row">
                    
                      <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Fecha Cita</th>
                            <th scope="col">Número del consultorio</th>
                            <th scope="col">Cedula del propietario</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Nombre de la mascota</th>
                            <th scope="col">especie</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($resultado_citas as $cita): ?>
                        <tr>
                            <td scope="row"><?php echo $cita['fecha_cita']; ?></td>
                            <td><?php echo $cita['num_consultorio']; ?></td>
                            <td><?php echo $cita['cedula']; ?></td>
                            <td><?php echo $cita['nombre']; ?></td>
                            <td><?php echo $cita['apellido']; ?></td>
                            <td><?php echo $cita['nombre_mascota']; ?></td>
                            <td><?php echo $cita['descripcion_esp']; ?></td>
                            <td>  
                                <div class="btn-group">
                                    <?php $codigo = $cita['fecha_cita'].'_'.$cita['cod_mascota']; ?>
                                    <button class="btn btn-success edit" value="<?php echo $codigo; ?>" data-bs-toggle="modal" data-bs-target="#Modificar-Cita<?php echo $codigo; ?>"><span>Modificar</span></button>
                                    <a href="php/cita/delete_cita.php?codigo=<?php echo $cita['cod_mascota']; ?>&fecha=<?php echo $cita['fecha_cita']; ?>">
                                        <button class="btn btn-danger"> Eliminar </button>
                                    </a>
                                </div> 
                                <!-- Modal-->
                                <div class="modal fade" id="Modificar-Cita<?php echo $codigo; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="ModalLabel"> Modificar Cita</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form id="form_modificar<?php echo $codigo; ?>">
                                                <div class="modal-body">
                                                    <!--Fecha de Cita-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Fecha_Cita">Fecha de la Cita</span>
                                                        <input type="date" id="fecha_<?php echo $codigo ?>" value="<?php echo $cita['fecha_cita']; ?>" class="form-control" placeholder="Ingresar fecha" >
                                                    </div>
                                                    <!--Número del Consultorio-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Numero_Consultorio">Numero Consultorio</span>
                                                        <input type="number" value="<?php echo $cita['num_consultorio']; ?>" id="consultorio_<?php echo $codigo?>" class="form-control" placeholder="Numero Consultorio" aria-describedby="Descripcion_Reino"></input>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
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
                let codigo = $(this).val();
                $('#fecha_'+codigo).attr('min',getCurrentDateFormatted());

                $('#form_modificar'+codigo).submit(e =>{
                    e.preventDefault();
                    let fecha_cita = $('#fecha_'+codigo).val();
                    let num_consultorio = $('#consultorio_'+codigo).val();

                    if(fecha_cita == '' || fecha_cita == null || num_consultorio.length == 0){
                        alert("Debe rellenar todos los campos");
                    }else{

                        $.ajax({
                            data: {codigo,fecha_cita,num_consultorio},
                            url: "php/cita/modificar_cita.php",
                            type: "POST",
                            error: function(request, status, error){
                            alert("ocurrio un error "+request.responseText)
                            console.log(error)
                            },

                            success: recargar()
                                
                            
                        })
                    }
                })
            })
            
        </script>
    </body>
</html>