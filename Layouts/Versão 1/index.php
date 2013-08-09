<!DOCTYPE html>
<html>
	<head>
		<title>InfraAnalisys</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

		<style type="text/css">
		.logo {
			max-width: 260px;
			text-shadow: 0 0 0 rgba(255,255,255,0), 0 0 30px rgba(255,255,255,0);
			-webkit-transition: all .2s ease-in-out;
			  -moz-transition: all .2s ease-in-out;
			  -o-transition: all .2s ease-in-out;
			  transition: all .2s ease-in-out;
		}
			.logo img.invert {
				float: left;
				-webkit-filter: invert(100%);
					-moz-filter: invert(100%);
					-ms-filter: invert(100%);    
					-o-filter: invert(100%);
				filter: invert(100%);
			}
			.logo .logoText {
				color: #FFF;
				float: left;
				padding: 15px 5px;
				margin-left: 10px;
				font-size: 28px;
				
			}
		.logo:hover {
			/*color: #333;*/
			text-shadow: 1px 2px 0 rgba(255,255,255,.1), 0 0 30px rgba(255,255,255,1.4);
			-webkit-transition: all .2s ease-in-out;
			  -moz-transition: all .2s ease-in-out;
			  -o-transition: all .2s ease-in-out;
			  transition: all .2s ease-in-out;
		}
		</style>
	</head>
	<body>

		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
			<a class="navbar-brand logo" href="#"><img class="invert" height="50"src="img/logo.svg"><span class="logoText">InfraAnalisys</span></a>
			<div class="nav-collapse collapse pull-right">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Comandos</a></li>
					<li><a href="#about">Sobre n&oacute;s</a></li>
					<li><a href="#contact">Contato</a></li>
					<li>|</li>
					<li><a href="#login">Entrar</a></li>
					<li><a href="#help">Ajuda</a></li>
				</ul>
			</div><!--/.nav-collapse -->
			</div>
		</div>



		<h1>Hello, world!</h1>

		<!-- JavaScript plugins (requires jQuery) -->
		<script src="http://code.jquery.com/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Optionally enable responsive features in IE8. Respond.js can be obtained from https://github.com/scottjehl/Respond -->
		<script src="js/respond.js"></script>
	</body>
</html>