<?php
	include '../conexao.php';

	/*
		Retorna as coordenadas cadastradas na tabela pessoa, dado o facebookid dela
	*/

	$facebookid = $_POST['facebookid'];
	$query = "select pessoaid, nome from pessoa where facebookid = '".$facebookid."';";
	$nome = "";
	$pessoaid = "";
	$res = pg_query($conexao, $query);
	if(pg_num_rows($res) > 0){
		while($row = pg_fetch_array($res)){
			$pessoaid = $row['pessoaid'];
			$nome = $row['nome'];
		}
	}

	$json = "";
	$json .= '{';
	$json .= '"pessoaid":' . $pessoaid . ", ";
	$json .= '"nome":' . $nome;
	$json .= '}';
	echo $json;
	pg_close($conexao);
?>