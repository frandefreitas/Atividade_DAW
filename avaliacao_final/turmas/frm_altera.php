<style type="text/css">
	.erro { 
		background-color:red;
		color:white;
		 }
</style>
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
$cdturma = $_REQUEST['cod'];
  $sql = "SELECT * FROM turma where cdturma=:cdturma";
  
  try {
      $declaracao = $link->prepare($sql);
      $declaracao->bindParam(':cdturma', $cdturma);
      $declaracao->execute();
      $declaracao->bindColumn('cdturma', $cdturma);  
      $declaracao->bindColumn('cdcursoturma', $cdcursoturma);
      $declaracao->bindColumn('nmturma', $nmturma); 


    }

    catch (PDOException $e) {
      print $e->getMessage() . $sql;
    }
    $registro = $declaracao->fetch(PDO::FETCH_BOUND);






	geraInput('Codigo','cdcursoturma',$cdcursoturma,$erros);
	geraInput('Nome','nmturma',$nmturma,$erros);
geraTag("input",0,array("name"=>"cdturma",
                               "type"=>"hidden",
                               "value"=>"$cdturma"));
	?>

	<br>
	<input type="button" name="acao" value="Salvar" id="btSalvarTurmas">
</form>


<script type="text/javascript">
  $(function(){

    //validacao
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
  //jquery chamado quando a página termina de carregar
$(function(){
  
  $("#btSalvarTurmas").click(function() {
       if ($('#form1').valid()) {
            $.post("turmas/altera.php", $("#form1").serialize())
          .done(function(data) { //tudo certo com a requiscao   
              $(".painel_mensagem").html(data);      //VAI DAR A RESPOSTA DEPOIS O LOCAL A DIV ONDE VAI DAR
          })
          .fail(function(data) { //erro na requisicao
             $(".painel_mensagem").html("erro requisicao");
         }); //fim post
          }

        
    });
  });
  });//fim $(function)
</script>