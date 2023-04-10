<?php
    session_start(); 
    $taxon_level = 'tbl_reinos';
    include('php/datos_taxonomia.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administrador </title>
        <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
        <style>
            
        </style>
    </head>
    <body>
        <?php include('nav-bar.php'); ?>
        <div class="container-fluid mt-5">
            <div class="row text-center mt-5">
                
                <?php include('nav-bar_admin.php'); ?>
                <section class="col ms-5 mt-5">
                    <h1> Reinos</h1>
                   <div class="text-start">

                        <div class="row text-center">
                            <div class="col d-flex align-items-center">
                                <header>
                                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#Nueva-Reino"> Nuevo </button>
                                </header>
                                <!-- Modal-->
                                <div class="modal fade" id="Nueva-Reino" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="ModalLabel"> Registrar Reino</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form id="form_nuevo">
                                                <div class="modal-body">
                                                    <!--Descripción-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Descripcion_Reino">Descripción</span>
                                                        <input type="text" class="form-control" id="nuevo_descripcion" placeholder="Descripción del Reino" aria-describedby="Descripcion_Reino"></textarea>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="borrar_formulario()">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <form class="form-floating ms-5 w-50" id="form_buscar" method="GET" action="">

                                        <input type="text" name="nombre_reino" class="form-control mb-4" id="floatingInput" placeholder="Buscar Administradores">
                                        <label for="floatingInput">Nombre del Reino</label>


                                </form>
                                <button class="btn btn-success ml-5" onclick="document.getElementById('form_buscar').submit();" >Buscar</button>              
                                       
                            </div>
                        
                               <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Código Reino</th>
                                        <th scope="col"> Descripción</th>
                                        <th scope="col"> Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if(isset($_GET['nombre_reino'])){
                                            $nombre = $_GET['nombre_reino'];
                                            $reinos_query = "select * from tbl_reinos where descripcion like '$nombre%' order by descripcion";
                                            $reinos = $pdo->prepare($reinos_query);
                                            $reinos->execute();
                                            $resultado_taxonomia = $reinos->fetchAll();
                                        }
                                        foreach ($resultado_taxonomia as $data): ?>
                                    <tr>
                                        <th scope="row"><?php echo $data['cod_reino']; ?></th>
                                        <td><?php echo $data['descripcion']; ?></td>
                                        <td>  
                                            <div class="btn-group">
                                                <button class="btn btn-success edit" value="<?php echo $data['cod_reino']; ?>" data-bs-toggle="modal" data-bs-target="#Modificar-Reino<?php echo $data['cod_reino']; ?>"><span>Modificar</span></button>

                                                <a href="php/reino/delete_reino.php?codigo=<?php echo $data['cod_reino']; ?>">
                                                    <button class="btn btn-danger"> Eliminar </button>
                                                </a>
                                            </div> 
                                            <!-- Modal-->
                                            <div class="modal fade" id="Modificar-Reino<?php echo $data['cod_reino']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="ModalLabel"> Modificar Reino</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="form_modificar<?php echo $data['cod_reino']; ?>">
                                                            <div class="modal-body">
                                                                <!--Descripción-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Descripcion_Reino">Descripción</span>
                                                                    <textarea class="form-control" id="descripcion_<?php echo $data['cod_reino']; ?>" placeholder="Descripción del Reino" aria-describedby="Descripcion_Reino"><?php echo $data['descripcion']; ?></textarea>
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
                </section>
                

            </div>


        </div>
        
        <script src="Bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery-3.6.4.min.js"></script>
        <script>


            function borrar_formulario(){
                const formulario = document.getElementById('form_nuevo');
                formulario.reset();
            }

            function recargar(){
                setTimeout(function(){
                    location.reload();
                }, 100);
            }

            $('#form_nuevo').submit(e => {
                e.preventDefault();
                let nuevo_descripcion = $('#nuevo_descripcion').val();

                if(nuevo_descripcion.length == 0){
                    alert('Debes completar todos los campos');
                }else{
                    $.ajax({
                        data: {nuevo_descripcion},
                        url: "php/reino/registrar_reino.php",
                        type: "POST",
                        error: function(request, status, error){
                            alert("ocurrio un error "+request.responseText)
                            console.log(error)
                            },

                        success: recargar()

                    })
                }
            })

            $(document).on('click','.edit', function(){

                let codigo_actual = $(this).val();
                $('#form_modificar'+codigo_actual).submit(e =>{
                    e.preventDefault();
                    let modificar_descripcion = $('#descripcion_'+codigo_actual).val();
                    
                    if(modificar_descripcion.length == 0){
                        alert("Debe rellenar todos los campos");
                    }else{

                        $.ajax({
                            data: {modificar_descripcion,codigo_actual},
                            url: "php/reino/modificar_reino.php",
                            type: "POST",

                            success: recargar()
                                
                            
                        })
                    }
                    })
                
            })
                      
                
        </script>

    </body>
</html>