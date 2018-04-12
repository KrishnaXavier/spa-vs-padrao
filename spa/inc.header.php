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
		ultRequisao = {"pagina": "", "hash": ""}

		function carregarPagina(pagina){
			
			if(ultRequisao["pagina"] != pagina){

				ultRequisao["pagina"] = pagina

				console.log("carregando nova pagina")

				$.ajax({
					url: pagina,
					type: 'GET'
				})
				.done(function(data) {
					console.log("ajax success")
					$("#saida-dados")[0].innerHTML = data
					ultRequisao["hash"] = hashFnv32a(data, 1, 1)
										
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});

			}else{
				console.log("A pagina requisitada é a atual, vamos verificar se ouve alteração no codigo dessa pagina.");

				$.ajax({
					url: pagina,
					type: 'GET'
				})
				.done(function(data) {
					console.log("success")

					let hashPag = hashFnv32a(data, 1, 1)

					if(ultRequisao["hash"] != hashPag){
						$("#saida-dados")[0].innerHTML = data
						ultRequisao["hash"] = hashFnv32a(data, 1, 1)
						console.log("nova hash da "+pagina+" : "+ultRequisao["hash"]);
						console.log("pagina carregada")
					}else{
						console.log("A pagina que deseja carregar não precisa ser carregada por que ela não tem alterações.")
					}
										
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
			}
		}
		
		function hashFnv32a(str, asString, seed) {
			/*jshint bitwise:false */
			let i, l,
			hval = (seed === undefined) ? 0x811c9dc5 : seed;

			for (i = 0, l = str.length; i < l; i++) {
				hval ^= str.charCodeAt(i);
				hval += (hval << 1) + (hval << 4) + (hval << 7) + (hval << 8) + (hval << 24);
			}
			if( asString ){
        		// Convert to 8 digit hex string
        		return ("0000000" + (hval >>> 0).toString(16)).substr(-8);
        	}
        	return hval >>> 0;
        }
    </script>

    <nav>
    	<div class="nav-wrapper">
    		<a href="#!/inicio" onclick="carregarPagina('home.php')" class="brand-logo">SPA</a>
    		<ul id="nav-mobile" class="right hide-on-med-and-down">
    			<li><a href="#!/noticias" onclick="carregarPagina('noticias.php')">Notícias</a></li>
    			<li><a href="#!/entrar" onclick="carregarPagina('entrar.php')">Entrar</a></li>				
    		</ul>
    	</div>
    </nav>