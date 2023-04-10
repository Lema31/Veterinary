<?php session_start();  ?>
<!DOCTYPE html>
<!--
Created using JS Bin
http://jsbin.com

Copyright (c) 2020 by kropfgames (http://jsbin.com/malezuh/21/edit)

Released under the MIT license: http://jsbin.mit-license.org
-->
<meta name="robots" content="noindex">
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title class="display-3">Veterinaria</title>
  <link rel="stylesheet" type="text/css" href="Estilos/pagina_principal.css">
  <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
</head>
  
<body>
  
  <?php include('nav-bar.php'); ?>
  
  <header>
    <div class="overlay">
    </div>
    <img src="img/Home_bg.jpg" >

    <div id="services-overview" class="py-5 text-center block container h-100">

      <div class="py-5">
        <i class="fa-solid fa-paw fa-3x"></i>
      </div>

      <h1 class="py-5">SIVEMAR</h1>
      <p class="lead">Haz de tu mascota la version más segura de si misma</p>
      <p>
        <a href="#featured-products-carousel" class = "btn btn-primary my-5 px-4 py-2">Conocer más →</a>
      </p>
      
    </div>
  </header>
  <!--home-->
  
  <div id="featured-products-carousel" class="carousel slide" data-ride="carousel">
    
    <ol class="carousel-indicators">
      
      <li data-target="#featured-products-carousel" data-slide-to="0" class="active">
      </li>
      
      <li data-target="#featured-products-carousel" data-slide-to="1">
      </li>
      
      <li data-target="#featured-products-carousel" data-slide-to="2">
      </li>
      
    </ol>
    
    <div class="carousel-inner">
      
      <div class="carousel-item active">
          <img src="img/animals1.jpg" class="d-block w-100 h-100">

        <div class="carousel-placeholder carousel-placeholder-1">
        </div>
        
        <div class="container">
          <div class="carousel-caption text-left">
            
            <h2>Amabilidad</h2>
            <p>Trataremos a tu mejor amigo de la mejor forma posible</p>
            <p>
              <a class="btn btn-lg btn-primary" href="#service-1" role="button">
                Conozca más
              </a>
            </p>
          </div>
        </div>
      </div>
      <!--item-->
      
      <div class="carousel-item">
        <img src="img/vet1.webp" class="d-block w-100 h-100">
        
        <div class="carousel-placeholder carousel-placeholder-2">
        </div>
        
        <div class="container">
          
          <div class="carousel-caption">
            
            <h2>Mejor servicio</h2>
            <p>Contamos con la mejor atencion que su mascota podria recibir</p>
            <p>
              <a class="btn btn-lg btn-primary" href="#service-2" role="button">
                Conozca más
              </a>
            </p>
            
          </div>
          
        </div>
        
      </div>
      <!--item-->
      
      <div class="carousel-item">
        <img src="img/distant mountain.jpg" class="d-block w-100 h-100">
        
        <div class="carousel-placeholder carousel-placeholder-3">
        </div>
        
        <div class="container">
          
          <div class="carousel-caption text-right">
            
            <h2>Variedad</h2>
            <p>Atendemos todo tipo de animales, desde los más comunes hasta los más exoticos </p>
            <p>
              <a class="btn btn-lg btn-primary" href="#service-3" role="button">
                Conozca más
              </a>
            </p>
            
          </div>
          
        </div>
        
      </div>
      <!--item-->
      
      <a class="carousel-control-prev" href="#featured-products-carousel" role="button" data-slide="prev">
        
        <span class="carousel-control-prev-icon" aria-hidden="true">
          
        </span>
        <span class="sr-only">Previous</span>
        
      </a>
      
      <a class="carousel-control-next" href="#featured-products-carousel" role="button" data-slide="next">
        
        <span class="carousel-control-next-icon" aria-hidden="true">
        </span>
        
        <span class="sr-only">Next</span>
        
      </a>
      
    </div>
    <!--carousel-->
    
  </div>
  <!--featured products-->
  
  <div id="services">

    <div class="row featurette py-5 block block-1"  id="service-1">
      
      <div class="col-md-5 py-5 text-center">
        <svg width="200px" height="200px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><title>file_type_husky</title><path d="M26.4,20c-.025.939-1.839,1.591-1.1,2.524,1.63.229.889,1.309,1.782,1.677-1.579,2.57-4.126,2.891-6.549,1.282a2.888,2.888,0,0,0-2.149-.423c-.37.593.181.662.533.748,1.7.339,3.421,2.972,9.185.464.769-.323.652-1.274.319-2.022.639-.272.678-.982.772-1.895C29.821,20.3,27.762,20.475,26.4,20Zm-9.063-4.467a7.737,7.737,0,0,0-2.422,1.013c.965.567,1.348,1.243,2.422,1.032s1.054-.9.631-1.706a.635.635,0,0,0-.631-.339ZM21.874,2c-1.312.06-2.44,3.574-3.778,6.065-3.846,1.6-4.809-.475-6.065-.134C9.892,3.572,6.716-.8,5.858,4.4c.189,3.926-1.378,4.25-1.239,9.853,0,0-2.8,5.626-1.655,10.605A6.646,6.646,0,0,0,8.492,30c.2-1.435,2.449-4.671,1.833-5.426-1.538-1.884-1.055-6.5,2.84-6.976.533-3.883,3.174-3.152,2.9-4.275-.847-3.518,2.806-1.876,3.419-.723,1.1,1.828,1.877,3.625,2.777,4.476a9.313,9.313,0,0,0,2.79,1.709c-.327-.2-3.127-2.573-3.947-4.476a12.545,12.545,0,0,1-.443-3.723c1.421-.223,1.994,2.168,3.537,4.337a.442.442,0,0,1,0,.386c-.212-.112-.286-.394-.542-.428-.233,0-.421.33-.421.737s.307.553.73.743a3.555,3.555,0,0,0,1.792,1.679l-1.9-5.559c-.07-3.482.3-6.963-1.719-10.445A.763.763,0,0,0,21.874,2Zm.018,1.11c.105,0,.2.069.289.231,1.053,1.979,1.092,6.625,1.084,8.268-.5-1.138-1.249-3.052-3.611-3.635,0,0,1.38-4.849,2.238-4.864ZM7.743,3.552c.48,0,1.026.28,1.658,1.434C10.414,6.832,11.14,8.06,11.493,8.7c.722,1.3-.316.272-.641,3.611a1.58,1.58,0,0,1-.8,1.311A10.85,10.85,0,0,1,7.735,8.552c-1.008,1.5.653,3.813.682,5.794a4.259,4.259,0,0,1-2.261.028c-.52-.26-.691-3.43.273-5.891.8-2.05.421-4.656.778-4.77C7.453,3.635,7.455,3.554,7.743,3.552Z" style="fill:#ffffff"/></svg>
      </div>
      
      <div class="col-md-7">
        <h2 class="featurette-heading py-5">Amabilidad.
          <span class="font-italic">Tu mascota tendra el mejor trato que puedas encontrar.
        </h2>
          
          <p class="lead">Su mascota se sentira totalmente comoda durante nuestro servicio ya que estamos
              especializados en el trato de todo tipo de mascotas para evitar cualquier tipo de inconveniente
          </p>
          
      </div>
      
    </div>
    <!--featurette-->
      
    <div class="row featurette py-5 block block-2" id="service-2">

      <div class="col-md-5 first-order-reponsive ml-5">
        
        <h2 class="featurette-heading py-5">Mejor servicio.
          <span class="font-italic">Contamos con veterinarios experimentados.
          </span>
        </h2>
        
        <p class="lead">Su mascota obtendra el mejor tratamiento, debido a la amplia experiencia de nuestro personal.
        </p>
        
      </div>
      
      <div class="col-md-6 py-5 text-center second-order-responsive">
        
        <?php include("img/vet-icon.svg") ?>
        
      </div>
      
    </div>
    <!--featurette-->
      
    <div class="row featurette py-5 block block-3" id="service-3">
      
      <div class="col-md-5 py-5 text-center ">
        
        <?php include("img/monkey-icon.svg") ?>
        
      </div>
      
      <div class="col-md-7">
        
        <h2 class="featurette-heading py-5">Variedad.
          <span class="font-italic">Tratamos a una amplia gama de especies.
          </span>
        </h2>
        
        <p class="lead">Sin importar la especie de tu mascota, seremos capaces de tratarla, para que vuelva a 
          la inmediatez posible a su hogar y que siga teniendo una vida feliz.
        </p>
        
      </div>
      
      
    </div>
    <!--featurette-->
      
    
  </div>
  <!--all products--->
    
    
  
  <section id="contact" class="contact mb-4 py-5 px-2 m-5">
    
    <h2 class="h2-responsive font-weight-bold text-center my-4">
      Contactanos
    </h2>
    
    <p class="text-center w-responsive mx-auto mb-5">
      Si tienes alguna pregunta no dudes en contactarnos, contestaremos a la brevedad posible
    </p>
    
    <div class="row">
      
      <div class="col-md-9 mb-md-0 mb-5">
        <form id="contact-form" name="contact-form" action="php_mailer2.php" method="POST">  
          
          <div class="row">
            
            <div class="col-md-6">
              
              <div class="md-form mb-0">
                
                <input type="text" id="name" name="name" class="form-control">
                <label for="username">
                  Nombre
                </label>
                
              </div>
              
            </div>
            
            <div class="col-md-6">
              
              <div class="md-form mb-0">
                
                <input type="email" id="email" name="email" class="form-control">
                <label for="email">
                  Email
                </label>
                
              </div>
              
            </div>
            
          </div>
          
          <div class="row">
            
            <div class="col-md-12">
              
              <div class="md-form mb-0">
                
                <input type="text" id="subject" name="subject" class="form-control">
                
                <label for="subject">
                  Asunto
                </label>
                
              </div>
              
            </div>
            
          </div>
          
          <div class="row">
            
            <div class="col-md-6">
              
              <div class="md-form">
                
                <textarea type="text" id="message" name="message" rows="4" class="form-control md-textarea no-resize">
                </textarea>
                
                <label for="message" class="mx-3">
                  Mensaje
                </label>
               
              </div>
              
            </div>
            <div class="col-md-4">

            </div>

          </div>

          <input type="submit" name="enviar" value="Enviar" class="btn btn-primary text-white" >
          
        </form>
        
        <!-- <div class="text-center text-md-left">
          
          <a class="btn btn-primary text-white" onclick="document.getElementById('contact-form').submit();">
            Send
          </a>
          
        </div> -->
        
        
      </div>

      
      <div class="col-md-3 text-center">
        
        <ul class="list-unstyled mb-0">
          
          <li>
            <i class="fas fa-envelope mt-4 fa-2x">
            </i>
            <p>luisema311@gmail.com</p>
          </li>

          <li>
            <i class="fa-solid fa-phone mt-4 fa-2x">
            </i>           
            <p>0412-0937388</p>
          </li>
          
        </ul>
      </div>
      
    </div>
    
  </section>
      
  
  <footer class="container">
    
    <p class="float-right">
      
      <a href="#">
        
        Back to top
        
      </a>
      
    </p>
    
    <p>
      &copy; Company Name
    </p>
      
    
  </footer>
    
    

  <script src="Bootstrap/js/bootstrap.min.js"></script>
  <script src="js/jquery-3.6.4.min.js"></script>
  <script src="https://kit.fontawesome.com/62c8c22c54.js" crossorigin="anonymous"></script>
  
</body>
  
</html>
