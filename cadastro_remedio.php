<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/cadastro_remedio.css">

		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
		<script type="text/javascript" src="js/functions.js"></script>

	</head>
	<body>
		<div class="main-div">
			<div id="img-container">
				<div id="img-div"></div><!--
				--><div id="img-txt">Adicionar novo remédio</div>
			</div>
			<form id='cadastro_remedio' method='POST'>
				<?php
					echo "<input type='hidden' name='facebookid' id='facebookid' value='".$_GET['facebookid']."'>";
				?>

				<div id="form-div">
					<p>Nome do remédio:</p>
					<input id="nome" name="nome" type="text">
				</div>

				<div id="form-div">
					<p>Sintomas:</p>
					<input id="sintomas" name="sintomas" type="text">
				</div>

				<div id="form-div">
					<p>Data de validade:</p>
					<input id="datavalidade" name="datavalidade" type="text" style="width: 30%">
				<br>
				<br>
				<div id="button-div">
					<div onclick='insertMedicine()' >Add</div>
				</div>
				<div>
			</form>

		</div>
		<?php
			//echo $_GET['lat'];
		?>
	</body>

</html>