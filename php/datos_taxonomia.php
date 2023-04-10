<?php 


	include_once('Connect.php');


	if (isset($taxon_level)) {
		if($taxon_level == "tbl_reinos"){
			$datos_taxonomia_query = 'select * from '.$taxon_level.'';	
		}

		if($taxon_level == 'tbl_phylums'){
			$datos_taxonomia_query = 'select a.cod_phylum,a.descripcion_phy,b.descripcion,b.cod_reino from tbl_phylums as a inner join tbl_reinos as b on a.cod_reino = b.cod_reino order by a.descripcion_phy';
		}

		if($taxon_level == 'tbl_clases'){
			$datos_taxonomia_query = 'select a.cod_clase,a.descripcion_cla,b.descripcion_phy,b.cod_phylum,b.cod_reino from tbl_clases as a inner join tbl_phylums as b on a.cod_phylum = b.cod_phylum order by a.descripcion_cla';
		}

		if($taxon_level == 'tbl_ordenes'){
			$datos_taxonomia_query = 'select a.cod_orden,a.descripcion_ord,b.descripcion_cla,b.cod_clase,b.cod_phylum,c.descripcion_phy,c.cod_reino from tbl_ordenes as a inner join tbl_clases as b on a.cod_clase = b.cod_clase inner join tbl_phylums as c on b.cod_phylum = c.cod_phylum order by a.descripcion_ord';
		}

		if($taxon_level == 'tbl_familias'){
			$datos_taxonomia_query = 'select a.cod_familia,a.descripcion_fam,b.cod_orden,b.descripcion_ord,c.cod_clase,c.descripcion_cla,d.cod_phylum,d.descripcion_phy,d.cod_reino from tbl_familias as a inner join tbl_ordenes as b on a.cod_orden = b.cod_orden inner join tbl_clases as c on b.cod_clase = c.cod_clase inner join tbl_phylums as d on c.cod_phylum = d.cod_phylum order by a.descripcion_fam';
		}

		if($taxon_level == 'tbl_generos'){
			$datos_taxonomia_query = 'select a.cod_genero,a.descripcion_gen,b.cod_familia,b.descripcion_fam,c.cod_orden,c.descripcion_ord,d.cod_clase,d.descripcion_cla,e.cod_phylum,e.descripcion_phy,e.cod_reino from tbl_generos as a inner join tbl_familias as b on a.cod_familia = b.cod_familia inner join tbl_ordenes as c on b.cod_orden = c.cod_orden inner join tbl_clases as d on c.cod_clase = d.cod_clase inner join tbl_phylums as e on d.cod_phylum = e.cod_phylum order by a.descripcion_gen';
		}

		if($taxon_level == 'tbl_especies'){
			$datos_taxonomia_query = 'select a.cod_especie,a.descripcion_esp,b.cod_genero,b.descripcion_gen,c.cod_familia,c.descripcion_fam,d.cod_orden,d.descripcion_ord,e.cod_clase,e.descripcion_cla,f.cod_phylum,f.descripcion_phy,f.cod_reino from tbl_especies as a inner join tbl_generos as b on a.cod_genero = b.cod_genero inner join tbl_familias as c on b.cod_familia = c.cod_familia inner join tbl_ordenes as d on c.cod_orden = d.cod_orden inner join tbl_clases as e on d.cod_clase = e.cod_clase inner join tbl_phylums as f on e.cod_phylum = f.cod_phylum order by a.descripcion_esp';
		}

		$datos_taxonomia = $pdo->prepare($datos_taxonomia_query);
		$datos_taxonomia->execute();
		$resultado_taxonomia = $datos_taxonomia->fetchAll();

	}
	



 ?>