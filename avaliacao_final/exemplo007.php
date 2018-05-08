<!DOCTYPE html>
<html>
<head>
	<title>Introdução ao jQuery</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
	<style type="text/css">
		div {
			font-family:sans-serif;	
			display:inline-block;
			box-sizing:border-box;
		}
		.painel {
			border:1px solid gray;
			width:300px;
			height:500px;
			background-color:white;
		
		}
		.painel_cabeca {
			width:100%;
			height:50px;
			background-color:teal;	
			display:inline-block;
			color:white;	
			padding:2px;
		}

		.painel_corpo {
			width:100%;
			height:950px;
			padding:2px;
			overflow:auto;
		}
		
		.minhaLista {
			list-style-type: none;
			margin:0;
			padding:0;
		}
	</style>
</head>
<body>
<h1>Fazendo uma busca dinâmica no banco através de AJAX</h1>
	<form id="form1" method="post">
		Filtrar clinte:<input type="text" id="cliente" name="cliente">
		<input type="button" id="btn1" value="enviar">
	</form>
	<div class="painel" id="pn1">
		<div class="painel_cabeca">
			Pedidos
		</div>
		<div class="painel_corpo">
		
		</div>
	</div>
<script>


//////////////////////////////////
//função para carregamento dos dados
function carregaDados(){
	//guarda o valor da caixa cliente na variavel nomeCliente
	var nomeCliente = $("#cliente").val();
	//faz uma requisção GET ao PHP passando a variaverl nomeCliente
	$.get("lista_pedidos_com_filtro.php",{cliente:nomeCliente})
		  .done(function(data) { //tudo certo com a requiscao 
		  	//mostra dos dados retornados pelo PHP 
		  	//no painel
	   		$(".painel_corpo").html(data);
		  })
		  .fail(function(data) { //erro na requisicao
		   	 $(".painel_corpo").html("erro requisicao");
		  }); //fim post
}
//////////////////////////////////


//jquery chamado quando a página termina de carregar
$(function(){
	
	//chama função a primeira vez que a página é carregada
	carregaDados();
	//click do botao
	$("#btn1").click(function(){
		  //chama a função 
		  carregaDados();
  	}); //fim click

	//busca em tempo real quando o usuário digita
	//na caixa cliente
	$("#cliente").keyup(function(){
		//chama a função 
		  carregaDados();
  	});
});//fim $(function)

</script>
<hr><a href="exemplo006.php">Exemplo 6</a> -
 <a href="exemplo008.php">Exemplo 8</a>
</body>
</html>