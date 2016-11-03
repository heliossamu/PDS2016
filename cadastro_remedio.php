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
				--><div id="img-txt">Adding a new Medicine</div>
			</div>
			<form id='cadastro_remedio' method='POST'>
				<?php
					echo "<input id='lat' name='lat' type='hidden' value='" . $_GET['lat'] . "'>";
					echo "<input id='lng' name='lng' type='hidden' value='". $_GET['lng'] ."'>";
				?>

				<div id="form-div">
					<p>Medicine Name:</p>
					<input id="nome" name="nome" type="text">
				</div>

				<div id="form-div">
					<p>Symptoms:</p>
					<input id="sintomas" name="sintomas" type="text">
				</div>

				<div id="form-div">
					<p>Expiration Date:</p>
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
			//echo $_GET['lng'];
		?>
	</body>

</html>