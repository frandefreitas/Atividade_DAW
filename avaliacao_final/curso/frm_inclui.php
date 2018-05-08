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
	geraInput('Nome','nmcurso',$nmcurso,$erros);
	geraInput('Semestres','semestres',$semestres,$erros);
	geraInput('Horas','horas',$horas,$erros);
	geraInput('Nivel','nivel',$nivel,$erros);
	?>
	<br>
	<input type="button" name="acao" value="enviar" id="bt2Cadastrar">
</form>
<script type="text/javascript">
	
			//validacao

	//jquery chamado quando a página termina de carregar
$(function(){
		 $("#form2").validate({
	  			rules: {
					nmcurso: {
						required: true
					},
					semestres: {
				      required: true
	    			},
	    			horas: {
						required: true
					},
					nivel: {
				      required: true
	    			}

				}
			});

	
	$("#bt2Cadastrar").click(function() {
		 if ($('#form2').valid()) {
	          $.post("curso/inclui.php", $("#form2").serialize())
				  .done(function(data) { //tudo certo com a requiscao 	
				  		$(".painel_mensagem").html(data);
				  })
				  .fail(function(data) { //erro na requisicao
				   	 $(".painel_mensagem").html("erro requisicao");
				 }); //fim post
	        }

	});	
		
});
</script>
