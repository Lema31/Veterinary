<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$codigo = $_POST['codigo'];
	$partes = explode('_', $codigo);
	$fecha_cita = $_POST['fecha_cita'];
	$num_consultorio = $_POST['num_consultorio'];

	$editar_cita_query = 'update tbl_citas set fecha_cita = ?,num_consultorio = ? where fecha_cita = ? and cod_mascota = ? ';
	$editar_cita = $pdo->prepare($editar_cita_query);
	$editar_cita->execute(array($fecha_cita,$num_consultorio,$partes[0],$partes[1]));

	$editar_cita = null;
	$pdo = null;

 ?>