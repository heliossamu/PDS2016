<?php
	include '../conexao.php';

	/*
		Retorna as coordenadas cadastradas na tabela pessoa, dado o facebookid dela
	*/

	$facebookid = $_POST['facebookid'];
	$lat;
	$lng;
	$query = "select * from pessoa where facebooid = '".$facebookid."';";
	$res = pg_query($conexao, $query);
	if(pg_num_rows($res) > 0){
		while($row = pg_fetch_array($res)){
			$lat = $row['lat'];
			$maquina = $row['lng'];
		}
	}

	$json = "";
	$json .= '{';
	$json .= '"lat":' . $lat . ", ";
	$json .= '"lng":' . $lng;
	$json .= '}';
	echo $json;
	pg_close($conexao);
?>