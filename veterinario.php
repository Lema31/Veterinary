<?php 
    session_start();
    include('php/datos_veterinario.php');

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
                <aside class="mt-5 col-1 pt-2 barra-lateral vh-100 me-3">
                    <h5 class="Menu"> Menu</h5>
                    <ul class="nav nav-pills text-center justify-content-start">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="veterinario.php">Veterinario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="veterinario-propetarios.php">Buscar Mascota</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="veterinario-citas.php">Citas</a>
                        </li>
                        <!-- <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="veterinario-consulta.php">Consulta</a>
                        </li> -->
                    
                    </ul>
                </aside>
                
                <section class="col pt-2 ms-5 mt-5">
                    <h1> Datos del Veterinario</h1>
                   <div class="text-start">
                        <p> <b> Nombre Usuario:</b> <?php echo $usuario; ?></p>
                        <!-- <p>Contraseña: <button class="btn btn-success">Modificar</button></p> -->
                        <p> <b>Cédula: </b><?php echo $cedula; ?></p>
                        <p> <b>Nombre: </b><?php echo $nombre; ?></p>
                        <p> <b>Apellido: </b><?php echo $apellido; ?></p>
                        <p> <b>Teléfono: </b><?php echo $telefono; ?></p>
                        <p><b>Experiencia laboral: </b><?php echo $experiencia; ?></p>
                        <p><b>Estudios: </b><?php echo $estudios; ?></p>
                        <p><b>Número de Colegio: </b><?php echo $num_colegio; ?></p>
                    </div>
                </section>

                
                

            </div>


        </div>

        <script src="Bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery-3.6.4.min.js"></script>

    </body>
</html>