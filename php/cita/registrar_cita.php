<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$cod_mascota = $_POST['cod_mascota_actual'];
	$cedula_veterinario = $_POST['cedula_vet'];
	$cedula_propietario = $_POST['cedula_propietario'];
	$fecha_cita = $_POST['fecha_cita'];
	$num_consultorio = $_POST['num_consultorio'];

	$add_cita_query = 'insert into tbl_citas (cod_mascota,fecha_cita,num_consultorio,ced_veterinario,ced_propietario) values(?,?,?,?,?)';
	$add_cita = $pdo->prepare($add_cita_query);
	$add_cita->execute(array($cod_mascota,$fecha_cita,$num_consultorio,$cedula_veterinario,$cedula_propietario));

	$add_cita = null;


 ?>