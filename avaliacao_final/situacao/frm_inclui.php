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
<form method="post" id="form1">
<?php
	geraInput('Situação','nome',$nome,$erros);

	?>

	<input type="button" id="btCadastrar" value="enviar">
</form>


<script type="text/javascript">
	

$(function(){

		//validacao
		 $("#form1").validate({
	  			rules: {
					nome: {
						required: true
					}

				}
			});
		
		$("#btCadastrar").click(function() {
	    

		 if ($('#form1').valid()) {
	          $.post("situacao/inclui.php", $("#form1").serialize())
				  .done(function(data) { 

				  		$(".painel_mensagem").html(data);
				  })
				  .fail(function(data) { 
				   	 $(".painel_mensagem").html("erro requisicao");
				 }); 
	        }

				
		});


});
</script>