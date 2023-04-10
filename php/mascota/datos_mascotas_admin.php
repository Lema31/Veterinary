<?php 
	
	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$datos_mascotas_query = 'select a.cod_mascota,a.nombre,a.ced_propietario,a.fecha_nacimiento,b.cod_especie,b.descripcion_esp,c.cod_genero,c.descripcion_gen,d.cod_familia,d.descripcion_fam,e.cod_orden,e.descripcion_ord,f.cod_clase,f.descripcion_cla,g.cod_phylum,g.descripcion_phy,g.cod_reino from tbl_mascotas as a inner join tbl_especies as b on a.cod_especie = b.cod_especie inner join tbl_generos as c on b.cod_genero = c.cod_genero inner join tbl_familias as d on c.cod_familia = d.cod_familia inner join tbl_ordenes as e on d.cod_orden = e.cod_orden inner join tbl_clases as f on e.cod_clase = f.cod_clase inner join tbl_phylums as g on f.cod_phylum = g.cod_phylum order by a.nombre';
	$datos_mascotas = $pdo->prepare($datos_mascotas_query);
	$datos_mascotas->execute();
	$resultado_mascotas = $datos_mascotas->fetchAll();
	
	$usuario = $_SESSION['admin'];
	
	$datos_usuario_query = 'select * from tbl_usuarios where login = ?';
	$datos_usuario = $pdo->prepare($datos_usuario_query);
	$datos_usuario->execute(array($usuario));
	$resultado_usuario = $datos_usuario->fetch();

	$cedula_usuario = $resultado_usuario['cedula'];

	$datos_mascotas = null;
	$datos_usuario = null;


 ?>