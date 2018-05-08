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

  $cdcidade = $_REQUEST['cod'];
  $sql = "SELECT * FROM cidade where cdcidade=:cdcidade";
  try {
      $declaracao = $link->prepare($sql);
      $declaracao->bindParam(':cdcidade', $cdcidade);
      $declaracao->execute();
      
     $declaracao->bindColumn('nmcidade', $nmcidade);
       $declaracao->bindColumn('ufcidade', $ufcidade);
    }
    catch (PDOException $e) {
      print $e->getMessage() . $sql;
    }
    $registro = $declaracao->fetch(PDO::FETCH_BOUND);
    @geraTag("input",0,array("type"=>"hidden",
                  "name"=>"cdcidade",
                  "value"=>"$cdcidade"));
    @geraTag("input",1);
    @geraInput('Nome','nmcidade',$nmcidade,$erros);
    @geraSelect("ufcidade","estado","cdestado","nmestado",$ufcidade,"Estado");
?>
  <br>
  <input type="button" id="btSalvarCidade" value="enviar">
</form>

<script type="text/javascript">
  $(function(){

    //validacao
     $("#form1").validate({
          rules: {
          nmcidade: {
            required: true
          },
          ufcidade: {
              required: true
            }

        }
      });
  //jquery chamado quando a página termina de carregar
$(function(){
  
  $("#btSalvarCidade").click(function() {
       if ($('#form1').valid()) {
            $.post("cidade/altera.php", $("#form1").serialize())
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