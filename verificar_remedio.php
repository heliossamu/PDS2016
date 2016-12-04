<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/verificar_remedio.css">

		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
		<script type="text/javascript" src="js/functions.js"></script>

	</head>
	<body>
		<?php 
			echo "<input type='hidden' id='pessoaid' name='pessoaid' value='".$_GET['pessoaid']."'>";
			
			include 'conexao.php';
			//inserindo na tabela remedio do banco de dados
			$pessoaid = $_GET['pessoaid'];
			$nomeremedio = "";
			$sintomas = "";

			if(isset($_GET['nomeremedio']) && !empty($_GET['nomeremedio'])){
				$nomeremedio = $_GET['nomeremedio'];
			}

			if(isset($_GET['sintomas']) && !empty($_GET['sintomas'])){
				$sintomas = $_GET['sintomas'];
			}

			$query = "SELECT * FROM remedio WHERE pessoaid = " . $pessoaid . " ";
			if(!empty($nomeremedio) || !empty($sintomas)){
				if(!empty($nomeremedio)){
					$query .= " AND nome = '" . $nomeremedio . "' ";
				}

				if(!empty($sintomas)){
					$query .= " AND sintomas = '" . $sintomas ."' ";
				}
			}

			$res = pg_query($conexao, $query);
			if(pg_num_rows($res) > 0){
				while($row = pg_fetch_array($res)){
					echo "<div id='remedio-div'>";
						echo "<p><b>Nome:</b> ". $row['nome'] ."  &nbsp&nbsp  <b>Data Validade:</b> ". $row['datavalidade'] ."</p>";
						echo "<p><b>sintomas:</b> ". $row['sintomas'] ." &nbsp&nbsp <b>Preço:</b> ". $row['preco'] ."</p>";

						echo "<div id='comprar-button'>Comprar</div>";
					echo "</div>";
					echo "<br>";
				}
			}

			pg_close($conexao); 
		?>

		<!--
		<div id='remedio-div'>
			<p>Nome: TEste  -  Data Validade: 12/12/2016</p>
			<p>sintomas: teste - Preço: 12.69</p>

			<div id='comprar-button'>Comprar</div>
		</div>
		-->


	</body>

</html>