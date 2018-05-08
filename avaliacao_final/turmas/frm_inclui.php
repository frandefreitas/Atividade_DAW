<?php
	require_once("../funcoes.php");
?>
<form method="post" enctype="multipart/form-data" id="form1">
<?php
	geraInput('Codigo','cdcursoturma',$cdcursoturma,$erros);
	geraInput('Nome','nmturma',$nmturma,$erros);
?>
	<br>
	<input type="button" id="btCadastrarTurma" value="enviar">
</form>

<script type="text/javascript">
	$(function(){
	$("#form1").validate({
	  		rules: {
				cdcursoturma: {
					required: true
				},
				nmturma: {
				    required: true,
	    		},
			}
	});

	$("#btCadastrarTurma").click(function() {
			if ($('#form1').valid()) {
				$.post("turmas/inclui.php", $("#form1").serialize())
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