<?php
  //consulta via PDO
require("../funcoes.php");
require_once("../login.php");
require_once("../conecta.php");
require("../funcoes_arquivos.php");



    
    $sql = "SELECT cdpessoa, nome, nascimento FROM pessoa";
    $declaracao = $link->prepare($sql);
    $declaracao->execute();

    /* liga uma coluna do banco a uma variavel PHP */
    $declaracao->bindColumn('nascimento', $nascimento);
    $declaracao->bindColumn('cdpessoa', $cdpessoa);
    $declaracao->bindColumn('nome', $nome); 

   
    //<table border='1'>
    geraTag("table",0,array("border"=>"1"));
    if ($declaracao->rowCount() > 0) {
      while ($registro = $declaracao->fetch(PDO::FETCH_BOUND)) {

       geraTag("tr",0);
       geraTag("td",0);
         geraTag("input",0,array("name"=>"COD",
                                 "type"=>"text",
                                 "value"=>"$cdpessoa",
                                 "size"=>"2",
                                 "readonly"=>"readonly"));
       geraTag("td",1);
       geraTag("td",0);
         echo ($nome);
       geraTag("td",1);
       geraTag("td",0);
 //       $aux = "fotos/" . $cdpessoa . ".jpg";
 //       geraTag("img",0,array("src"=>$aux,
 //                             "width"=>"100"));
         
 //      geraTag("td",1);
 //      geraTag("td",0);
         echo (converteDataHumano($nascimento));
       geraTag("td",1);
       geraTag("td",1);
       geraTag("td",0);
         geraTag("input",0,array("name"=>"exclui",
                                 "class"=>"excluir",
                                 "type"=>"button",
                                 "value"=>"Excluir",
                                 "title"=>"$cdpessoa"));

        geraTag("input",0,array("name"=>"alterar",
                                 "class"=>"alterar",
                                 "type"=>"button",
                                 "value"=>"Alterar",
                                 "title"=>"$cdpessoa"));
        
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




  
  $(".excluir").click(function() {
     var codigoPessoa = $(this).attr("title");
     alert(codigoPessoa);
    $.post("pessoa/exclui.php", {cod : codigoPessoa})
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
     var codigoPessoa = $(this).attr("title");
     alert(codigoPessoa);
    $.post("pessoa/frm_altera.php", {cod : codigoPessoa})
      .done(function(data) { //tudo certo com a requiscao   
          $(".painel_principal").html(data);
      })
      .fail(function(data) { //erro na requisicao
         $(".painel_mensagem").html("erro requisicao");
     }); //fim post


});


  
});



</script>
