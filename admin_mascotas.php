<?php
    session_start(); 
    include('php/mascota/datos_mascotas_admin.php');
    $upper_taxon_level = 'tbl_reinos';
    include('php/datos_taxonomia_padre.php');
    include('php/taxonomias/datos_phylum.php');
    include('php/taxonomias/datos_clase.php');
    include('php/taxonomias/datos_orden.php');
    include('php/taxonomias/datos_familia.php');
    include('php/taxonomias/datos_genero.php');
    include('php/taxonomias/datos_especie.php');
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
                    <h1> Mascotas</h1>
                   <div class="text-start">

                        <div class="row text-center">
                            <div class="col d-flex align-items-center">
                                <header>
                                    <button type="button" class="btn btn-success mb-3 new" data-bs-toggle="modal" data-bs-target="#Nueva-Mascota"> Nuevo </button>
                                </header>
                                <!-- Modal-->
                                <div class="modal fade" id="Nueva-Mascota" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="ModalLabel"> Registrar Mascota</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form id="form_nuevo">
                                                  <div class="modal-body">
                                                <!--Nombre-->
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="Nombre_Mascota">Nombre</span>
                                                    <input type="text" id="nuevo_nombre" class="form-control" placeholder="Nombre" aria-describedby="Nombre"></input>
                                                </div> 
                                                <!--Fecha de Nacimiento-->
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="Fecha_Nacimiento">Fecha de Nacimiento</span>
                                                    <input type="date" id="nuevo_fecha" class="form-control"  aria-describedby="Fecha_Nacimiento">
                                                </div> 
                                                <!--Cedula del propietario-->
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="Cedula_propietario">Cedula del propietario</span>
                                                    <input type="number" id="nuevo_cedula_propietario" class="form-control" placeholder="Cedula del propietario" aria-describedby="Cedula"></input>
                                                </div>
                                                <div id="datos_propietario"></div>
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
                                                    <!--Nombre de la Especie-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Codigo_Especie">Nombre de la Especie</span>
                                                        <select name="select_especie" id="select_especie" class="form-control">
                                                            <option value="" >Seleccione la especie</option>
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

                                        <input type="text" name="nombre_mascota" class="form-control mb-4" id="floatingInput" placeholder="Buscar Administradores">
                                        <label for="floatingInput">Nombre de la mascota</label>


                                </form>
                                <button class="btn btn-success ml-5" onclick="document.getElementById('form_buscar').submit();" >Buscar</button>

                            </div>
                        
                               <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Código Máscota</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Fecha Nacimiento</th>
                                        <th scope="col">Cedula_propietario</th>
                                        <th scope="col">Especie a la que pertenece</th>
                                        <th scope="col"> Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if(isset($_GET['nombre_mascota'])){
                                            $nombre = $_GET['nombre_mascota'];
                                            $mascotas_query = "select a.cod_mascota,a.nombre,a.ced_propietario,a.fecha_nacimiento,b.cod_especie,b.descripcion_esp,c.cod_genero,c.descripcion_gen,d.cod_familia,d.descripcion_fam,e.cod_orden,e.descripcion_ord,f.cod_clase,f.descripcion_cla,g.cod_phylum,g.descripcion_phy,g.cod_reino from tbl_mascotas as a inner join tbl_especies as b on a.cod_especie = b.cod_especie inner join tbl_generos as c on b.cod_genero = c.cod_genero inner join tbl_familias as d on c.cod_familia = d.cod_familia inner join tbl_ordenes as e on d.cod_orden = e.cod_orden inner join tbl_clases as f on e.cod_clase = f.cod_clase inner join tbl_phylums as g on f.cod_phylum = g.cod_phylum  where a.nombre like '$nombre%' order by a.nombre";
                                            $mascotas = $pdo->prepare($mascotas_query);
                                            $mascotas->execute();
                                            $resultado_mascotas = $mascotas->fetchAll();
                                        }
                                        foreach ($resultado_mascotas as $data): ?>
                                    <tr>
                                        <th scope="row"><?php echo $data['cod_mascota']; ?></th>
                                        <td><?php echo $data['nombre']; ?></td>
                                        <td><?php echo $data['fecha_nacimiento']; ?></td>
                                        <td><?php echo $data['ced_propietario']; ?></td>
                                        <td><?php echo $data['descripcion_esp']; ?></td>
                                        <td>  
                                            <div class="btn-group">
                                                <button class="btn btn-success edit" value="<?php echo $data['cod_mascota']; ?>" data-bs-toggle="modal" data-bs-target="#Modificar-Mascota<?php echo $data['cod_mascota']; ?>"><span>Modificar</span></button>
                                                <a href="php/mascota/delete_mascota.php?codigo=<?php echo $data['cod_mascota']; ?>">
                                                    <button class="btn btn-danger"> Eliminar </button>
                                                </a>
                                            </div> 
                                            <!-- Modal-->
                                            <div class="modal fade" id="Modificar-Mascota<?php echo $data['cod_mascota']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="ModalLabel"> Modificar Mascota</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="form_modificar<?php echo $data['cod_mascota']; ?>">
                                                            <div class="modal-body">
                                                                
                                                                <!--Nombre de la Mascota-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="NombreMascota">Nombre</span>
                                                                    <input type="text" id="nombre_<?php echo $data['cod_mascota']; ?>" value="<?php echo $data['nombre']; ?>" class="form-control" placeholder="Nombre de la Mascota" aria-describedby="NombreMascota"></input>
                                                                </div> 
                                                                <!--Fecha de Nacimiento-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Fecha_Nacimiento">Fecha de Nacimiento</span>
                                                                    <input type="date" id="fecha_<?php echo $data['cod_mascota']; ?>" value="<?php echo $data['fecha_nacimiento']; ?>" class="form-control" placeholder="Fecha de Nacimiento" aria-describedby="Fecha_Nacimiento">
                                                                </div> 
                                                                <!--Cedula del Propietario-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="NombreMascota">Cedula Propietario</span>
                                                                    <input type="number" id="cedula_propietario_<?php echo $data['cod_mascota']; ?>" value="<?php echo $data['ced_propietario']; ?>" class="form-control" placeholder="Nombre de la Mascota" aria-describedby="NombreMascota"></input>
                                                                </div> 
                                                                <!--Nombre del Reino-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Nombre_Reino">Nombre del Reino</span>
                                                                    <select id="select_reino<?php echo $data['cod_mascota']; ?>" class="form-control">
                                                                    
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
                                                                    <select id="select_phylum<?php echo $data['cod_mascota']; ?>" class="form-control">
                                                                    
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
                                                                    <select id="select_clase<?php echo $data['cod_mascota']; ?>" class="form-control">
                                                                    
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
                                                                    <select id="select_orden<?php echo $data['cod_mascota']; ?>" class="form-control">
                                                                    
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
                                                                    <select id="select_familia<?php echo $data['cod_mascota']; ?>" class="form-control">
                                                                    
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
                                                                    <select id="select_genero<?php echo $data['cod_mascota']; ?>" class="form-control">
                                                                    
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
                                                                <!--Nombre de la especie-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Nombre_Especie">Nombre de la Especie</span>
                                                                    <select id="select_especie<?php echo $data['cod_mascota']; ?>" class="form-control">
                                                                    
                                                                        <?php $especie_actual = $data['cod_especie'];
                                                                        foreach ($resultado_especie as $data_especie): 
                                                                            if($genero_actual == $data_especie['cod_genero']): ?>
                                                                                <?php if($especie_actual == $data_especie['cod_especie']): ?>
                                                                                    <option value="<?php echo $data_especie['cod_especie'] ?>" selected><?php echo $data_especie['descripcion_esp'] ?></option>
                                                                                <?php else: ?>
                                                                                    <option value="<?php echo $data_especie['cod_especie'] ?>"><?php echo $data_especie['descripcion_esp'] ?></option>
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
                }, 300);
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
                            $('#select_especie').html("<option value=''>Seleccione una especie</option>");
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
                            $('#select_especie').html("<option value=''>Seleccione una especie</option>");
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
                            $('#select_especie').html("<option value=''>Seleccione una especie</option>");
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
                            $('#select_especie').html("<option value=''>Seleccione una especie</option>");
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
                            $('#select_especie').html("<option value=''>Seleccione una especie</option>");
                        }
                    })
                })
                $("#select_genero").change(function(){
                    let codigo = $('#select_genero option:selected').val()
                    $.ajax({
                        data: {codigo},
                        url: 'php/select_especie.php',
                        type: 'POST',

                        error: function(request, status, error){
                            alert("ocurrio un error "+request.responseText)
                            console.log(error)
                            },

                        success: function(response){
                            $('#select_especie').html(response);
                        }
                    })
                })
            })
            
            $(document).on('click','.new', function(){
                $('#nuevo_cedula_propietario').blur(function(){
                    let nuevo_cedula = $('#nuevo_cedula_propietario').val();

                    $.ajax({
                        data: {nuevo_cedula},
                        url: "php/buscar_persona.php",
                        type: "POST",
                        success: function(response){
                            if(response != "no"){
                                let datos = response.split('_');
                                let mensaje = '<p>Nombre: '+datos[0]+'</p>';
                                mensaje += '<p>Apellido: '+datos[1]+'</p>'
                                $('#datos_propietario').html(mensaje)
                                
                            }else{
                                $('#datos_propietario').html('<p>No se encontro un propietario registrado con esta cedula</p>');
                            }
                        }
                    })
                })

                $('#form_nuevo').submit(e => {
                    e.preventDefault();
                    let nuevo_nombre = $('#nuevo_nombre').val();
                    let nuevo_fecha = $('#nuevo_fecha').val();
                    let nuevo_cedula_propietario = $('#nuevo_cedula_propietario').val();
                    let nuevo_reino = $('#select_reino option:selected').val();
                    let nuevo_phylum = $('#select_phylum option:selected').val();
                    let nuevo_clase = $('#select_clase option:selected').val();
                    let nuevo_orden = $('#select_orden option:selected').val();
                    let nuevo_familia = $('#select_familia option:selected').val();
                    let nuevo_genero = $('#select_genero option:selected').val();
                    let nuevo_especie = $('#select_especie option:selected').val();
                    let nuevo_cedula_usuario = <?php echo $cedula_usuario ?>;

                    if(nuevo_nombre.length == 0 || nuevo_fecha == '' || nuevo_fecha == null || nuevo_cedula_propietario == null || nuevo_reino == '' || nuevo_phylum == '' || nuevo_clase == '' || nuevo_orden == '' || nuevo_familia == '' || nuevo_genero == '' || nuevo_especie == ''){
                        alert('Debes completar todos los campos');
                    }else{
                        $.ajax({
                            data: {nuevo_nombre,nuevo_fecha,nuevo_cedula_propietario,nuevo_cedula_usuario,nuevo_especie},
                            url: "php/mascota/registrar_mascota.php",
                            type: "POST",
                            error: function(request, status, error){
                                alert("ocurrio un error "+request.responseText)
                                console.log(error)
                                },

                            success: recargar()

                        })
                    }
                })

            } )

            

            
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
                            $('#select_especie'+codigo_actual).html("<option value=''>Seleccione una especie</option>");
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
                            $('#select_especie'+codigo_actual).html("<option value=''>Seleccione una especie</option>");
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
                            $('#select_especie'+codigo_actual).html("<option value=''>Seleccione una especie</option>");
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
                            $('#select_especie'+codigo_actual).html("<option value=''>Seleccione una especie</option>");
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
                            $('#select_especie'+codigo_actual).html("<option value=''>Seleccione una especie</option>");
                        }
                    })
                })
                $("#select_genero"+codigo_actual).change(function(){
                    let codigo = $('#select_genero'+codigo_actual).val();

                    $.ajax({
                        data: {codigo},
                        url: 'php/select_especie.php',
                        type: 'POST',

                        error: function(request, status, error){
                            alert("ocurrio un error "+request.responseText)
                            console.log(error)
                            },

                        success: function(response){
                            $('#select_especie'+codigo_actual).html(response);
                        }
                    })
                })

                $('#form_modificar'+codigo_actual).submit(e =>{
                    e.preventDefault();
                    let modificar_nombre = $('#nombre_'+codigo_actual).val();
                    let modificar_fecha = $('#fecha_'+codigo_actual).val();
                    let modificar_cedula_propietario = $('#cedula_propietario_'+codigo_actual).val();
                    let modificar_phylum = $('#select_phylum'+codigo_actual).val();
                    let modificar_clase = $('#select_clase'+codigo_actual).val();
                    let modificar_orden = $('#select_orden'+codigo_actual).val();
                    let modificar_familia = $('#select_familia'+codigo_actual).val();
                    let modificar_genero = $('#select_genero'+codigo_actual).val();
                    let modificar_especie = $('#select_especie'+codigo_actual).val();
                    let modificar_cedula_usuario = <?php echo $cedula_usuario ?>;

                    if(modificar_nombre.length == 0 || modificar_fecha == '' || modificar_fecha == null || modificar_cedula_propietario == null || modificar_phylum == '' || modificar_clase == '' || modificar_orden == '' || modificar_familia == '' || modificar_genero == '' || modificar_especie == ''){
                        alert("Debe rellenar todos los campos");
                    }else{

                        $.ajax({
                            data: {modificar_nombre,modificar_fecha,modificar_cedula_propietario,modificar_cedula_usuario,modificar_especie,codigo_actual},
                            url: "php/mascota/modificar_mascota.php",
                            type: "POST",

                            success: recargar()
                                
                            
                        })
                    }
                
                })
            })

           
                            
        </script>

    </body>
</html>