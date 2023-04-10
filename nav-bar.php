
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <i class="fa-solid fa-shield-dog fa-3x"></i>
  
  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
          <a class="nav-link" href="index.php">Inicio</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="index.php#featured-products-carousel">Conocer más</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="index.php#services">Servicios</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="index.php#contact">Contacto</a>
        </li>
        <?php if(!isset($_SESSION['cliente']) && !isset($_SESSION['admin']) && !isset($_SESSION['veterinario'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="login2.php">Inicio de sesion</a>
          </li>
        <?php endif ?>

        <?php if(isset($_SESSION['cliente'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="datos_propietarios.php">Perfil</a>
          </li>
        <?php endif ?>

        <?php if(isset($_SESSION['veterinario'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="veterinario.php">Perfil</a>
          </li>
        <?php endif ?>

        <?php if(isset($_SESSION['admin'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="admin.php">Perfil</a>
          </li>
        <?php endif ?>

        <?php if(isset($_SESSION['cliente']) or isset($_SESSION['admin']) or isset($_SESSION['veterinario'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="php/cerrar_sesion.php">Cerrar sesion</a>
          </li>
        <?php endif ?>
            
      </ul>
    </div>
  
  </nav>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/62c8c22c54.js" crossorigin="anonymous"></script>

</body>
</html>