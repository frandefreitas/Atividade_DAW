<?php
  //consulta via PDO
require("../funcoes.php");
require_once("../login.php");
require_once("../conecta.php");
require("../funcoes_arquivos.php");



    
    $sql = "SELECT * FROM situacao order by nmsituacao";
    $declaracao = $link->prepare($sql);
    $declaracao->execute();
    $declaracao->bindColumn('cdsituacao', $cdsituacao);
    $declaracao->bindColumn('nmsituacao', $nmsituacao); 

   
    geraTag("table",0,array("border"=>"1"));
    if ($declaracao->rowCount() > 0) {
      while ($registro = $declaracao->fetch(PDO::FETCH_BOUND)) {

       geraTag("tr",0);
       geraTag("td",0);
         geraTag("input",0,array("name"=>"COD",
                                 "type"=>"text",
                                 "value"=>"$cdsituacao",
                                 "size"=>"2",
                                 "readonly"=>"readonly"));
       geraTag("td",1);
       geraTag("td",0);
         echo ($nmsituacao);
       geraTag("td",1);
       geraTag("td",0);

         geraTag("input",0,array("name"=>"exclui",
                                 "class"=>"excluir",
                                 "type"=>"button",
                                 "value"=>"Excluir",
                                 "title"=>"$cdsituacao"));

        geraTag("input",0,array("name"=>"alterar",
                                 "class"=>"alterar",
                                 "type"=>"button",
                                 "value"=>"Alterar",
                                 "title"=>"$cdsituacao"));
        
       geraTag("td",1);
       geraTag("tr",1);

      }
      //</table>
      geraTag("table",1);
     
    }
    else {
      echo("nenhum registro localizado");
    }
  



?>












<script type="text/javascript">
  






$(function(){


     $("#form2").validate({
          rules: {
          cdcidade: {
            required: true
          }

        }
      });




  
  $(".excluir").click(function() {
     var codigoSituacao = $(this).attr("title");
     alert(codigoSituacao);
    $.post("situacao/exclui.php", {cod : codigoSituacao})
      .done(function(data) { //tudo certo com a requiscao   
          $(".painel_principal").html(data);
      })
      .fail(function(data) { //erro na requisicao
         $(".painel_mensagem").html("erro requisicao");
     }); //fim post


});


  
});








$(function(){


     $("#form2").validate({
          rules: {
          cdcidade: {
            required: true
          }

        }
      });




  
  $(".alterar").click(function() {
     var codigoSituacao = $(this).attr("title");
     alert(codigoSituacao);
    $.post("situacao/frm_altera.php", {cod : codigoSituacao})
      .done(function(data) { //tudo certo com a requiscao   
          $(".painel_principal").html(data);
      })
      .fail(function(data) { //erro na requisicao
         $(".painel_mensagem").html("erro requisicao");
     }); //fim post


});


  
});



</script>
