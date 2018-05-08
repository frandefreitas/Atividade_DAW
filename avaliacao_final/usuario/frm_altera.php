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
  $nome = $_REQUEST['nome'];
  $senha = $_REQUEST['senha'];
  $sql = "SELECT * FROM usuario where user=:nome and pass=:senha";
  // DAVA PARA ECONOMIZA CODIGO, MAS OPTEI POR ESSE CAMINHO PARA DEMONSTRAR ENTENDIMENTO DO CRUD
  try {
      $declaracao = $link->prepare($sql);
      $declaracao->bindParam(':nome', $nome);
      $declaracao->bindParam(':senha', $senha);
      $declaracao->execute();
      $declaracao->bindColumn('pass', $senha);  
      $declaracao->bindColumn('user', $nome);



    }

    catch (PDOException $e) {
      print $e->getMessage() . $sql;
    }
    $registro = $declaracao->fetch(PDO::FETCH_BOUND);





	geraTag("input",0,array("name"=>"nomeantigo",
                               "type"=>"hidden",
                               "value"=>"$nome"));
	
	geraTag("input",0,array("name"=>"senhaantiga",
                               "type"=>"hidden",
                               "value"=>"$senha"));
	geraInput('Usuário','nome',$nome,$erros);
	geraInput('Senha','senha',$senha,$erros);
	?>
	<br>
	<input type="button" name="acao" value="Salvar" id="btSalvarUsuario">
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
		
		$("#btSalvarUsuario").click(function() {

		 if ($('#form1').valid()) {
	          $.post("usuario/altera.php", $("#form1").serialize())
				  .done(function(data) { //tudo certo com a requiscao 	
				  		$(".painel_mensagem").html(data);
				  })
				  .fail(function(data) { 
				   	 $(".painel_mensagem").html("erro requisicao");
				 }); 
	        }

				
		});


});
</script>