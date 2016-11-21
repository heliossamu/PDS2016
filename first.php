<html>
	<head>
		<title>Social Medicine</title>
		<meta charset="utf-8">
		
		<link rel="stylesheet" type="text/css" href="css/first.css">
		<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
		<script type="text/javascript" src="js/functions.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

		<!--Adding fancybox lib-->
		<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
		<script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>

	</head>
	<body>
		<?php 
			require_once __DIR__ . '/facebook/autoload.php';
			require_once( 'facebook/Helpers/FacebookRedirectLoginHelper.php' );
			//require_once __DIR__ . '/vendor/autoload.php';
			require("vendor/autoload.php");
			session_start();
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

		<?php
			$fb = new Facebook\Facebook([
				'app_id' => '339187369764704',
				'app_secret' => 'cc622d04da31a557d12c0786ee3d0fba',
				'default_graph_version' => 'v2.2',
			]);

			$helper = $fb->getRedirectLoginHelper();
			try {
			  $accessToken = $helper->getAccessToken();
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			  // When Graph returns an error
			  echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			  // When validation fails or other local issues
			  echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  exit;
			}

			if (isset($accessToken)) {
			  	// Logged in!
			  	$_SESSION['facebook_access_token'] = (string) $accessToken;

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
				echo 'Name: ' . $user['name'];
				echo 'Id: ' . $user['id'];
			}

			/*
			
			use facebook\Helpers\FacebookRedirectLoginHelper;
			//use facebook\Exceptions\FacebookSDKException;

			$helper = new FacebookRedirectLoginHelper('https://getmedicine.herokuapp.com/index.php', '339187369764704', 'cc622d04da31a557d12c0786ee3d0fba');

			try {
			    $session = $helper->getSessionFromRedirect();
			} catch(Facebook\FacebookSDKException $e) {
			    $session = null;
			}


			if($session){
				$accessToken = $session->getAccessToken();
				$longLivedAccessToken = $accessToken->extend();

				//echo "long lived: " . $longLivedAccessToken;
				echo 'test';
			}else{
				echo "nao consegui o session";
			}
			*/
			
			/*
			// Send the request to Graph
			try {
			  $response = $fb->get('/me');
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			  // When Graph returns an error
			  echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			  // When validation fails or other local issues
			  echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  exit;
			}

			var_dump($response);
			*/
		?>


		
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
		</div>

		<div id="endereco-div">
			<div id='endereco-left'>
				<img src="images/marcar.png">
			</div><!--
			--><div id='endereco-right'>
				<h3>Bem vindo ao GetMedicine, seu portal de remédios.</h3>
				<p>Antes de começarmos, precisamos de um endereço. Ele é importante, pois é a partir dele que obtemos todos os remédios próximos. 
					Além disso, ele servirá de ponto de venda para os outros usuários caso você deseje realizar alguma venda futuramente. </p>

				<input type='text' id='endereco' name='endereco' placeholder='Insira um endereço válido.'>
				<div id='confirmar' name='confirmar' onclick='confirmButton()'>Confirmar</div>
			</div>
		</div>

		
		<!-- Maps API Javascript -->
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDJY_wjIELj_UP7FULQdkEsrRFsuoPipdI&sensor=false&libraries=places"></script>
        
        <script src="js/first.js"></script>

	</body>
</html>