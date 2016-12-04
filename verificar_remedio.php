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

						//echo "<div id='comprar-button'>Comprar</div>";

						echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style='text-align: center;'>';
						echo '<input type="hidden" name="cmd" value="_s-xclick">';
						echo '<input type="hidden" name="hosted_button_id" value="X6WV5KFKMT4T8">';
						echo '<input type="image" src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - A maneira fácil e segura de enviar pagamentos online!">';
						echo '<img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">';
						echo '</form>';

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