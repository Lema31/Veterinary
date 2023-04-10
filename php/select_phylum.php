<?php 

	include_once('Connect.php');

	$codigo_reino = $_POST['codigo'];

	$phylums_query = 'select * from tbl_phylums where cod_reino = ?';
	$phylums = $pdo->prepare($phylums_query);
	$phylums->execute(array($codigo_reino));
	$resultado_phylums = $phylums->fetchAll();

	$html = "<option value=''>Seleccione un phylum</option>";

	foreach ($resultado_phylums as $value) 
		$html.="<option value='".$value['cod_phylum']."'>".$value['descripcion_phy']."</option>";
	echo $html;  

 ?>