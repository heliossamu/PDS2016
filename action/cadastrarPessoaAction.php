<?php
	include '../conexao.php';

	/*Faz a inclusao de uma pessoa no banco de dados
	  Necessita que as variaveis: 'facebookid', 'coordx' e
		'coordy' sejam enviadas para este módulo via ajax.

	  Este módulo pertence à página first.php
	*/
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$facebookid = $_POST['facebookid'];
	
	//query para contar a qtde de tuplas com o id recebido
	$query = "INSERT INTO pessoa(facebookid, lat, lng) VALUES(". $facebookid .", 
		".$lat.", ".$lng.")";
	
	$result = pg_query($conexao, $query);
	/* Retorna 1 em caso de sucesso ou 0, caso contrário*/
	if (!$result){
    	echo "0";
	}else{
		echo "1";
	}
	pg_close($conexao);
?>