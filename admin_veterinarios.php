<?php
    session_start(); 
    include('php/veterinario/datos_veterinarios_admin.php');
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
                    <h1> Veterinarios</h1>
                   <div class="text-start">

                        <div class="row text-center">
                            <div class="col d-flex align-items-center">
                                <header>
                                    <button type="button" class="btn btn-success mb-3 new" data-bs-toggle="modal" data-bs-target="#Nuevo-Veterinario"> Nuevo </button>
                                </header>
                                <!-- Modal-->
                                <div class="modal fade" id="Nuevo-Veterinario" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="ModalLabel"> Registrar Veterinario</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form id="form_nuevo">
                                                <div class="modal-body">
                                                    <!--Cédula del Veterinario-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Cédula del Veterinario">Cédula</span>
                                                        <input type="text" id="nuevo_cedula" class="form-control" placeholder="Ingresar Cédula" aria-describedby="Cédula del Veterinario" >
                                                    </div>
                                                        <!--Nombre del Veterinario-->
                                                        <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Nombre del Veterinario">Nombre</span>
                                                        <input type="text" id="nuevo_nombre" class="form-control" placeholder="Ingresar Nombre" aria-describedby="Nombre del Veterinario" >
                                                    </div> 
                                                    <!--Apellido del Veterinario-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Apellido del Veterinario">Apellido</span>
                                                        <input type="text" id="nuevo_apellido" class="form-control" placeholder="Ingresar Apellido" aria-describedby="Apellido del Veterinario" >
                                                    </div> 
                                                    <!--Teléfono-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Teléfono del Veterinario">Teléfono</span>
                                                        <input type="tel" id="nuevo_telefono" class="form-control" placeholder="Ingresar teléfono" aria-describedby="Teléfono del Veterinario" >
                                                    </div>
                                                    <!--Experiencia Laboral-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Experiencia Laboral">Exp.Laboral</span>
                                                        <textarea class="form-control" id="nuevo_exp" placeholder="Experiencia Laboral del Veterinario" aria-describedby="Experiencia Laboral" ></textarea>
                                                    </div>
                                                    <!--Estudios-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Estudios del Veterinario">Estudios</span>
                                                        <textarea class="form-control" id="nuevo_est" placeholder="Estudios del Veterinario" aria-describedby="Estudios del Veterinario" ></textarea>
                                                    </div>
                                                    <!--N.Colegio-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="N.Colegio">Número del Colegio</span>
                                                        <input type="number" id="nuevo_colegio" class="form-control" placeholder="Numero del Colegio" aria-describedby="N.Colegio" >
                                                    </div>
                                                    <!--UserName-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="NombreUsuario">Nombre de Usuario</span>
                                                        <input type="text" class="form-control" placeholder="Ingresar Nombre de Usuario" id="nuevo_usuario" aria-describedby="NombreUsuario" >
                                                    </div>
                                                    <p id="mensaje_usuario"></p>
                                                    <!--Contraseña-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Password">Contraseña</span>
                                                        <input type="password" class="form-control" placeholder="Contrañesa del Administrador" id="nuevo_password" aria-describedby="Password" ></input>
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

                                        <input type="number" name="ced_vet" class="form-control mb-4" id="floatingInput" placeholder="Buscar Administradores">
                                        <label for="floatingInput">Cedula veterinario</label>


                                </form>
                                <button class="btn btn-success ml-5" onclick="document.getElementById('form_buscar').submit();" >Buscar</button>

                                    
                                      
                                       
                            </div>
                        
                               <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Cédula</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Teléfono </th>
                                        <th scope="col"> Exp.Laboral </th>
                                        <th scope="col"> Estudios</th>
                                        <th scope="col">N. Colegio</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col"> Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if(isset($_GET['ced_vet'])){
                                            $cedula = $_GET['ced_vet'];
                                            $veterinarios_query = "select a.login,a.cedula,b.nombre,b.apellido,b.telefono,c.experiencia_lab,c.estudios,c.num_colegio from tbl_usuarios as a inner join tbl_personas as b on a.cedula = b.cedula inner join tbl_veterinarios as c on a.cedula = c.cedula where a.cedula like '$cedula%' and a.nivel_acceso = 'veterinario'";
                                            $veterinarios = $pdo->prepare($veterinarios_query);
                                            $veterinarios->execute();
                                            $resultado_veterinarios = $veterinarios->fetchAll();
                                        }
                                        foreach ($resultado_veterinarios as $data): ?>
                                    <tr>
                                        <th scope="row"><?php echo $data['cedula']; ?></th>
                                        <td><?php echo $data['nombre']; ?></td>
                                        <td><?php echo $data['apellido']; ?></td>
                                        <td><?php echo $data['telefono']; ?></td>
                                        <td><?php echo $data['experiencia_lab']; ?></td>
                                        <td><?php echo $data['estudios']; ?></td>
                                        <td><?php echo $data['num_colegio']; ?></td>
                                        <td><?php echo $data['login']; ?></td>
                                        <td>  
                                            <div class="btn-group">
                                                <button class="btn btn-success edit" value="<?php echo $data['login']; ?>" data-bs-toggle="modal" data-bs-target="#Modificar-Veterinario<?php echo $data['login']; ?>"><span>Modificar</span></button>
                                                <a href="php/veterinario/delete_veterinario.php?usuario=<?php echo $data['login'] ?>">
                                                    <button class="btn btn-danger"> Eliminar </button>
                                                </a>
                                            </div> 
                                            <!-- Modal-->
                                            <div class="modal fade" id="Modificar-Veterinario<?php echo $data['login']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="ModalLabel"> Modificar Veterinario</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="form_modificar<?php echo $data['login'] ?>">
                                                            <div class="modal-body">
                                                                <!--Cédula del Veterinario-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Cédula del Veterinario">Cédula</span>
                                                                    <input type="text" id="cedula_<?php echo $data['login'] ?>" class="form-control" value="<?php echo $data['cedula'] ?>" placeholder="Ingresar Cédula" aria-describedby="Cédula del Veterinario">
                                                                </div>
                                                                <!--Nombre del Veterinario-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Nombre del Veterinario">Nombre</span>
                                                                    <input type="text" id="nombre_<?php echo $data['login'] ?>" class="form-control" value="<?php echo $data['nombre'] ?>" placeholder="Ingresar Nombre" aria-describedby="Nombre del Veterinario">
                                                                </div> 
                                                                <!--Apellido del Veterinario-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Apellido del Veterinario">Apellido</span>
                                                                    <input type="text" id="apellido_<?php echo $data['login'] ?>" class="form-control" value="<?php echo $data['apellido'] ?>" placeholder="Ingresar Apellido" aria-describedby="Apellido del Veterinario">
                                                                </div> 
                                                                <!--Teléfono-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Teléfono del Veterinario">Teléfono</span>
                                                                    <input type="tel" id="telefono_<?php echo $data['login'] ?>" class="form-control" value="<?php echo $data['telefono'] ?>" placeholder="Ingresar teléfono" aria-describedby="Teléfono del Veterinario">
                                                                </div>
                                                                <!--Experiencia Laboral-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Experiencia Laboral">Exp.Laboral</span>
                                                                    <textarea class="form-control" id="experiencia_<?php echo $data['login'] ?>" placeholder="Experiencia Laboral del Veterinario" aria-describedby="Experiencia Laboral"><?php echo $data['experiencia_lab'] ?></textarea>
                                                                </div>
                                                                <!--Estudios-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Estudios del Veterinario">Estudios</span>
                                                                    <textarea class="form-control" id="estudios_<?php echo $data['login'] ?>"  placeholder="Estudios del Veterinario" aria-describedby="Estudios del Veterinario"><?php echo $data['estudios'] ?></textarea>
                                                                </div>
                                                                <!--N.Colegio-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="N.Colegio">Número del Colegio</span>
                                                                    <input type="number" id="colegio_<?php echo $data['login'] ?>" value="<?php echo $data['num_colegio'] ?>" class="form-control" placeholder="Numero del Colegio" aria-describedby="N.Colegio">
                                                                </div>
                                                                <!--UserName-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="NombreUsuario">Nombre de Usuario</span>
                                                                    <input type="text" id="usuario_<?php echo $data['login'] ?>" class="form-control" value="<?php echo $data['login'] ?>" placeholder="Ingresar Nombre de Usuario" aria-describedby="NombreUsuario">
                                                                </div>
                                                                <p id="mensaje_usuario_modificar<?php echo $data['login'] ?>"></p>
                                                                <!--Contraseña-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Password">Contraseña</span>
                                                                    <input type="password" id="password_<?php echo $data['login'] ?>" class="form-control" placeholder="Nueva contrañesa" aria-describedby="Password"></input>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-primary" value="<?php echo $data['login'] ?>"><span>Guardar cambios</span></button>
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

            $(document).on('click','.new', function(){

                $('#nuevo_usuario').blur(function(){
                    let usuario_validar = $('#nuevo_usuario').val();

                    $.ajax({
                        data: {usuario_validar},
                        url: "php/comprobar_usuario.php",
                        type: "POST",
                        success: function(mensaje){
                            document.getElementById('mensaje_usuario').innerHTML= mensaje;
                            if(mensaje == "<p class='formulario_mensaje formulario_mensaje-activo'>El nombre de usuario no esta disponible</p>"){
                                document.getElementById('mensaje_usuario').classList.add('text-danger');
                            }else{
                                document.getElementById('mensaje_usuario').classList.remove('text-danger');
                            }
                        }

                    })
                })

                $('#nuevo_cedula').blur(function(){
                    let nuevo_cedula = $('#nuevo_cedula').val();

                    $.ajax({
                        data: {nuevo_cedula},
                        url: "php/buscar_veterinario.php",
                        type: "POST",
                        success: function(response){
                            if(response != "no"){
                                let datos = response.split('_');
                                $('#nuevo_nombre').val(datos[0]);
                                $('#nuevo_nombre').prop('disabled', true);
                                $('#nuevo_apellido').val(datos[1]);
                                $('#nuevo_apellido').prop('disabled', true);
                                $('#nuevo_telefono').val(datos[2]);
                                $('#nuevo_telefono').prop('disabled', true);
                                if(datos[3] != null){
                                    $('#nuevo_exp').val(datos[3]);
                                    $('#nuevo_exp').prop('disabled', true);
                                    $('#nuevo_est').val(datos[4]);
                                    $('#nuevo_est').prop('disabled', true);
                                    $('#nuevo_colegio').val(datos[5]);
                                    $('#nuevo_colegio').prop('disabled', true);
                                }
                                if (datos[6] != null ){
                                    $('#nuevo_usuario').val(datos[6]);
                                    $('#nuevo_usuario').prop('disabled', true);
                                }
                                
                            }else{
                                $('#nuevo_nombre').val('');
                                $('#nuevo_nombre').prop('disabled', false);
                                $('#nuevo_nombre').attr("placeholder", "Ingresar Nombre");
                                $('#nuevo_apellido').val('');
                                $('#nuevo_apellido').prop('disabled', false);
                                $('#nuevo_apellido').attr("placeholder", "Ingresar Apellido");
                                $('#nuevo_telefono').val('');
                                $('#nuevo_telefono').prop('disabled', false);
                                $('#nuevo_telefono').attr("placeholder", "Ingresar Telefono");
                                if($('#nuevo_exp').val() != null || $('#nuevo_est').val() != null || $('#nuevo_colegio').val() != null ){
                                    $('#nuevo_exp').val('');
                                    $('#nuevo_exp').prop('disabled', false);
                                    $('#nuevo_exp').attr("placeholder", "Experiencia del Veterinario");
                                    $('#nuevo_est').val('');
                                    $('#nuevo_est').prop('disabled', false);
                                    $('#nuevo_est').attr("placeholder", "Estudios del veterinario");
                                    $('#nuevo_colegio').val('');
                                    $('#nuevo_colegio').prop('disabled', false);
                                    $('#nuevo_colegio').attr("placeholder", "Numero del Colegio");
                                }
                                if($('#nuevo_usuario').val() != null){
                                    $('#nuevo_usuario').val('');
                                    $('#nuevo_usuario').prop('disabled', false);
                                    $('#nuevo_usuario').attr("placeholder", "Nombre de usuario");
                                }
                            }
                        }
                     })
                })
                $('#form_nuevo').submit(e => {
                    e.preventDefault();
                    let nuevo_cedula = $('#nuevo_cedula').val();
                    let nuevo_nombre = $('#nuevo_nombre').val();
                    let nuevo_apellido = $('#nuevo_apellido').val();
                    let nuevo_telefono = $('#nuevo_telefono').val();
                    let nuevo_exp = $('#nuevo_exp').val();
                    let nuevo_est = $('#nuevo_est').val();
                    let nuevo_colegio = $('#nuevo_colegio').val();
                    let nuevo_usuario = $('#nuevo_usuario').val();
                    let nuevo_password = $('#nuevo_password').val();


                    if($('#nuevo_usuario').is(':disabled')){
                        alert('Este veterinario ya tiene un usuario')
                    }else if(nuevo_cedula.length == 0 || nuevo_nombre.length == 0 || nuevo_apellido.length == 0 || nuevo_telefono.length == 0 || nuevo_exp.length == 0 || nuevo_est.length == 0 || nuevo_colegio.length == 0 || nuevo_usuario.length == 0 || document.getElementById('mensaje_usuario').innerHTML != '<p>El nombre de usuario esta disponible</p>'){
                        alert('Debes completar todos los campos correctamente');

                    }else{
                        $.ajax({
                            data: {nuevo_cedula,nuevo_nombre,nuevo_apellido,nuevo_telefono,nuevo_exp,nuevo_est,nuevo_colegio,nuevo_usuario,nuevo_password},
                            url:"php/veterinario/registrar_veterinario.php",
                            type: "POST",
                            success: recargar()

                            
                        })
                    } 
                })
            })

            

            $(document).on('click','.edit', function(){

                let usuario_actual = $(this).val();

                $('#usuario_'+usuario_actual).blur(function(){
                    let usuario_validar = $('#usuario_'+usuario_actual).val();

                    $.ajax({
                        data: {usuario_validar,usuario_actual},
                        url: "php/comprobar_usuario_modificar.php",
                        type: "POST",
                        success: function(mensaje){
                            document.getElementById('mensaje_usuario_modificar'+usuario_actual).innerHTML = mensaje;
                            if(mensaje == "<p class='formulario_mensaje formulario_mensaje-activo'>El nombre de usuario no esta disponible</p>"){
                                document.getElementById('mensaje_usuario_modificar'+usuario_actual).classList.add('text-danger');
                            }else{
                                document.getElementById('mensaje_usuario_modificar'+usuario_actual).classList.remove('text-danger');
                            }
                        }

                    })
                })
                $('#form_modificar'+usuario_actual).submit(e =>{
                    e.preventDefault();
                    let modificar_cedula = $('#cedula_'+usuario_actual).val();
                    let modificar_nombre = $('#nombre_'+usuario_actual).val();
                    let modificar_apellido = $('#apellido_'+usuario_actual).val();
                    let modificar_telefono = $('#telefono_'+usuario_actual).val();
                    let modificar_exp = $('#experiencia_'+usuario_actual).val();
                    let modificar_estudios = $('#estudios_'+usuario_actual).val();
                    let modificar_colegio = $('#colegio_'+usuario_actual).val();
                    let modificar_usuario = $('#usuario_'+usuario_actual).val();
                    let modificar_password = $('#password_'+usuario_actual).val();
                 
                    if(modificar_cedula.length == 0 || modificar_nombre.length == 0 || modificar_apellido.length == 0 || modificar_telefono.length == 0 || modificar_usuario.length == 0 || modificar_exp.length == 0 || modificar_estudios.length == 0 || modificar_colegio.length == 0 || document.getElementById('mensaje_usuario_modificar'+usuario_actual).innerHTML.length > 80 ){
                        alert("Debe rellenar todos los campos correctamente");
                    }else{

                        $.ajax({
                            data: {modificar_cedula,modificar_nombre,modificar_apellido,modificar_telefono,modificar_exp,modificar_estudios,modificar_colegio,modificar_usuario,modificar_password,usuario_actual},
                            url: "php/veterinario/modificar_veterinario.php",
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