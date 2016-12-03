<?php
	include '../conexao.php';

	//retorna um json com todos os pontos guardados no banco: tabela remedio
	$retorno = '[';

	$query = "SELECT * FROM remedio";
	$result = pg_query($conexao, $query);
	if (!$result) {
    	//die('Invalid query: ' . mysql_error());
	}else{
		$quant = pg_num_rows($result);
		$i = 0;
		while ($row = pg_fetch_array($result)) {
			$retorno .= '{';
			$retorno .= '"pessoaid":' . $row['pessoaid'] . ', "nome":' . $row['nome'] . ',';
			$retorno .= '"nome":"' . $row['nome'] . '", "sintomas":"' . $row['sintomas'] . '",';
			$retorno .= '"datavalidade":"' . $row['datavalidade'] . '"';
			$retorno .= '}';			
			if($i != $quant-1){
				$retorno .= ', ';
			}
			$i++;
		}
	}

	//$retorno .= '{"lat": -17.776, "lng": -49.9823, "nome": "abc", "sintomas": "dor cabeca"}';
	//$retorno .= ',{"lat": -20, "lng": -49, "nome": "abc", "sintomas": "dor cabeca"}';


	$retorno .= ']';
	
	echo $retorno;

	pg_close($conexao);
?>