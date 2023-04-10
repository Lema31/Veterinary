<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
	<title></title>
</head>
<body>             
                <aside class="col-1 barra-lateral vh-100 me-3 mt-5">
                    <h5 class="Menu"> Menu</h5>
                    <ul class="nav nav-pills text-center justify-content-start">
                        <li class="nav-item">
                            <a class="nav-link" id="admin" aria-current="page" href="admin.php">Administrador</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="veterinarios" aria-current="page" href="admin_veterinarios.php"> Veterinarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="propietarios" aria-current="page" href="admin_propietarios.php"> Propietarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="mascotas" aria-current="page" href="admin_mascotas.php"> Mascotas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="medicinas" aria-current="page" href="admin_medicinas.php"> Medicinas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="vacunas" aria-current="page" href="admin_vacunas.php"> Vacunas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="especies" aria-current="page" href="admin_especies.php"> Especies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="generos" aria-current="page" href="admin_generos.php"> Géneros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="familias" aria-current="page" href="admin_familias.php"> Familias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link "  id="ordenes" aria-current="page" href="admin_ordenes.php"> Ordenes</a>
                        </li>
                        <li>
                            <a class="nav-link"  id="clases" aria-current="page" href="admin_clases.php"> Clases</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="phylums" aria-current="page" href="admin_phylums.php"> Phylums</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" id="reinos" aria-current="page" href="admin_reinos.php"> Reinos</a>
                        </li>
                    </ul>
                </aside>
                      
        <script src="Bootstrap/js/bootstrap.min.js"></script>
        <script>
            if(location.pathname == '/Veterinaria/admin.php'){
                document.getElementById('admin').classList.add('active');
            }
            if(location.pathname == '/Veterinaria/admin_veterinarios.php'){
                document.getElementById('veterinarios').classList.add('active');
            }
            if(location.pathname == '/Veterinaria/admin_propietarios.php'){
                document.getElementById('propietarios').classList.add('active');
            }
            if(location.pathname == '/Veterinaria/admin_mascotas.php'){
                document.getElementById('mascotas').classList.add('active');
            }
            if(location.pathname == '/Veterinaria/admin_medicinas.php'){
                document.getElementById('medicinas').classList.add('active');
            }
            if(location.pathname == '/Veterinaria/admin_vacunas.php'){
                document.getElementById('vacunas').classList.add('active');
            }
            if(location.pathname == '/Veterinaria/admin_especies.php'){
                document.getElementById('especies').classList.add('active');
            }
            if(location.pathname == '/Veterinaria/admin_generos.php'){
                document.getElementById('generos').classList.add('active');
            }
            if(location.pathname == '/Veterinaria/admin_familias.php'){
                document.getElementById('familias').classList.add('active');
            }
            if(location.pathname == '/Veterinaria/admin_ordenes.php'){
                document.getElementById('ordenes').classList.add('active');
            }
            if(location.pathname == '/Veterinaria/admin_clases.php'){
                document.getElementById('clases').classList.add('active');
            }
            if(location.pathname == '/Veterinaria/admin_phylums.php'){
                document.getElementById('phylums').classList.add('active');
            }
            if(location.pathname == '/Veterinaria/admin_reinos.php'){
                document.getElementById('reinos').classList.add('active');
            }  

        </script>
</body>
</html>