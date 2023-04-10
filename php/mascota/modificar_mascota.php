<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$codigo_actual = $_POST['codigo_actual'];
	$nombre = $_POST['modificar_nombre'];
	$fecha = $_POST['modificar_fecha'];
	$cedula_propietario = $_POST['modificar_cedula_propietario'];
	$cedula_usuario = $_POST['modificar_cedula_usuario'];
	$cod_especie = $_POST['modificar_especie'];

	$editar_mascota_query = 'update tbl_mascotas set ced_propietario = ?, nombre = ?, fecha_nacimiento = ?, ced_usuario = ?, cod_especie = ? where cod_mascota = ?';
	$editar_mascota = $pdo->prepare($editar_mascota_query);
	$editar_mascota->execute(array($cedula_propietario,$nombre,$fecha,$cedula_usuario,$cod_especie,$codigo_actual));

	$editar_mascota = null;
	$pdo = null;


 ?>