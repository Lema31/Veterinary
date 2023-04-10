<?php 

	include_once($_SERVER['DOCUMENT_ROOT'].'/Veterinaria/php/Connect.php');

	$cod_mascota = $_POST['cod_mascota_actual'];
	$cedula_vet = $_POST['cedula_vet'];
	$fecha_consulta = $_POST['fecha_consulta'];
	$estado = $_POST['estado'];
	$tratamiento = $_POST['tratamiento'];
	$frec_cardiaca = $_POST['frec_cardiaca'];
	$frec_respiratoria = $_POST['frec_respiratoria'];
	$revision_oftalmologica = $_POST['revision'];
	$temperatura = $_POST['temperatura'];


	$cod_consulta_query = 'select cod_consulta from tbl_consultas where cod_mascota = ? and fecha_consulta = ?';
	$cod_consulta_result = $pdo->prepare($cod_consulta_query);
	$cod_consulta_result->execute(array($cod_mascota,$fecha_consulta));
	$cod_consulta = $cod_consulta_result->fetch();

	if(empty($cod_consulta)){
		$add_consulta_query = 'insert into tbl_consultas (fecha_consulta,estado,tratamiento,frec_cardiaca,frec_respiratoria,temperatura,rev_oftalmologica,cod_mascota,ced_veterinario) values(?,?,?,?,?,?,?,?,?)';
		$add_consulta = $pdo->prepare($add_consulta_query);
		$add_consulta->execute(array($fecha_consulta,$estado,$tratamiento,$frec_cardiaca,$frec_respiratoria,$temperatura,$revision_oftalmologica,$cod_mascota,$cedula_vet));

	
		$cod_consulta_result = $pdo->prepare($cod_consulta_query);
		$cod_consulta_result->execute(array($cod_mascota,$fecha_consulta));
		$cod_consulta = $cod_consulta_result->fetch();

		$agregar_vacuna_query = 'insert into tbl_aplica (cod_consulta,cod_vacuna,dosis) values(?,?,?)';

		if($_POST['cod_vacuna1'] != null and $_POST['dosis1'] != null){
			$agregar_vacuna = $pdo->prepare($agregar_vacuna_query);
			$agregar_vacuna->execute(array($cod_consulta['cod_consulta'],$_POST['cod_vacuna1'],$_POST['dosis1']));
		}
		if($_POST['cod_vacuna2'] != null and $_POST['dosis2'] != null){
			$agregar_vacuna = $pdo->prepare($agregar_vacuna_query);
			$agregar_vacuna->execute(array($cod_consulta['cod_consulta'],$_POST['cod_vacuna2'],$_POST['dosis2']));
		}
		if($_POST['cod_vacuna3'] != null and $_POST['dosis3'] != null){
			$agregar_vacuna = $pdo->prepare($agregar_vacuna_query);
			$agregar_vacuna->execute(array($cod_consulta['cod_consulta'],$_POST['cod_vacuna3'],$_POST['dosis3']));
		}
		if($_POST['cod_medicina'] != null and $_POST['indicaciones'] != null){
			$agregar_medicina_query = 'insert into tbl_receta (cod_medicina,cod_consulta,indicaciones) values(?,?,?)';
			$agregar_medicina = $pdo->prepare($agregar_medicina_query);
			$agregar_medicina->execute(array($_POST['cod_medicina'],$cod_consulta['cod_consulta'],$_POST['indicaciones']));
		}

	}else{
		echo ("No se pueden registrar dos consultas para la misma mascota el mismo dia");
	}

	$agregar_vacuna = null;
	$cod_consulta_result = null;
	$add_consulta = null;
	$pdo = null;



 ?>