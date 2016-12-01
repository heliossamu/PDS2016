<?php
	include '../conexao.php';

	//inserindo na tabela remedio do banco de dados
	$pessoaid = $_POST['pessoaid'];
	$nome = $_POST['nome'];
	$datavalidade = $_POST['datavalidade'];
	$sintomas = $_POST['sintomas'];
	$preco = $_POST['preco'];

	
	$query = "INSERT INTO remedio(pessoaid, nome, datavalidade, sintomas, preco) VALUES(".$pessoaid.",";
	$query .= "'".$nome."', '".$datavalidade."', '".$sintomas."', ".$preco.");";
	
	$res = pg_query($conexao, $query);
	if (!$res) {
    	//die('Invalid query: ' . mysql_error());
	}

	pg_close($conexao); 
?>