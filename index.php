<html>
	<head>
		<title>Social Medicine</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/login.css">

		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
	</head>
	<body>
		<?php 
			require_once __DIR__ . '/facebook/autoload.php';
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
			  'app_id' => '339187369764704', // Replace {app-id} with your app id
			  'app_secret' => 'cc622d04da31a557d12c0786ee3d0fba',
			  'default_graph_version' => 'v2.2',
			  ]);

			$helper = $fb->getRedirectLoginHelper();

			$permissions = ['email', 'user_friends']; // Optional permissions
			$loginUrl = $helper->getLoginUrl('https://getmedicine.herokuapp.com/first.php', $permissions);

			
		?>



		<div class="login-aux-div">
			<div class="login-div">
				<img id="logo-img" src="images/user.png"></img>

				<div id="welcome-info">Bem vindo ao GetMedicine!<div>

				<?php
					echo "<div id='face-button' onclick=\"window.location='" . htmlspecialchars($loginUrl) . "'\">"
				?>
					<div id="face-img"></div><!--
					--><div id="face-txt">Fazer login com o Facebook</div>
				</div>

				<div id="credits">Devenvolvido pela Compattic Software</div>
			</div>
		</div>


		
	</body>
</html>