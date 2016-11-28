<?php
	include '../conexao.php';

	/*Faz a inclusao de uma pessoa no banco de dados
	  Necessita que as variaveis: 'facebookid', 'coordx' e
		'coordy' sejam enviadas para este módulo via ajax.

	  Este módulo pertence à página first.php
	*/
	$coordx = $_POST['coordx'];
	$coordy = $_POST['coordy'];
	$facebookid = $_POST['fbid'];
	
	//query para contar a qtde de tuplas com o id recebido
	$query = "INSERT INTO pessoa(facebookid, coordx, coordy) VALUES(". $facebookid .", 
		".$coordx.", ".$coordy.")";
	
	$result = mysql_query($query);
	/* Retorna 1 em caso de sucesso ou 0, caso contrário*/
	if (!$result){
    	echo "0";
	}else{
		echo "1";
	}
	mysql_close($conexao);
?>