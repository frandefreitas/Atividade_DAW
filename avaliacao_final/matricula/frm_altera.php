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

  $cdmatricula = $_REQUEST['cod'];
  $sql = "SELECT * FROM matricula where cdmatricula=:cdmatricula";
  
  try {
      $declaracao = $link->prepare($sql);
      $declaracao->bindParam(':cdmatricula', $cdmatricula);
      $declaracao->execute();
      $declaracao->bindColumn('cdmatricula', $cdmatricula);  
      $declaracao->bindColumn('cdpessoa', $cdpessoa);
      $declaracao->bindColumn('cdcurso', $cdcurso); 
      $declaracao->bindColumn('situacao', $situacao);
      $declaracao->bindColumn('anosemestre', $anosemestre);

    }

    catch (PDOException $e) {
      print $e->getMessage() . $sql;
    }
    $registro = $declaracao->fetch(PDO::FETCH_BOUND);

   


geraSelect("situacao","situacao","cdsituacao","nmsituacao",$situacao,"Situação:");  


geraSelect("cdpessoa","pessoa","cdpessoa","nome",$cdpessoa,"Pessoa:");    

geraSelect("cdcurso","curso","cdcurso","nmcurso",$cdcurso,"Curso:");    
geraAnoSemetre("anosemestre",2017,2017,"Ano/Semestre:",$anosemestre); 


    geraTag("input",0,array("type"=>"hidden",
                  "name"=>"cdmatricula",
                  "value"=>"$cdmatricula"));
	?>

	<br>
  <input type="button" id="btSalvarMatricula" value="enviar">
</form>




<script type="text/javascript">
  $(function(){

    //validacao
     $("#form1").validate({
          rules: {
          cdpessoa: {
            required: true
          },
          cdcurso: {
          	required: true
          },
          situacao: {
          	required: true
          },
          anosemestre: {
          	required: true
          }


        }
      });
  //jquery chamado quando a página termina de carregar
$(function(){
  
  $("#btSalvarMatricula").click(function() {
       if ($('#form1').valid()) {
            $.post("matricula/altera.php", $("#form1").serialize())
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