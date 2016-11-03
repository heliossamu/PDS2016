<?php 
	$conexao = mysql_connect('localhost:4321', "mysql", "mysql") or print (mysql_error()); 
	mysql_select_db("getmedicine", $conexao) or print(mysql_error());
	//mysql_close($conexao); 
?>