<html>
	<head>
		<title>Social Medicine</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
		<script type="text/javascript" src="js/functions.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

		<!--Adding fancybox lib-->
		<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
		<script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>

	</head>
	<body>
		<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '339187369764704',
		      xfbml      : true,
		      version    : 'v2.7'
		    });
		  };

		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>

		
		
		<div class="menu">
			<div id="logo-div">
				<img src="images/logo.png">
			</div>

			<!--
			<div>
				<ul>
					<li><a href="#">Teste 1</a></li>
				</ul>	
			</div>
			-->
			

			<div id="find-medicine-div">
				<input type="text" id="search_address" value="" style="width: 300px; margin-right: 20px"/>

				<input type="text" placeholder="Pesquisar: remédio ou sintomas.">
				<button><img src="images/search.png"></button>
			</div>
			<div id="user-info">
				<img src="images/teste.jpg">
				Helio Nakayama
			</div>
		</div>

		<div class="main-div">
			<div class="friend-list">

			</div><!--
			--><div class="map">
				<div id="map-area">
				<div>
			</div>
		</div>


		<!-- Maps API Javascript -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJY_wjIELj_UP7FULQdkEsrRFsuoPipdI&sensor=false&libraries=places"></script>
        <!-- Arquivo de inicialização do mapa -->
        <script src="js/mapa.js"></script>

	</body>
</html>