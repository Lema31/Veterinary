<?php 

	include_once('Connect.php');

	$cod_vacuna1= $_POST['cod_vacuna1'];

	if(isset($_POST['cod_vacuna2'])){
		$cod_vacuna2 = $_POST['cod_vacuna2'];

		$vacunas_query = 'select * from tbl_vacunas where cod_vacuna != ? and cod_vacuna != ? order by nombre';
		$vacunas = $pdo->prepare($vacunas_query);
		$vacunas->execute(array($cod_vacuna1,$cod_vacuna2));
	}else{
		$vacunas_query = 'select * from tbl_vacunas where cod_vacuna != ?';
		$vacunas = $pdo->prepare($vacunas_query);
		$vacunas->execute(array($cod_vacuna1));
	}
	$resultado_vacunas = $vacunas->fetchAll();

	$html = "<option value=''>Seleccione una vacuna</option>";
	//
	foreach ($resultado_vacunas as $value) 
		$html.="<option value='".$value['cod_vacuna']."'>".$value['nombre']."</option>";
	echo $html;  

 ?>