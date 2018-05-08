<!DOCTYPE html>
<html>
<head>
	<title>Introdução ao jQuery</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
	<script src="validate/dist/jquery.validate.js"></script>
	<script src="validate/dist/additional-methods.js"></script>
	<script src="validate/dist/localization/messages_pt_BR.js"></script>
	<style type="text/css">
		html,body {
			margin:0;
			padding:0;
			overflow:hidden;
		}
		div {
			font-family:sans-serif;	
			display:inline-block;
			box-sizing:border-box;
		}
		.painel {
			border:1px solid gray;
			width:20vw;
			height:100vh;
			background-color:white;
			float:left;
			
		
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
			font-size: 0.7em;
		}

		.painel_principal {
			width:80vw;
			height:85vh;
			padding:2px;
			overflow:auto;
			float:left;
			border:1px solid gray;
		}
		.painel_mensagem {
			width:80vw;
			height:15vh;
			padding:2px;
			overflow:auto;
			float:left;
			border:1px solid gray;
			background-color:gray;
			color:white;
		}
		
		.minhaLista {
			list-style-type: none;
			margin:0;
			padding:0;
		}
	</style>
</head>
<body>
<div class="painel" id="pn1">
	<div class="painel_cabeca">
		<h2>Pessoas</h2>
	</div>
	<div class="painel_corpo">
		<ul class="minhaLista">
			<li><button id="btpessoa">Listar pessoas</button></li>
			<li><button id="btIncPessoa">Incluir pessoas</button></li>
		</ul>
		<h2>Matrículas</h2>
		<ul class="minhaLista">
			<li><button id="btmatricula">Consultar</button></li>
			<li><button id="btIncMatricula">Incluir</button></li>
		</ul>
		<h2>Cidades</h2>
		<ul class="minhaLista">
			<li><button id="btcidade">Consultar</button></li>
			<li><button id="btIncCidade">Incluir</button></li>
		</ul>
		<h2>Cursos</h2>
		<ul class="minhaLista">
			<li><button id="btcurso">Consultar</button></li>
			<li><button id="btIncCurso">Incluir</button></li>
		</ul>




		<h2>Turmas</h2>
		<ul class="minhaLista">
			<li><button id="btturma">Consultar</button></li>
			<li><button id="btIncTurma">Incluir</button></li>
		</ul>

		<h2>Situação</h2>
		<ul class="minhaLista">
			<li><button id="btsituacao">Consultar</button></li>
			<li><button id="btIncSituacao">Incluir</button></li>
		</ul>

		<h2>Usuários</h2>
		<ul class="minhaLista">
			<li><button id="btusuario">Consultar</button></li>
			<li><button id="btIncUsuario">Incluir</button></li>
		</ul>




		</div>
</div>
	<div class="painel_mensagem">mensagem
	</div>
	<div class="painel_principal">
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
	
	//lista pessoas
	$("#btpessoa").click(function() {
		$(".painel_principal").load("pessoa/consulta.php");
	});
	
	//inclui pessoas
	$("#btIncPessoa").click(function() {
		$(".painel_principal").load("pessoa/frm_inclui.php");
	});

	$("#btmatricula").click(function() {
		$(".painel_principal").load("matricula/consulta.php");
	});
	
	//inclui pessoas
	$("#btIncMatricula").click(function() {
		$(".painel_principal").load("matricula/frm_inclui.php");
	});


	$("#btcidade").click(function() {
		$(".painel_principal").load("cidade/consulta.php");
	});
	
	//inclui pessoas
	$("#btIncCidade").click(function() {
		$(".painel_principal").load("cidade/frm_inclui.php");
	});
	$("#btcurso").click(function() {
		$(".painel_principal").load("curso/consulta.php");
	});
	
	//inclui pessoas
	$("#btIncCurso").click(function() {
		$(".painel_principal").load("curso/frm_inclui.php");
	});

	
	











	$("#btturma").click(function() {
		$(".painel_principal").load("turmas/consulta.php");
	});
	
	//inclui pessoas
	$("#btIncTurma").click(function() {
		$(".painel_principal").load("turmas/frm_inclui.php");
	});
	$("#btsituacao").click(function() {
		$(".painel_principal").load("situacao/consulta.php");
	});
	
	//inclui pessoas
	$("#btIncSituacao").click(function() {
		$(".painel_principal").load("situacao/frm_inclui.php");
	});
	$("#btusuario").click(function() {
		$(".painel_principal").load("usuario/consulta.php");
	});
	
	//inclui pessoas
	$("#btIncUsuario").click(function() {
		$(".painel_principal").load("usuario/frm_inclui.php");
	});








































});//fim $(function)
</script>

</body>
</html>