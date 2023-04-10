<?php
    session_start(); 
    include('php/vacuna/datos_vacunas_admin.php');
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
                <section class="col  ms-5 mt-5">
                   <div class="text-start">
                        <div class="row text-center">
                            <h1>Vacunas</h1>
                            <div class="col d-flex align-items-center">
                                <header>
                                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#Nueva-Vacuna"> Nuevo </button>
                                </header>
                                <!-- Modal-->
                                <div class="modal fade" id="Nueva-Vacuna" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="ModalLabel"> Modificar Vacuna</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form id="form_nuevo">
                                                <div class="modal-body">
                                                    <!-- Nombre de la vacuna -->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Nombre_Vacuna">Nombre:</span>
                                                        <input type="text" id="nuevo_nombre" class="form-control" placeholder="Ingresar Nombre" aria-describedby="Nombre_Vacuna" required>
                                                    </div>
                                                    <!--Descripción-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Descripcion_Vacuna">Descripción</span>
                                                        <textarea class="form-control" id="nuevo_descripcion" placeholder="Descripción del Vacuna" aria-describedby="Descripcion_Vacuna" required></textarea>
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

                                        <input type="text" name="nombre_vacuna" class="form-control mb-4" id="floatingInput" placeholder="Buscar Administradores">
                                        <label for="floatingInput">Nombre de la Vacuna</label>


                                </form>
                                <button class="btn btn-success ml-5" onclick="document.getElementById('form_buscar').submit();" >Buscar</button>
            
                            </div>
                        
                               <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Código Vacuna </th>
                                        <th scope="col">Nombre </th>
                                        <th scope="col">Descripcion </th>
                                        <th scope="col"> Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      <?php     
                                        if(isset($_GET['nombre_vacuna'])){
                                            $nombre = $_GET['nombre_vacuna'];
                                            $vacunas_query = "select * from tbl_vacunas where nombre like '$nombre%' order by nombre";
                                            $vacunas = $pdo->prepare($vacunas_query);
                                            $vacunas->execute();
                                            $resultado_vacunas = $vacunas->fetchAll();
                                        }
                                        foreach ($resultado_vacunas as $data): ?>
                                    <tr>
                                        <th scope="row"><?php echo $data['cod_vacuna']; ?></th>
                                        <td><?php echo $data['nombre']; ?></td>
                                        <td><?php echo $data['descripcion']; ?></td>
                                        <td>  
                                            <div class="btn-group">
                                                <button class="btn btn-success edit" value="<?php echo $data['cod_vacuna'] ?>" data-bs-toggle="modal" data-bs-target="#Modificar-Vacuna<?php echo $data['cod_vacuna'] ?>"><span>Modificar</span></button>
                                                <a href="php/vacuna/delete_vacuna.php?codigo=<?php echo $data['cod_vacuna'] ?>">
                                                    <button class="btn btn-danger"> Eliminar </button>
                                                </a>
                                            </div> 
                                            <!-- Modal-->
                                            <div class="modal fade" id="Modificar-Vacuna<?php echo $data['cod_vacuna'] ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="ModalLabel"> Modificar Vacuna</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="form_modificar<?php echo $data['cod_vacuna'] ?>">
                                                            <div class="modal-body">
                                                                <!--Nombre-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Nombre_Vacuna">Nombre</span>
                                                                    <input type="text" id="nombre_<?php echo $data['cod_vacuna'] ?>" class="form-control" placeholder="Ingresar Nombre" value="<?php echo $data['nombre'] ?>" aria-describedby="Nombre_Vacuna">
                                                                </div>
                                                                <!--Descripción-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Descripcion_Vacuna">Descripción</span>
                                                                    <textarea class="form-control" id="descripcion_<?php echo $data['cod_vacuna'] ?>" placeholder="Descripción del Vacuna" aria-describedby="Descripcion_Vacuna" cols="40" rows="7"><?php echo $data['descripcion'] ?></textarea>
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
                }, 200);
            }

            $('#form_nuevo').submit(e => {
                e.preventDefault();
                let nuevo_descripcion = $('#nuevo_descripcion').val();
                let nuevo_nombre = $('#nuevo_nombre').val();

                if(nuevo_descripcion.length == 0 || nuevo_nombre.length == 0){
                    alert('Debes completar todos los campos');
                }else{
                    $.ajax({
                        data: {nuevo_descripcion,nuevo_nombre},
                        url: "php/vacuna/registrar_vacuna.php",
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
                    let modificar_nombre = $('#nombre_'+codigo_actual).val();

                    if(modificar_descripcion.length == 0 || modificar_nombre.length == 0){
                        alert("Debe rellenar todos los campos");
                    }else{

                        $.ajax({
                            data: {modificar_descripcion,modificar_nombre,codigo_actual},
                            url: "php/vacuna/modificar_vacuna.php",
                            type: "POST",

                            success: recargar()
                                
                            
                        })
                    }
                    })
                
            })
                
        </script>

    </body>
</html>