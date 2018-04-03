<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Exercicio01</title>
	<link rel="stylesheet" href="custom/jquery.mobile.icons.min.css">
	<link rel="stylesheet" href="custom/blue.css">
	<link rel="stylesheet" href="custom/blue.min.css">
	<link rel="stylesheet" href="custom/structure-1.4.5.min.css" />
	<link rel="stylesheet" href="custom/images/icons-png"> 
  	<script src="custom/jquery-1.11.1.min.js"></script> 
 	<script src="custom/jquery.mobile-1.4.5.min.js"></script> 
 	<style>
 		#paragrafo{
 			margin-top:-150px;
 			padding:10px;
 			margin-bottom: 10px;
 		}
 		.liClass{  			
 			font-size:18px; 
 			text-align: left;	
 			padding-left: 5px;
 			}
 			#image{
 				width: 150px;
 				height: 150px;
 				position: relative;
 			}
 			#habilitar{
 				display: none;
 			}
 	</style>
</head>
<body>
	<div data-role="page" id="body">
		<div data-role="header">
			<h1>Sistemas Informação</h1>
		</div><!--header-->
			<div role="main" class="ui-content">
				<p id="paragrafo">
					Olá, seja bem vindo ao Espaço Comunitário do Curso de Sistemas de Informação.
					Todos os alunos e professores do curso possuem acesso a este espaço, que tem por objetivo servir de local para divulgação e compartilhamento de informações para todos da comunidade do curso.
					Ajude a construí-lo! 
					Aproveite! Contribua! Participe! e Divulgue!				
				</p>
				
		        <div data-role="collapsible" id="habilitar" >
		            <h3>Dados Pessoais</h3>
						<div style="padding: 10px;">
				            <ul data-role="listview" data-inset="false" id="personas">
																	
						    </ul>
						</div>			                
				</div>							
			</div><!--content-->			
			<a href="#" class="ui-btn ui-btn-inline ui-icon-recycle ui-btn-icon-left" id="btn">Carregar JSON</a>			
	   
		<div data-role="footer">
			<h1><small>created by @Sistemas2018</small></h1>
		</div><!--footer-->
	</div><!-- page -->	

	<!-- carregamento loader -->
	<div class="ui-loader ui-corner-all ui-body-a ui-loader-default" id="carrega" style="background-color: #000; opacity: .7;">
		<span class="ui-icon-loading"></span>
			<h1>loading</h1>
	</div><!--carregamento loader-->


</body>
<script>
	var btn = document.getElementById("btn");
	var par = document.getElementById("paragrafo");
	var teste = document.getElementById("habilitar");
	

	btn.addEventListener("click", function(){
		setTimeout(function(){
		par.style.marginTop ="0px";
		par.style.transition = "1s";
		teste.style.display = "block";
			
		},3000);
	});

	// trasido outro arquivo para teste	
	var carrega = document.getElementById("carrega"); 
	var body = document.getElementById("body"); 

	btn.addEventListener("click", function(){
		
		exibe();
		setTimeout(esconde, 3000);
		setTimeout(mostrarJson, 3000);
		escondebotao();
	});
	function escondebotao(){
		btn.style.display = "none";
	}

	function exibe(){	
		body.style.opacity = "0.2";	
		carrega.style.display = "block";
	}
	function esconde(){	
		body.style.opacity = "1";		
		carrega.style.display = "none";
	}

	function mostrarJson(){
		var xhttp = new XMLHttpRequest();

		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var respuesta = JSON.parse(xhttp.responseText);			
				var personas = respuesta.personas;

				var salida = '';				

				for (var i = 0; i < personas.length; i++) {
					salida += '<li class="liClass" ><img src='+personas[i].image+' style="width:100px;height=80px; border-radius:2px;box-shadow:2px 2px 5px grey;">'+'<h3>'+personas[i].nombre+'</h3><p>Sobrenome: '+ personas[i].nickname+'<p class="ui-li-aside"><strong>'+personas[i].funcao+'</strong></p></li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium officia, voluptatem aliquam ab itaque laboriosam impedit sapiente, ratione fugiat nostrum numquam tempore accusantium sit nobis assumenda necessitatibus rerum. Reprehenderit, recusandae</p>.<hr>';
				}

				document.getElementById('personas').innerHTML = salida;

				}
			};
			xhttp.open("GET", "personas1.json", true);
			xhttp.send();
	}

</script>
</html>