<?php
    session_start(); 
    $taxon_level = 'tbl_clases';
    $upper_taxon_level = 'tbl_reinos';
    include('php/datos_taxonomia.php');
    include('php/datos_taxonomia_padre.php');
    include('php/taxonomias/datos_phylum.php');
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
                    <h1> Clases</h1>
                   <div class="text-start">

                        <div class="row text-center">
                            <div class="col d-flex align-items-center">
                                <header>
                                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#Nueva-Clase"> Nuevo </button>
                                </header>
                                <!-- Modal-->
                                <div class="modal fade" id="Nueva-Clase" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="ModalLabel"> Registrar Clase</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form id="form_nuevo">
                                                <div class="modal-body">
                                                    <!--Descripción-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Descripcion_Clase">Descripción</span>
                                                        <input type="text" class="form-control" id="nuevo_descripcion" placeholder="Descripción de la Clase" aria-describedby="Descripcion_Clase">
                                                    </div>
                                                    <!--Nombre del Reino-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Codigo_Phylum">Nombre del Reino</span>
                                                        <select name="select_reino" id="select_reino" class="form-control">
                                                            <option value="" >Seleccione el reino</option>
                                                            <?php foreach ($resultado_padre_taxonomia as $data): ?>
                                                                <option value="<?php echo $data['cod_reino'] ?>"><?php echo $data['descripcion'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>    
                                                    </div>
                                                    <!--Nombre del Phylum-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Codigo_Phylum">Nombre del Phylum</span>
                                                        <select name="select_phylum" id="select_phylum" class="form-control">
                                                            <option value="" >Seleccione el phylum</option>
                                                        </select>    
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

                                        <input type="text" name="nombre_cla" class="form-control mb-4" id="floatingInput" placeholder="Buscar Administradores">
                                        <label for="floatingInput">Nombre de la Clase</label>


                                </form>
                                <button class="btn btn-success ml-5" onclick="document.getElementById('form_buscar').submit();" >Buscar</button>

                                    
                                      
                                       
                            </div>
                        
                               <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Código Clase</th>
                                        <th scope="col"> Descripción</th>
                                        <th scope="col">Phylum al que pertenece</th>
                                        <th scope="col"> Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if(isset($_GET['nombre_cla'])){
                                            $nombre = $_GET['nombre_cla'];
                                            $clases_query = "select a.cod_clase,a.descripcion_cla,b.descripcion_phy,b.cod_phylum,b.cod_reino from tbl_clases as a inner join tbl_phylums as b on a.cod_phylum = b.cod_phylum where a.descripcion_cla like '$nombre%' order by a.descripcion_cla";
                                            $clases = $pdo->prepare($clases_query);
                                            $clases->execute();
                                            $resultado_taxonomia = $clases->fetchAll();
                                        }
                                        foreach ($resultado_taxonomia as $data): ?>
                                    <tr>
                                        <th scope="row"><?php echo $data['cod_clase']; ?></th>
                                        <td><?php echo $data['descripcion_cla']; ?></td>
                                        <td><?php echo $data['descripcion_phy']; ?></td>
                                        <td>  
                                            <div class="btn-group">
                                                <button class="btn btn-success edit" value="<?php echo $data['cod_clase']; ?>" data-bs-toggle="modal" data-bs-target="#Modificar-Clase<?php echo $data['cod_clase']; ?>"><span>Modificar</span></button>

                                                <a href="php/clase/delete_clase.php?codigo=<?php echo $data['cod_clase']; ?>">
                                                    <button class="btn btn-danger"> Eliminar </button>
                                                </a>
                                            </div> 
                                            <!-- Modal-->
                                            <div class="modal fade" id="Modificar-Clase<?php echo $data['cod_clase']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="ModalLabel"> Modificar Clase</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="form_modificar<?php echo $data['cod_clase']; ?>">
                                                            <div class="modal-body">
                                                                <!--Descripción-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Descripcion_Clase">Descripción</span>
                                                                    <input class="form-control" id="descripcion_<?php echo $data['cod_clase']; ?>" placeholder="Descripción de la Clase" value="<?php echo $data['descripcion_cla']; ?>" aria-describedby="Descripcion_Clase">
                                                                </div>
                                                                <!--Nombre del Reino-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Nombre_Reino">Nombre del Reino</span>
                                                                    <select id="select_reino<?php echo $data['cod_clase']; ?>" class="form-control">
                                                                    
                                                                        <?php $reino_actual = $data['cod_reino'];
                                                                        foreach ($resultado_padre_taxonomia as $data_reino): ?>
                                                                            <?php if($reino_actual == $data_reino['cod_reino']): ?>
                                                                                <option value="<?php echo $data_reino['cod_reino'] ?>" selected><?php echo $data_reino['descripcion'] ?></option>
                                                                            <?php else: ?>
                                                                                <option value="<?php echo $data_reino['cod_reino'] ?>"><?php echo $data_reino['descripcion'] ?></option>
                                                                            <?php endif ?>
                                                                        <?php endforeach ?>

                                                                    </select>
                                                                </div>
                                                                <!--Nombre del Phylum-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Nombre_Phylum">Nombre del Phylum</span>
                                                                    <select id="select_phylum<?php echo $data['cod_clase']; ?>" class="form-control">
                                                                    
                                                                        <?php $phylum_actual = $data['cod_phylum'];
                                                                        foreach ($resultado_phylum as $data_phylum): 
                                                                            if($reino_actual == $data_phylum['cod_reino']): ?>
                                                                                <?php if($phylum_actual == $data_phylum['cod_phylum']): ?>
                                                                                    <option value="<?php echo $data_phylum['cod_phylum'] ?>" selected><?php echo $data_phylum['descripcion_phy'] ?></option>
                                                                                <?php else: ?>
                                                                                    <option value="<?php echo $data_phylum['cod_phylum'] ?>"><?php echo $data_phylum['descripcion_phy'] ?></option>
                                                                                <?php endif ?>
                                                                            <?php endif ?>
                                                                        <?php endforeach ?>
                                                                    </select>
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

            $(document).ready(function(e){
                $("#select_reino").change(function(){
                    let codigo = $('#select_reino option:selected').val()
                    $.ajax({
                        data: {codigo},
                        url: 'php/select_phylum.php',
                        type: 'POST',

                        error: function(request, status, error){
                            alert("ocurrio un error "+request.responseText)
                            console.log(error)
                            },

                        success: function(response){
                            $('#select_phylum').html(response);
                        }
                    })
                })
            })

            $('#form_nuevo').submit(e => {
                e.preventDefault();
                let nuevo_descripcion = $('#nuevo_descripcion').val();
                let nuevo_reino = $('#select_reino option:selected').val();
                let nuevo_phylum = $('#select_phylum option:selected').val();

                if(nuevo_descripcion.length == 0 || nuevo_reino == '' || nuevo_phylum == ''){
                    alert('Debes completar todos los campos');
                }else{
                    $.ajax({
                        data: {nuevo_descripcion,nuevo_phylum},
                        url: "php/clase/registrar_clase.php",
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

                $("#select_reino"+codigo_actual).change(function(){
                    let codigo = $('#select_reino'+codigo_actual).val();

                    $.ajax({
                        data: {codigo},
                        url: 'php/select_phylum.php',
                        type: 'POST',

                        error: function(request, status, error){
                            alert("ocurrio un error "+request.responseText)
                            console.log(error)
                            },

                        success: function(response){
                            $('#select_phylum'+codigo_actual).html(response);
                        }
                    })
                })
                $('#form_modificar'+codigo_actual).submit(e =>{
                    e.preventDefault();
                    let modificar_descripcion = $('#descripcion_'+codigo_actual).val();
                    let modificar_phylum = $('#select_phylum'+codigo_actual).val();

                    
                    if(modificar_descripcion.length == 0 || modificar_phylum == ''){
                        alert("Debe rellenar todos los campos");
                    }else{

                        $.ajax({
                            data: {modificar_descripcion,modificar_phylum,codigo_actual},
                            url: "php/clase/modificar_clase.php",
                            type: "POST",

                            success: recargar()
                                
                            
                        })
                    }
                    })
                
            })


                      
                
        </script>

    </body>
</html>