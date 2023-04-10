<?php 
    session_start();
    include('php/Connect.php');
    if(isset($_GET['codigo'])){
        $cod_mascota = $_GET['codigo'];
        include('php/perfil_propietario/datos_vacunas.php');
        $vacunas_query = 'select * from tbl_vacunas order by nombre';
        $vacunas = $pdo->prepare($vacunas_query);
        $vacunas->execute();
        $tbl_vacunas = $vacunas->fetchAll();
    }

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
       <?php include('nav-bar.php') ?>
        <div class="container-fluid">
            <div class="row text-center mt-5">
            
                <section class="col ms-5 mt-4">
                    <h1 class="my-5"> Vacunas </h1>
                   <div class="text-start">

                        <div class="row text-center">
                            
                        
                               <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Código</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Dosis</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col"> Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($resultado_vacunas as $vacuna):;
                                        $codigo = $vacuna['cod_consulta'].'_'.$vacuna['cod_vacuna']; ?>
                                    <tr>
                                        <td scope="row"><?php echo $vacuna['cod_vacuna'] ?></td>
                                        <td><?php echo $vacuna['nombre'] ?></td>
                                        <td><?php echo $vacuna['dosis'] ?></td>
                                        <td><?php echo $vacuna['fecha_consulta'] ?></td>
                                        <td>  
                                            <div class="btn-group">
                                                <button class="btn btn-success edit" value="<?php echo $codigo; ?>" data-bs-toggle="modal" data-bs-target="#Modificar-Vacuna<?php echo $codigo; ?>"><span>Modificar</span></button>

                                                <a href="php/delete_vacuna_tarjeta.php?cod_consulta=<?php echo $vacuna['cod_consulta'] ?>&cod_vacuna=<?php echo $vacuna['cod_vacuna'] ?>&cod_mascota=<?php echo $cod_mascota ?>">
                                                    <button class="btn btn-danger"> Eliminar </button>
                                                </a>
                                            </div>
                                            
                                            <!-- Modal-->
                                            <div class="modal fade" id="Modificar-Vacuna<?php echo $codigo; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="ModalLabel"> Modificar Vacuna</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="form_modificar<?php echo $codigo; ?>">
                                                            <div class="modal-body">
                                                                
                                                                <!--Nombre de la vacuna-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Nombre Vacuna">Nombre de la vacuna</span>
                                                                    <select class="form-control" id="nombre_<?php echo $codigo; ?>">

                                                                        <?php 
                                                                        foreach($tbl_vacunas as $fila_vacuna):
                                                                        if($vacuna['cod_vacuna'] == $fila_vacuna['cod_vacuna']): ?>
                                                                            <option value="<?php echo $fila_vacuna['cod_vacuna']; ?>" selected><?php echo $fila_vacuna['nombre']; ?></option>
                                                                        <?php else: ?>
                                                                            <option value="<?php echo $fila_vacuna['cod_vacuna']; ?>"><?php echo $fila_vacuna['nombre']; ?></option>
                                                                        <?php endif; 
                                                                            endforeach
                                                                        ?>
                                                                    </select>
                                                                </div> 
                                                                <!--Dosis-->
                                                                <div class="input-group mb-3">
                                                                    <span class="input-group-text" id="Dosis">Dosis de la Vacuna</span>
                                                                    <input type="text" value="<?php echo $vacuna['dosis'] ?>" id="dosis_<?php echo $codigo; ?>"  class="form-control" placeholder="Ingrese la Dosis" aria-describedby="Dosis">
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
            const getCurrentDateFormatted = () => new Date(new Date().getTime() - (new Date().getTimezoneOffset() * 60 * 1000)).toISOString().split('T')[0]

            function recargar(){
                setTimeout(function(){
                    location.reload();
                }, 300);
            }

            $(document).on('click','.edit', function(){
                let codigo = $(this).val();              

                $('#form_modificar'+codigo).submit(e =>{
                    e.preventDefault();
                    let cod_vacuna = $('#nombre_'+codigo).val();
                    let dosis = $('#dosis_'+codigo).val();
                    

                    if(cod_vacuna.length == 0 || dosis.length == 0){
                        alert("Debe rellenar todos los campos");
                    }else{

                        $.ajax({
                            data: {codigo,cod_vacuna,dosis},
                            url: "php/modificar_vacunas_veterinarios.php",
                            type: "POST",

                            success: recargar()
                                
                            
                        })
                    }
                })
            })
            
        </script>

    </body>
</html>