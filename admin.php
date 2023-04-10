<?php 
    include('php/admin/datos_perfil_admin.php');
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
                    <h1> Datos del Administrador</h1>
                   <div class="text-start">
                        <p> Nombre Usuario: <?php echo $usuario; ?></p>
                        <p> Cédula: <?php echo $cedula; ?></p>
                        <p> Nombre: <?php echo $nombre; ?></p>
                        <p> Apellido: <?php echo $apellido; ?></p>
                        <p> Teléfono: <?php echo $telefono; ?></p>

                        <div class="row text-center">
                            <div class="col d-flex align-items-center">
                                <header>
                                    <button type="button" class="btn btn-success mb-3 new" data-bs-toggle="modal" data-bs-target="#Nuevo-Admin"> Nuevo </button>
                                </header>
                                
                                <!-- Modal-->
                                <div class="modal fade" id="Nuevo-Admin" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="ModalLabel"> Registrar Administrador</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form id="form_nuevo">
                                                <div class="modal-body">
                                                    <!--Cédula del Administrador-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Cédula del Administrador">Cédula</span>
                                                        <input type="number" class="form-control" placeholder="Ingresar Cédula" id="nuevo_cedula" aria-describedby="Cédula del Administrador" >
                                                    </div>
                                                        <!--Nombre del Administrador-->
                                                        <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Nombre del Administrador">Nombre</span>
                                                        <input type="text" class="form-control" placeholder="Ingresar Nombre" id="nuevo_nombre" aria-describedby="Nombre del Administrador" >
                                                    </div> 
                                                    <!--Apellido del Administrador-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Apellido del Administrador">Apellido</span>
                                                        <input type="text" class="form-control" placeholder="Ingresar Apellido" id="nuevo_apellido" aria-describedby="Apellido del Administrador" >
                                                    </div> 
                                                    <!--Teléfono-->
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="Teléfono del Administrador">Teléfono</span>
                                                        <input type="tel" class="form-control" placeholder="Ingresar teléfono" id="nuevo_telefono" aria-describedby="Teléfono del Administrador" >
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
                                                    <button type="button" class="btn btn-secondary" onclick="borrar_formulario()" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit"class="btn btn-primary" >Registrar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <form class="form-floating ms-5 w-50" id="form_buscar" method="GET" action="">

                                        <input type="number" name="ced_admin" class="form-control mb-4" id="floatingInput" placeholder="Buscar Administradores">
                                        <label for="floatingInput">Cedula administrador</label>


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
                                        <th scope="col">Usuario </th>
                                        <th scope="col"> Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if(isset($_GET['ced_admin'])){
                                            $cedula = $_GET['ced_admin'];
                                            $admins_query = "select a.login,a.cedula,b.nombre,b.apellido,b.telefono from tbl_usuarios as a inner join tbl_personas as b on a.cedula = b.cedula where a.cedula like '$cedula%' and a.nivel_acceso = 'admin'";
                                            $admins = $pdo->prepare($admins_query);
                                            $admins->execute();
                                            $resultado_admins = $admins->fetchAll();
                                        }
                                        foreach ($resultado_admins as $data): ?>
                                    <tr>
                                        <td><?php echo $data['cedula'] ?></td>
                                        <td><?php echo $data['nombre'] ?></td>
                                        <td><?php echo $data['apellido'] ?></td>
                                        <td><?php echo $data['telefono'] ?></td>
                                        <td><?php echo $data['login'] ?></td>
                                        <td>  
                                            <div class="btn-group">
                                                <button class="btn btn-success edit" value="<?php echo $data['login'] ?>" data-bs-toggle="modal" data-bs-target="#Modificar-Admin<?php echo $data['login']; ?>"><span>Modificar</span> </button>
                                                    
                                                <a href="php/admin/delete_admin.php?usuario=<?php echo $data['login'] ?>">
                                                    <button class="btn btn-danger"> Eliminar </button>
                                                </a>
                                            </div>
                                              <!-- Modal-->
                                            <div class="modal fade" id="Modificar-Admin<?php echo $data['login']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="ModalLabel"> Modificar Administrador</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="form_modificar<?php echo $data['login'] ?>">
                                                            <div class="modal-body">
                                                            
                                                                <!--Cédula del Administrador-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Cédula_ admin">Cédula</span>
                                                                    <input type="number" id="cedula_<?php echo $data['login'] ?>" class="form-control" value="<?php echo $data['cedula'] ?>" placeholder="Ingresar Cédula" aria-describedby="Cédula del Administrador">
                                                                </div>
                                                                <!--Nombre del Administrador-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Nombre del Administrador">Nombre</span>
                                                                    <input type="text" id="nombre_<?php echo $data['login'] ?>" class="form-control" value="<?php echo $data['nombre'] ?>" placeholder="Ingresar Nombre" aria-describedby="Nombre del Administrador">
                                                                </div> 
                                                                <!--Apellido del Administrador-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Apellido del Administrador">Apellido</span>
                                                                    <input type="text" id="apellido_<?php echo $data['login'] ?>" class="form-control" value="<?php echo $data['apellido'] ?>" placeholder="Ingresar Apellido" aria-describedby="Apellido del Administrador">
                                                                </div> 
                                                                <!--Teléfono-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Teléfono del Administrador">Teléfono</span>
                                                                    <input type="tel" id="telefono_<?php echo $data['login'] ?>" class="form-control" value="<?php echo $data['telefono'] ?>" placeholder="Ingresar teléfono" aria-describedby="Teléfono del Administrador">
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
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="borrar_formulario()">Cerrar</button>
                                                                <button type="submit" value="<?php echo $data['login'] ?>" class="btn btn-primary"><span>Guardar cambios</span></button>
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
                        url: "php/buscar_persona.php",
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
                    let nuevo_usuario = $('#nuevo_usuario').val();
                    let nuevo_password = $('#nuevo_password').val();
                    if(nuevo_cedula.length == 0 || nuevo_nombre.length == 0 || nuevo_apellido.length == 0 || nuevo_telefono.length == 0 || nuevo_usuario.length == 0 || nuevo_password.length == 0 || document.getElementById('mensaje_usuario').innerHTML != '<p>El nombre de usuario esta disponible</p>'){
                        alert('Debes completar todos los campos correctamente');
                    }else{
                        $.ajax({
                            data: {nuevo_cedula,nuevo_nombre,nuevo_apellido,nuevo_telefono,nuevo_usuario,nuevo_password},
                            url: "php/admin/registrar_admin.php",
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

                let usuario_actual = $(this).val();

                $('#usuario_'+usuario_actual).blur(function(){
                    let usuario_validar = $('#usuario_'+usuario_actual).val();

                    $.ajax({
                        data: {usuario_validar,usuario_actual},
                        url: "php/comprobar_usuario_modificar.php",
                        type: "POST",
                        success: function(mensaje){
                            document.getElementById('mensaje_usuario_modificar'+usuario_actual).innerHTML= mensaje;
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
                    let modificar_usuario = $('#usuario_'+usuario_actual).val();
                    let modificar_password = $('#password_'+usuario_actual).val();

                    
                    if(modificar_cedula.length == 0 || modificar_nombre.length == 0 || modificar_apellido.length == 0 || modificar_telefono.length == 0 || modificar_usuario.length == 0 || document.getElementById('mensaje_usuario_modificar'+usuario_actual).innerHTML.length > 80 ){
                        alert("Debe rellenar todos los campos correctamente");
                    }else{

                        $.ajax({
                            data: {modificar_cedula,modificar_nombre,modificar_apellido,modificar_telefono,modificar_usuario,modificar_password,usuario_actual},
                            url: "php/admin/modificar_admin.php",
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