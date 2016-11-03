<?php
	include '../conexao.php';

	//inserindo dados na tabela remedio do banco de dados
	$remedioid = 1;
	$pessoaid = 1;
	$lat = round($_POST['lat'], 6);
	$lng = round($_POST['lng'], 6);
	$nome = $_POST['nome'];
	$sintomas = $_POST['sintomas'];
	$datavalidade = $_POST['datavalidade'];
	
	$query = "INSERT INTO remedio(pessoaid, nome, datavalidade, sintomas, coordx, coordy) VALUES(".$pessoaid.",";
	$query .= "'".$nome."', '".$datavalidade."', '".$sintomas."', '".$lat."', '".$lng."');";
	
	$result = mysql_query($query);
	if (!$result) {
    	//die('Invalid query: ' . mysql_error());
	}

	mysql_close($conexao); 
?>