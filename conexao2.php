<?php 
	error_reporting(E_ERROR | E_PARSE);
	$conexao = mysql_connect('mysql.hostinger.com.br', "u358294057_mysql", "getmedicine") or print (mysql_error()); 
	mysql_select_db("u358294057_getme", $conexao) or print(mysql_error());
	//mysql_close($conexao); 
?>