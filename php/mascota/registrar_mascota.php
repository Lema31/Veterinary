<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$nombre = $_POST['nuevo_nombre'];
	$fecha_nacimiento = $_POST['nuevo_fecha'];
	$cedula_propietario = $_POST['nuevo_cedula_propietario'];
	$cedula_usuario = $_POST['nuevo_cedula_usuario'];
	$cod_especie = $_POST['nuevo_especie'];

	$add_mascota_query = 'insert into tbl_mascotas (ced_propietario,nombre,fecha_nacimiento,ced_usuario,cod_especie) values(?,?,?,?,?)';
	$add_mascota = $pdo->prepare($add_mascota_query);
	$add_mascota->execute(array($cedula_propietario,$nombre,$fecha_nacimiento,$cedula_usuario,$cod_especie));

	$add_mascota = null;
	$pdo = null;

 ?>