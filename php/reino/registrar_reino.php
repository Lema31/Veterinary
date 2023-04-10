<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$descripcion = $_POST['nuevo_descripcion'];

	$add_reino_query = 'insert into tbl_reinos (descripcion) values(?)';
	$add_reino = $pdo->prepare($add_reino_query);
	$add_reino->execute(array($descripcion));

	$add_reino = null;
	$pdo = null;

 ?>