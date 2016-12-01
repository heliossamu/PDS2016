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
		<?php
			session_start();
			require_once __DIR__ . '/facebook/autoload.php';
			require_once( 'facebook/Helpers/FacebookRedirectLoginHelper.php' );
			require("vendor/autoload.php");

			$fb = new Facebook\Facebook([
				'app_id' => '339187369764704',
				'app_secret' => 'cc622d04da31a557d12c0786ee3d0fba',
				'default_graph_version' => 'v2.2',
			]);

			$accessToken = $_SESSION['facebook_access_token'];
			try {
				// Returns a `Facebook\FacebookResponse` object
				$response = $fb->get('/me?fields=id,name', $accessToken);
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			    echo 'Graph returned an error: ' . $e->getMessage();
			    exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			    echo 'Facebook SDK returned an error: ' . $e->getMessage();
			    exit;
			}

			$user = $response->getGraphUser();
			$facebookid = $user['id']; //importante!! será usado no js/first.js

			echo "<input type='hidden' name='facebookid' id='facebookid' value='".$facebookid."'>";

		?>

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

			<div onclick="addMedicine()">Adicionar remédio</div>

			<div id="find-medicine-div">
				<input type="text" id="search_address" value="" style="width: 300px; margin-right: 20px"/>

				<input type="text" placeholder="Pesquisar: remédio ou sintomas.">
				<button><img src="images/search.png"></button>
			</div>

			<div><a href="index.php" onclick="FB.logout();">Logout</a> </div>

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