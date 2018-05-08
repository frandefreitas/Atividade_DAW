<style type="text/css">
	.erro { 
		background-color:red;
		color:white;
		 }
</style>
<form method="post" id="form1">
<?php
  require_once("../conecta.php");
  require_once("../funcoes.php");
	$cdsituacao = $_REQUEST['cod'];
  $sql = "SELECT * FROM situacao where cdsituacao=:cdsituacao";
  
  try {
      $declaracao = $link->prepare($sql);
      $declaracao->bindParam(':cdsituacao', $cdsituacao);
      $declaracao->execute();
      $declaracao->bindColumn('cdsituacao', $cdsituacao);  
      $declaracao->bindColumn('nmsituacao', $nome);



    }

    catch (PDOException $e) {
      print $e->getMessage() . $sql;
    }
    $registro = $declaracao->fetch(PDO::FETCH_BOUND);





	geraInput('Situação','nome',$nome,$erros);
	 geraTag("input",0,array("name"=>"cdsituacao",
                               "type"=>"hidden",
                               "value"=>"$cdsituacao"));
	?>
	<br>
	<input type="button" name="acao" value="Salvar" id="btSalvarSituacao">
</form>



<script type="text/javascript">
	
//jquery chamado quando a página termina de carregar
$(function(){

		//validacao
		 $("#form1").validate({
	  			rules: {
					nome: {
						required: true
					}

				}
			});
		
		$("#btSalvarSituacao").click(function() {
	     //somente manda a requisicao ajax se o formulário for válido!
		 if ($('#form1').valid()) {
	          $.post("situacao/altera.php", $("#form1").serialize())
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