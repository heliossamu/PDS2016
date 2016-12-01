<?php
	include '../conexao.php';

	/*
		Retorna as coordenadas cadastradas na tabela pessoa, dado o facebookid dela
	*/

	$facebookid = $_POST['facebookid'];
	$pessoaid;
	$query = "select pessoaid from pessoa where facebookid = '".$facebookid."';";
	$res = pg_query($conexao, $query);
	if(pg_num_rows($res) > 0){
		while($row = pg_fetch_array($res)){
			$pessoaid = $row['pessoaid'];
		}
	}

	echo $pessoaid;
	pg_close($conexao);
?>