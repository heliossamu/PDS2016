
<?php
	$con_string = "host=ec2-54-243-203-104.compute-1.amazonaws.com port=5432 dbname=dddllblhhc280j user=nlxboferoxcyrf password=9UxFDo4CgJaq19oGkuC9WWznD3 sslmode=require";

	$conexao = pg_connect($con_string) or die ("Não foi possivel conectar ao servidor PostGreSQL");
	
?>