<!DOCTYPE html>
<html>
<head>	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link type="text/css" rel="stylesheet" href="css/style.css"/>		
	<link rel="shortcut icon" href="https://s.4cdn.org/image/favicon.ico">	
	<title>Aplicação</title>	
</head>

<body>	
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript">
		function carregarPagina(pagina){
			$.ajax({
				url: pagina,
				type: 'GET'
			})
			.done(function(data) {
				console.log("success");

				$("#saida-dados")[0].innerHTML = data;				
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}
	</script>

	<nav>
		<div class="nav-wrapper">
			<a href="#" onclick="carregarPagina('home.php')" class="brand-logo">HOME</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="#" onclick="carregarPagina('noticias.php')">Notícias</a></li>
				<li><a href="#" onclick="carregarPagina('entrar.php')">Entrar</a></li>				
			</ul>
		</div>
	</nav>