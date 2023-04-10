<?php 
    include('php/Connect.php');
    if(isset($_GET['codigo'])){
        $cod_mascota = $_GET['codigo'];
        include('php/perfil_propietario/datos_mascota_especifica.php');
        include('php/perfil_propietario/datos_vacunas.php');
    }

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjeta de vacunacion</title>
    <link rel="stylesheet" href="Estilos/tarjeta_vacunacion_propietario.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Tarjeta de vacunacion de Mascota</h1>
        </div>
        <div class="info-basica">
            <div class="nombre">
                <p> <b>Nombre de la mascota:</b> </p>
                <p> <?php echo $resultado_mascota['nombre']; ?> </p>
            </div>
            <div class="fecha">
                <p> <b>Fecha de Nacimiento de la Mascota:</b> </p>
                <p> <?php echo $resultado_mascota['fecha_nacimiento']; ?> </p>
            </div>
        </div>
        <h2>Vacunas</h2>
        <?php foreach($resultado_vacunas as $vacuna): ?>
        <div class="info-vacunas">
            <div class="info-vacunas1">
                
                <div class="info-vacunas1-content">
                    <div class="nombreVacuna">
                        <p> <b>Nombre Vacuna</b> </p>
                        <p> <?php echo $vacuna['nombre'] ?> </p>
                    </div>
                    <div class="dosisVacuna">
                        <p> <b>Dosis Vacuna</b> </p>
                        <p> <?php echo $vacuna['dosis'] ?> </p>
                    </div>
                    <div class="fechaVacunacion">
                        <p> <b>Fecha de Vacunacion</b> </p>
                        <p><?php echo $vacuna['fecha_consulta'] ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            <div class="text-center">
                 <button class="btn btn-lg btn-primary mt-5 mb-4">descargar</button>               
            </div> 

        </div>
    </div>

    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.6.4.min.js"></script>
</body>
</html>