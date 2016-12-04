<?php
	include '../conexao.php';
	/*
		Carrega as pessoas que possuem os remedios requisitados pelo filtro.
	*/

	$facebookid = $_POST['facebookid'];
	$remedio = "";
	$sintomas = "";
	if(isset($_POST['remedio']) && !empty($_POST['remedio'])){
		$remedio = $_POST['remedio'];
	}

	if(isset($_POST['remedio']) && !empty($_POST['remedio'])){
		$sintomas = $_POST['sintomas'];	
	}

	$retorno = '[';
	//select pessoa.pessoaid, lat, lng from remedio inner join pessoa on remedio.pessoaid = pessoa.pessoaid
	$query = "SELECT pessoa.pessoaid, lat, lng FROM remedio inner join pessoa on remedio.pessoaid = pessoa.pessoaid ";
	$query .= "WHERE pessoa.facebookid <> '" . $facebookid . "' ";
	if(!empty($remedio) || !empty($sintomas)){
		if(!empty($remedio)){
			$query .= " AND remedio.nome = '" . $remedio . "' ";
		}
		if(!empty($sintomas)){
			$query .= " AND remedio.sintomas = '" . $sintomas . "' ";
		}
	}

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