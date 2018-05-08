<?php
require_once("../conecta.php");
require_once("../funcoes.php");
?>
<style type="text/css">
	.erro { 
		background-color:red;
		color:white;
		 }
</style>
<form method="post" enctype="multipart/form-data" id="form1">
<?php
	geraInput('Nome','nome',$nome,$erros);
	geraInput('Nascimento','nascimento',$nascimento,$erros);
	       //name tabela campo1  campo2   valor
	geraSelect("sexo","sexo","cdsexo","nmsexo",$sexo,"Sexo");        
	       //name    tabela   campo1     campo2    valor
	geraSelect("cidade","cidade","cdcidade","nmcidade",$cdcidadepessoa,"Cidade");
	?>
	Foto:<input type="file" name="imagem">
	<br>
	<input type="button" id="btCadastrar" value="enviar">
</form>


<script type="text/javascript">
	
//jquery chamado quando a página termina de carregar
$(function(){

		//validacao
		 $("#form1").validate({
	  			rules: {
					nome: {
						required: true
					},
					nascimento: {
				      required: true,
				      dateITA: true  //pega o name não o id
	    			},
	    			cidade: {
	    				required: true
	    			},
	    			sexo: {
	    				required: true
	    			}

				}
			});
		
		$("#btCadastrar").click(function() {
	     //somente manda a requisicao ajax se o formulário for válido!
		 if ($('#form1').valid()) {
	          $.post("pessoa/inclui.php", $("#form1").serialize())
				  .done(function(data) { //tudo certo com a requiscao 	
				  		$(".painel_mensagem").html(data);
				  })
				  .fail(function(data) { //erro na requisicao
				   	 $(".painel_mensagem").html("erro requisicao");
				 }); //fim post
	        }

				
		});


});//fim $(function)
</script>