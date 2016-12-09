<?php
	include '../conexao.php';

	/*
		Retorna as coordenadas cadastradas na tabela pessoa, dado o facebookid dela
	*/

	$facebookid = $_POST['facebookid'];
	$lat = 0.0;
	$lng = 0.0;
	$nome = "";
	$pessoaid;
	$query = "select lat, lng, pessoaid, nome from pessoa where facebookid = '".$facebookid."';";
	$res = pg_query($conexao, $query);
	if(pg_num_rows($res) > 0){
		while($row = pg_fetch_array($res)){
			$pessoaid = $['pessoaid'];
			$lat = $row['lat'];
			$lng = $row['lng'];
			$nome = $row['nome'];
		}
	}

	$json = "";
	$json .= '{';
	$json .= '"lat":' . $lat . ", ";
	$json .= '"lng":' . $lng . ", ";
	$json .= '"nome":' . $nome . ", ";
	$json .= '"pessoaid":' . $pessoaid;
	$json .= '}';
	echo $json;
	pg_close($conexao);
?>