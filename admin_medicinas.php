<?php
    session_start(); 
    include("php/medicina/datos_medicinas_admin.php");
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
                    <h1> Medicinas </h1>
                   <div class="text-start">

                        <div class="row text-center">
                            <div class="col d-flex align-items-center">
                                <header>
                                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#Nueva-Medicina"> Nuevo </button>
                                </header>

                                <!-- Modal-->
                                <div class="modal fade" id="Nueva-Medicina" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="ModalLabel"> Registrar Medicina</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form id="form_nuevo">
                                                <div class="modal-body">
                                                    
                                                        <!--Nombre de la Medicina-->
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="Nombre de la Medicina">Nombre</span>
                                                            <input type="text" id="nuevo_nombre" class="form-control" placeholder="Ingresar Nombre" aria-describedby="Nombre de la Medicina" >
                                                        </div>
                                                         <!--Descripción-->
                                                         <div class="input-group mb-3">
                                                            <span class="input-group-text" id="Descripcion Medicina">Descripción</span>
                                                            <textarea class="form-control"  id="nuevo_descripcion" placeholder="Descripción de la Medicina" aria-describedby="Descripción Medicina" ></textarea>
                                                        </div> 
                                                        <!--Cantidad Disponible-->
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="Cantidad Disponible">Cant. Medicinas Disponibles</span>
                                                            <input type="number" id="nuevo_cantidad" class="form-control" placeholder="Cantidad disponible" aria-describedby="Cantidad Disponible" >
                                                        </div> 
                                                        <!--Costo-->
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="Costo">Costo de la Medicina</span>
                                                            <input type="number" id="nuevo_costo" class="form-control" placeholder="Ingrese Costo" aria-describedby="Costo" >
                                                        </div>
                                                                                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="borrar_formulario()">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <form class="form-floating ms-5 w-50" id="form_buscar" method="GET" action="">

                                        <input type="text" name="nombre_medicina" class="form-control mb-4" id="floatingInput" placeholder="Buscar Administradores">
                                        <label for="floatingInput">Nombre de la Medicina</label>


                                </form>
                                <button class="btn btn-success ml-5" onclick="document.getElementById('form_buscar').submit();" >Buscar</button>
                                                                           
                            </div>
                        
                               <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Código Medicina</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Cantidad Disponible</th>
                                        <th scope="col">Costo </th>
                                        <th scope="col"> Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if(isset($_GET['nombre_medicina'])){
                                            $medicina = $_GET['nombre_medicina'];
                                            $medicinas_query = "select * from tbl_medicinas where nombre like '$medicina%' order by nombre";
                                            $medicinas = $pdo->prepare($medicinas_query);
                                            $medicinas->execute();
                                            $resultado_medicinas = $medicinas->fetchAll();
                                        }
                                            foreach ($resultado_medicinas as $data): ?>
                                    <tr>
                                        <th scope="row"><?php echo $data['cod_medicina']; ?></th>
                                        <td><?php echo $data['nombre']; ?></td>
                                        <td><?php echo $data['descripcion']; ?></td>
                                        <td><?php echo $data['cant_disponible']; ?></td>
                                        <td><?php echo $data['costo']; ?></td>
                                        <td>  
                                            <div class="btn-group">
                                                <button class="btn btn-success edit" value="<?php echo $data['cod_medicina']; ?>" data-bs-toggle="modal" data-bs-target="#Modificar-Medicina<?php echo $data['cod_medicina']; ?>"><span>Modificar</span></button>
                                                <a href="php/medicina/delete_medicina.php?codigo=<?php echo $data['cod_medicina']; ?>">
                                                    <button class="btn btn-danger"> Eliminar </button>
                                                </a>
                                            </div>
                                            
                                            <!-- Modal-->
                                            <div class="modal fade" id="Modificar-Medicina<?php echo $data['cod_medicina']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="ModalLabel"> Modificar Medicina</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="form_modificar<?php echo $data['cod_medicina']; ?>">
                                                            <div class="modal-body">
                                                                <!--Nombre de la Medicina-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Nombre de la Medicina">Nombre Medicina</span>
                                                                    <input type="text" id="nombre_<?php echo $data['cod_medicina']; ?>" class="form-control" placeholder="Ingresar Nombre" value="<?php echo $data['nombre']; ?>" aria-describedby="Nombre de la Medicina">
                                                                </div>
                                                                <!--Descripción-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Descripcion Medicina">Descripción</span>
                                                                    <textarea class="form-control" id="descripcion_<?php echo $data['cod_medicina']; ?>" placeholder="Descripción de la Medicina" aria-describedby="Descripción Medicina"><?php echo $data['descripcion']; ?></textarea>
                                                                </div> 
                                                                <!--Cantidad Disponible-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Cantidad Disponible">Cant. Medicinas Disponibles</span>
                                                                    <input type="number" id="cant_<?php echo $data['cod_medicina']; ?>" class="form-control" placeholder="Cantidad disponible" value="<?php echo $data['cant_disponible']; ?>" aria-describedby="Cantidad Disponible">
                                                                </div> 
                                                                <!--Costo-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Costo">Costo de la Medicina</span>
                                                                    <input type="number" id="costo_<?php echo $data['cod_medicina']; ?>" class="form-control" placeholder="Ingrese Costo" value="<?php echo $data['costo']; ?>" aria-describedby="Costo">
                                                                </div>
    
    
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                <button type="submit" value="<?php echo $data['cod_medicina']; ?>" class="btn btn-primary"><span>Guardar cambios</span></button>
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
                }, 300);
            }

            $('#form_nuevo').submit(e => {
                e.preventDefault();
                let nuevo_descripcion = $('#nuevo_descripcion').val();
                let nuevo_nombre = $('#nuevo_nombre').val();
                let nuevo_cantidad = $('#nuevo_cantidad').val();
                let nuevo_costo = $('#nuevo_costo').val();

                if(nuevo_descripcion.length == 0 || nuevo_nombre.length == 0 || nuevo_cantidad.length == 0 || nuevo_costo.length == 0){
                    alert('Debes completar todos los campos');
                }else{
                    $.ajax({
                        data: {nuevo_descripcion,nuevo_nombre,nuevo_cantidad,nuevo_costo},
                        url: "php/medicina/registrar_medicina.php",
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
                    let modificar_cantidad = $('#cant_'+codigo_actual).val();
                    let modificar_costo = $('#costo_'+codigo_actual).val();

                    
                    if(modificar_descripcion.length == 0 || modificar_nombre.length == 0 || modificar_cantidad.length == 0 || modificar_costo.length == 0){
                        alert("Debe rellenar todos los campos");
                    }else{

                        $.ajax({
                            data: {modificar_descripcion,modificar_nombre,modificar_cantidad,modificar_costo,codigo_actual},
                            url: "php/medicina/modificar_medicina.php",
                            type: "POST",

                            success: recargar()
                                
                            
                        })
                    }
                    })
                
            })
            

        </script>
    </body>
</html>