<?php
	include '../conexao.php';

	/*
		Retorna as coordenadas cadastradas na tabela pessoa, dado o facebookid dela
	*/

	$facebookid = $_POST['facebookid'];
	$lat = 0.0;
	$lng = 0.0;
	$query = "select lat, lng from pessoa where facebookid = '".$facebookid."';";
	$res = pg_query($conexao, $query);
	if(pg_num_rows($res) > 0){
		while($row = pg_fetch_array($res)){
			$lat = $row['lat'];
			$lng = $row['lng'];
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