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
	      //name, tabela, campo1,    campo2,    valor,label
geraSelect("cdpessoa","pessoa","cdpessoa","nome",$cdpessoa,"Pessoa:");    

geraSelect("cdcurso","curso","cdcurso","nmcurso",$cdcurso,"Curso:");    
geraAnoSemetre("anosemestre",2017,2017,"Ano/Semestre:"); 
	?>

	<br>
	<input type="button" id="bt1Cadastrar" value="enviar">
</form>

<script type="text/javascript">
	
			//validacao

	//jquery chamado quando a página termina de carregar
$(function(){
		 $("#form1").validate({
	  			rules: {
					cdpessoa: {
						required: true
					},
					cdcurso: {
				      required: true
	    			},
	    			anosemestre: {
	    				required: true
	    			}

				}
			});
$(function(){
	
	$("#bt1Cadastrar").click(function() {
		 if ($('#form1').valid()) {
	          $.post("matricula/inclui.php", $("#form1").serialize())
				  .done(function(data) { //tudo certo com a requiscao 	
				  		$(".painel_mensagem").html(data);
				  })
				  .fail(function(data) { //erro na requisicao
				   	 $(".painel_mensagem").html("erro requisicao");
				 }); //fim post
	        }

	});	
		});
});
</script>



