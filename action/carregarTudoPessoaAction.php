<?php
	include '../conexao.php';
	/*
		Retorna as coordenadas cadastradas na tabela pessoa e a pessoaid. Vamos desconsiderar o facebookid do usuario atual.
		Exemplo: carrega todas as outras pessoas que nao sejam eu.
		Por ser chamada no mapa.js, sabemas qual o facebookid do usuario atual.
	*/

	$facebookid = $_POST['facebookid'];
	
	$retorno = '[';

	$query = "SELECT * FROM pessoa WHERE facebookid <> '". $facebookid ."'";
	$result = pg_query($conexao, $query);
	if (!$result) {
    	//die('Invalid query: ' . mysql_error());
	}else{
		$quant = pg_num_rows($result);
		$i = 0;
		while ($row = pg_fetch_array($result)) {
			$retorno .= '{';
			$retorno .= '"pessoaid":' . $row['pessoaid'] . ', "lat":' . $row['lat'] . ', "lng":' . $row['lng'];
			$retorno .= '}';			
			if($i != $quant-1){
				$retorno .= ', ';
			}
			$i++;
		}
	}

	$retorno .= ']';
	
	echo $retorno;

	pg_close($conexao);


?>