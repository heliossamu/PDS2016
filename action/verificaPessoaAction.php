<?php
	include '../conexao.php';

	//pego o id passado pela funcao 'checkFacebookid' de 'first.js'
	$facebookid = $_POST['fbid'];
	$quant = 0;
	
	//query para contar a qtde de tuplas com o id recebido
	$query = "SELECT COUNT(pessoaid) AS quant FROM Pessoa WHERE facebookid = '" . $facebookid . "';";
	
	$result = pg_query($conexao, $query);
	if (!$result) {
    	//die('Invalid query: ' . mysql_error());
	}else{
		while ($row = mysql_fetch_assoc($result)) {
			$quant = $row['quant'];
		}
	}

	echo $quant;
	pg_close($conexao); 
?>