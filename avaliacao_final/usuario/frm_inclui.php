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
	geraInput('Usuário','nome',$usuário,$erros);
	geraInput('Senha','senha',$senha,$erros);

	?>

	<input type="button" id="btCadastrar" value="enviar">
</form>


<script type="text/javascript">
	
 
$(function(){
 
		 $("#form1").validate({
	  			rules: {
					nome: {
						required: true
					},
					senha: {
				      required: true,
				      
	    			}

				}
			});
		
		$("#btCadastrar").click(function() {
	     
		 if ($('#form1').valid()) {
	          $.post("usuario/inclui.php", $("#form1").serialize())
				  .done(function(data) { 	
				  		$(".painel_mensagem").html(data);
				  })
				  .fail(function(data) { 
				   	 $(".painel_mensagem").html("erro requisicao");
				 }); 
	        }

				
		});


});//fim $(function)
</script>