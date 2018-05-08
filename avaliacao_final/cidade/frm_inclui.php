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
<form method="post" enctype="multipart/form-data" id="form2">
<?php
	geraInput('Nome','nmcidade',$nmcidade,$erros);
	geraSelect("ufcidade","estado","cdestado","nmestado",$ufcidade,"Estado");
	?>
	<br>
	<input type="button" name="acao" value="enviar" id="bt2Cadastrar">
</form>
<script type="text/javascript">
	


$(function(){
		 $("#form2").validate({
	  			rules: {
					nmcidade: {
						required: true
					},
					ufcidade: {
				      required: true
	    			}

				}
			});

	
	$("#bt2Cadastrar").click(function() {
		 if ($('#form2').valid()) {
	          $.post("cidade/inclui.php", $("#form2").serialize())
				  .done(function(data) { 	
				  		$(".painel_principal").html(data);
				  })
				  .fail(function(data) { 
				   	 $(".painel_mensagem").html("erro requisicao");
				 }); 
	        }

	});	
		
});
</script>
