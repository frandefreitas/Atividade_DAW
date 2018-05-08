<?php
require("../funcoes.php");
require_once("../login.php");
require_once("../conecta.php");
require("../funcoes_arquivos.php");

//$erros = array();




//consulta via PDO
 $sql = "SELECT nmcidade, cdcidade, ufcidade FROM cidade order by nmcidade";
  try {
    $declaracao = $link->prepare($sql);
    $declaracao->execute();

    /* liga uma coluna do banco a uma variavel PHP */
    $declaracao->bindColumn('nmcidade', $nmcidade);
    $declaracao->bindColumn('cdcidade', $cdcidade);
    $declaracao->bindColumn('ufcidade', $ufcidade);
    //->rowCount retorna o número de registros
    //retornados pela consulta
   
    //<table border='1'>
    geraTag("table",0,array("border"=>"1"));
     //geraTag("form",0,array("method"=>"POST", "id"=>"form2", "enctype"=>"multipart/form-data"));
    if ($declaracao->rowCount() > 0) {
      while ($registro = $declaracao->fetch(PDO::FETCH_BOUND)) {
 
       geraTag("tr",0);
       geraTag("td",0);
       
         geraTag("input",0,array("name"=>"cdcidade",
                                "id"=>"cdcidade",
                                 "type"=>"text",
                                 "value"=>"$cdcidade",
                                 "size"=>"2",
                                 "readonly"=>"readonly"));
         
       geraTag("td",1);
       geraTag("td",0);
         echo ($nmcidade);
       geraTag("td",1);
       geraTag("td",0);
          echo ($ufcidade);
       geraTag("td",1);
       geraTag("td",1);
       geraTag("td",0);
 


         geraTag("input",0,array("name"=>"exclui",
                                 "class"=>"excluir",
                                 "type"=>"button",
                                 "value"=>"Excluir",
                                 "title"=>"$cdcidade"));

        geraTag("input",0,array("name"=>"alterar",
                                 "class"=>"alterar",
                                 "type"=>"button",
                                 "value"=>"Alterar",
                                 "title"=>"$cdcidade"));
        
       geraTag("td",1);
       geraTag("tr",1);

      }
      //</table>
       geraTag("table",1);
     
     
      // geraTag("form",1);












    }
    else {
      echo("nenhum registro localizado");
    }
  }//fim try
  catch (PDOException $e) {
    print $e->getMessage();
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
     var codigoCidade = $(this).attr("title");
     alert(codigoCidade);
    $.post("cidade/exclui.php", {cod : codigoCidade})
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
     var codigoCidade = $(this).attr("title");
     alert(codigoCidade);
    $.post("cidade/frm_altera.php", {cod : codigoCidade})
      .done(function(data) { //tudo certo com a requiscao   
          $(".painel_principal").html(data);
      })
      .fail(function(data) { //erro na requisicao
         $(".painel_mensagem").html("erro requisicao");
     }); //fim post


});


  
});












//fim $(function)
</script>