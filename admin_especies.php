<?php
    session_start(); 
    $taxon_level = 'tbl_especies';
    include('php/datos_taxonomia.php');
    $upper_taxon_level = 'tbl_reinos';
    include('php/datos_taxonomia_padre.php');
    include('php/taxonomias/datos_phylum.php');
    include('php/taxonomias/datos_clase.php');
    include('php/taxonomias/datos_orden.php');
    include('php/taxonomias/datos_familia.php');
    include('php/taxonomias/datos_genero.php');
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
                    <h1> Especies</h1>
                   <div class="text-start">

                        <div class="row text-center">
                            <div class="col d-flex align-items-center">
                                <header>
                                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#Nueva-Especie"> Nuevo </button>
                                </header>
                                <!-- Modal-->
                                <div class="modal fade" id="Nueva-Especie" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="ModalLabel"> Registrar Especie</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form id="form_nuevo">
                                                <div class="modal-body">
                                                    <!--Descripción-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Descripcion_Especie">Descripción</span>
                                                        <input type="text" id="nuevo_descripcion" class="form-control" placeholder="Descripción de la Especie" aria-describedby="Descripcion_Especie">
                                                    </div>
                                                    <!--Nombre del Reino-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Codigo_Reino">Nombre del Reino</span>
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
                                                    <!--Nombre del Clase-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Codigo_Clase">Nombre del Clase</span>
                                                        <select name="select_clase" id="select_clase" class="form-control">
                                                            <option value="" >Seleccione la clase</option>
                                                        </select>    
                                                    </div>
                                                    <!--Nombre del Orden-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Codigo_Orden">Nombre del Orden</span>
                                                        <select name="select_orden" id="select_orden" class="form-control">
                                                            <option value="" >Seleccione el orden</option>
                                                        </select>    
                                                    </div>
                                                    <!--Nombre de la Familia-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Codigo_Familia">Nombre de la Familia</span>
                                                        <select name="select_familia" id="select_familia" class="form-control">
                                                            <option value="" >Seleccione la familia</option>
                                                        </select>    
                                                    </div>
                                                    <!--Nombre del Genero-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Codigo_Genero">Nombre del Genero</span>
                                                        <select name="select_genero" id="select_genero" class="form-control">
                                                            <option value="" >Seleccione el genero</option>
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

                                        <input type="text" name="nombre_esp" class="form-control mb-4" id="floatingInput" placeholder="Buscar Administradores">
                                        <label for="floatingInput">Nombre de la especie</label>


                                </form>
                                <button class="btn btn-success ml-5" onclick="document.getElementById('form_buscar').submit();" >Buscar</button>

                                    
                                      
                                       
                            </div>
                        
                               <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Código Especie</th>
                                        <th scope="col"> Descripción</th>
                                        <th scope="col"> Genero al que pertenece</th>
                                        <th scope="col"> Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if(isset($_GET['nombre_esp'])){
                                            $nombre = $_GET['nombre_esp'];
                                            $especies_query = "select a.cod_especie,a.descripcion_esp,b.cod_genero,b.descripcion_gen,c.cod_familia,c.descripcion_fam,d.cod_orden,d.descripcion_ord,e.cod_clase,e.descripcion_cla,f.cod_phylum,f.descripcion_phy,f.cod_reino from tbl_especies as a inner join tbl_generos as b on a.cod_genero = b.cod_genero inner join tbl_familias as c on b.cod_familia = c.cod_familia inner join tbl_ordenes as d on c.cod_orden = d.cod_orden inner join tbl_clases as e on d.cod_clase = e.cod_clase inner join tbl_phylums as f on e.cod_phylum = f.cod_phylum where a.descripcion_esp like '$nombre%' order by a.descripcion_esp";
                                            $especies = $pdo->prepare($especies_query);
                                            $especies->execute();
                                            $resultado_taxonomia = $especies->fetchAll();
                                        }
                                        foreach ($resultado_taxonomia as $data): ?>
                                    <tr>
                                        <th scope="row"><?php echo $data['cod_especie']; ?></th>
                                        <td><?php echo $data['descripcion_esp']; ?></td>
                                        <td><?php echo $data['descripcion_gen']; ?></td>
                                        <td>  
                                            <div class="btn-group">
                                                <button class="btn btn-success edit" value="<?php echo $data['cod_especie']; ?>" data-bs-toggle="modal" data-bs-target="#Modificar-Especie<?php echo $data['cod_especie']; ?>"><span>Modificar</span></button>
                                                <a href="php/especie/delete_especie.php?codigo=<?php echo $data['cod_especie']; ?>">
                                                    <button class="btn btn-danger"> Eliminar </button>
                                                </a>
                                            </div> 
                                            <!-- Modal-->
                                            <div class="modal fade" id="Modificar-Especie<?php echo $data['cod_especie']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="ModalLabel"> Modificar Especie</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="form_modificar<?php echo $data['cod_especie']; ?>">
                                                            <div class="modal-body">
                                                                <!--Descripción-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Descripcion_Especie">Descripción</span>
                                                                    <input type="text" id="descripcion_<?php echo $data['cod_especie']; ?>" value="<?php echo $data['descripcion_esp']; ?>" class="form-control" placeholder="Descripción de la Especie" aria-describedby="Descripcion_Especie">
                                                                </div>
                                                                <!--Nombre del Reino-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Nombre_Reino">Nombre del Reino</span>
                                                                    <select id="select_reino<?php echo $data['cod_especie']; ?>" class="form-control">
                                                                    
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
                                                                    <select id="select_phylum<?php echo $data['cod_especie']; ?>" class="form-control">
                                                                    
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
                                                                <!--Nombre de la clase-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Nombre_Clase">Nombre de la Clase</span>
                                                                    <select id="select_clase<?php echo $data['cod_especie']; ?>" class="form-control">
                                                                    
                                                                        <?php $clase_actual = $data['cod_clase'];
                                                                        foreach ($resultado_clase as $data_clase): 
                                                                            if($phylum_actual == $data_clase['cod_phylum']): ?>
                                                                                <?php if($clase_actual == $data_clase['cod_clase']): ?>
                                                                                    <option value="<?php echo $data_clase['cod_clase'] ?>" selected><?php echo $data_clase['descripcion_cla'] ?></option>
                                                                                <?php else: ?>
                                                                                    <option value="<?php echo $data_clase['cod_clase'] ?>"><?php echo $data_clase['descripcion_cla'] ?></option>
                                                                                <?php endif ?>
                                                                            <?php endif ?>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <!--Nombre del orden-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Nombre_Orden">Nombre del Orden</span>
                                                                    <select id="select_orden<?php echo $data['cod_especie']; ?>" class="form-control">
                                                                    
                                                                        <?php $orden_actual = $data['cod_orden'];
                                                                        foreach ($resultado_orden as $data_orden): 
                                                                            if($clase_actual == $data_orden['cod_clase']): ?>
                                                                                <?php if($orden_actual == $data_orden['cod_orden']): ?>
                                                                                    <option value="<?php echo $data_orden['cod_orden'] ?>" selected><?php echo $data_orden['descripcion_ord'] ?></option>
                                                                                <?php else: ?>
                                                                                    <option value="<?php echo $data_orden['cod_orden'] ?>"><?php echo $data_orden['descripcion_ord'] ?></option>
                                                                                <?php endif ?>
                                                                            <?php endif ?>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <!--Nombre de la familia-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Nombre_Familia">Nombre de la Familia</span>
                                                                    <select id="select_familia<?php echo $data['cod_especie']; ?>" class="form-control">
                                                                    
                                                                        <?php $familia_actual = $data['cod_familia'];
                                                                        foreach ($resultado_familia as $data_familia): 
                                                                            if($orden_actual == $data_familia['cod_orden']): ?>
                                                                                <?php if($familia_actual == $data_familia['cod_familia']): ?>
                                                                                    <option value="<?php echo $data_familia['cod_familia'] ?>" selected><?php echo $data_familia['descripcion_fam'] ?></option>
                                                                                <?php else: ?>
                                                                                    <option value="<?php echo $data_familia['cod_familia'] ?>"><?php echo $data_familia['descripcion_fam'] ?></option>
                                                                                <?php endif ?>
                                                                            <?php endif ?>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <!--Nombre del genero-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Nombre_Genero">Nombre del Genero</span>
                                                                    <select id="select_genero<?php echo $data['cod_especie']; ?>" class="form-control">
                                                                    
                                                                        <?php $genero_actual = $data['cod_genero'];
                                                                        foreach ($resultado_genero as $data_genero): 
                                                                            if($familia_actual == $data_genero['cod_familia']): ?>
                                                                                <?php if($genero_actual == $data_genero['cod_genero']): ?>
                                                                                    <option value="<?php echo $data_genero['cod_genero'] ?>" selected><?php echo $data_genero['descripcion_gen'] ?></option>
                                                                                <?php else: ?>
                                                                                    <option value="<?php echo $data_genero['cod_genero'] ?>"><?php echo $data_genero['descripcion_gen'] ?></option>
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
                }, 100);
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
                            $('#select_clase').html("<option value=''>Seleccione una clase</option>");
                            $('#select_orden').html("<option value=''>Seleccione un orden</option>");
                            $('#select_familia').html("<option value=''>Seleccione una familia</option>");
                            $('#select_genero').html("<option value=''>Seleccione un genero</option>");
                        }
                    })
                })
                $("#select_phylum").change(function(){
                    let codigo = $('#select_phylum option:selected').val()
                    $.ajax({
                        data: {codigo},
                        url: 'php/select_clase.php',
                        type: 'POST',

                        error: function(request, status, error){
                            alert("ocurrio un error "+request.responseText)
                            console.log(error)
                            },

                        success: function(response){
                            $('#select_clase').html(response);
                            $('#select_orden').html("<option value=''>Seleccione un orden</option>");
                            $('#select_familia').html("<option value=''>Seleccione una familia</option>");
                            $('#select_genero').html("<option value=''>Seleccione un genero</option>");
                        }
                    })
                })
                $("#select_clase").change(function(){
                    let codigo = $('#select_clase option:selected').val()
                    $.ajax({
                        data: {codigo},
                        url: 'php/select_orden.php',
                        type: 'POST',

                        error: function(request, status, error){
                            alert("ocurrio un error "+request.responseText)
                            console.log(error)
                            },

                        success: function(response){
                            $('#select_orden').html(response);
                            $('#select_familia').html("<option value=''>Seleccione una familia</option>");
                            $('#select_genero').html("<option value=''>Seleccione un genero</option>");
                        }
                    })
                })
                $("#select_orden").change(function(){
                    let codigo = $('#select_orden option:selected').val()
                    $.ajax({
                        data: {codigo},
                        url: 'php/select_familia.php',
                        type: 'POST',

                        error: function(request, status, error){
                            alert("ocurrio un error "+request.responseText)
                            console.log(error)
                            },

                        success: function(response){
                            $('#select_familia').html(response);
                            $('#select_genero').html("<option value=''>Seleccione un genero</option>");
                        }
                    })
                })
                $("#select_familia").change(function(){
                    let codigo = $('#select_familia option:selected').val()
                    $.ajax({
                        data: {codigo},
                        url: 'php/select_genero.php',
                        type: 'POST',

                        error: function(request, status, error){
                            alert("ocurrio un error "+request.responseText)
                            console.log(error)
                            },

                        success: function(response){
                            $('#select_genero').html(response);
                        }
                    })
                })
            })

            

            $('#form_nuevo').submit(e => {
                e.preventDefault();
                let nuevo_descripcion = $('#nuevo_descripcion').val();
                let nuevo_reino = $('#select_reino option:selected').val();
                let nuevo_phylum = $('#select_phylum option:selected').val();
                let nuevo_clase = $('#select_clase option:selected').val();
                let nuevo_orden = $('#select_orden option:selected').val();
                let nuevo_familia = $('#select_familia option:selected').val();
                let nuevo_genero = $('#select_genero option:selected').val();

                if(nuevo_descripcion.length == 0 || nuevo_reino == '' || nuevo_phylum == '' || nuevo_clase == '' || nuevo_orden == '' || nuevo_familia == '' || nuevo_genero == ''){
                    alert('Debes completar todos los campos');
                }else{
                    $.ajax({
                        data: {nuevo_descripcion,nuevo_genero},
                        url: "php/especie/registrar_especie.php",
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
                            $('#select_clase'+codigo_actual).html("<option value=''>Seleccione una clase</option>");
                            $('#select_orden'+codigo_actual).html("<option value=''>Seleccione un orden</option>");
                            $('#select_familia'+codigo_actual).html("<option value=''>Seleccione una familia</option>");
                            $('#select_genero'+codigo_actual).html("<option value=''>Seleccione un genero</option>");
                        }
                    })
                })

                $("#select_phylum"+codigo_actual).change(function(){
                    let codigo = $('#select_phylum'+codigo_actual).val();

                    $.ajax({
                        data: {codigo},
                        url: 'php/select_clase.php',
                        type: 'POST',

                        error: function(request, status, error){
                            alert("ocurrio un error "+request.responseText)
                            console.log(error)
                            },

                        success: function(response){
                            $('#select_clase'+codigo_actual).html(response);
                            $('#select_orden'+codigo_actual).html("<option value=''>Seleccione un orden</option>");
                            $('#select_familia'+codigo_actual).html("<option value=''>Seleccione una familia</option>");
                            $('#select_genero'+codigo_actual).html("<option value=''>Seleccione un genero</option>");
                        }
                    })
                })

                $("#select_clase"+codigo_actual).change(function(){
                    let codigo = $('#select_clase'+codigo_actual).val();

                    $.ajax({
                        data: {codigo},
                        url: 'php/select_orden.php',
                        type: 'POST',

                        error: function(request, status, error){
                            alert("ocurrio un error "+request.responseText)
                            console.log(error)
                            },

                        success: function(response){
                            $('#select_orden'+codigo_actual).html(response);
                            $('#select_familia'+codigo_actual).html("<option value=''>Seleccione una familia</option>");
                            $('#select_genero'+codigo_actual).html("<option value=''>Seleccione un genero</option>");
                        }
                    })
                })

                $("#select_orden"+codigo_actual).change(function(){
                    let codigo = $('#select_orden'+codigo_actual).val();

                    $.ajax({
                        data: {codigo},
                        url: 'php/select_familia.php',
                        type: 'POST',

                        error: function(request, status, error){
                            alert("ocurrio un error "+request.responseText)
                            console.log(error)
                            },

                        success: function(response){
                            $('#select_familia'+codigo_actual).html(response);
                            $('#select_genero'+codigo_actual).html("<option value=''>Seleccione un genero</option>");
                        }
                    })
                })

                $("#select_familia"+codigo_actual).change(function(){
                    let codigo = $('#select_familia'+codigo_actual).val();

                    $.ajax({
                        data: {codigo},
                        url: 'php/select_genero.php',
                        type: 'POST',

                        error: function(request, status, error){
                            alert("ocurrio un error "+request.responseText)
                            console.log(error)
                            },

                        success: function(response){
                            $('#select_genero'+codigo_actual).html(response);
                        }
                    })
                })

                $('#form_modificar'+codigo_actual).submit(e =>{
                    e.preventDefault();
                    let modificar_descripcion = $('#descripcion_'+codigo_actual).val();
                    let modificar_phylum = $('#select_phylum'+codigo_actual).val();
                    let modificar_clase = $('#select_clase'+codigo_actual).val();
                    let modificar_orden = $('#select_orden'+codigo_actual).val();
                    let modificar_familia = $('#select_familia'+codigo_actual).val();
                    let modificar_genero = $('#select_genero'+codigo_actual).val();

                    
                    if(modificar_descripcion.length == 0 || modificar_phylum == '' || modificar_clase == '' || modificar_orden == '' || modificar_familia == '' || modificar_genero == ''){
                        alert("Debe rellenar todos los campos");
                    }else{

                        $.ajax({
                            data: {modificar_descripcion,modificar_genero,codigo_actual},
                            url: "php/especie/modificar_especie.php",
                            type: "POST",

                            success: recargar()
                                
                            
                        })
                    }
                
                })
            })
            



    
                
        </script>

    </body>
</html>