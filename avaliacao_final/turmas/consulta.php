<?php
require_once("../funcoes.php");


 $sql = "SELECT cdturma, cdcursoturma, nmturma FROM turma order by cdturma";
  try {
    $declaracao = $link->prepare($sql);
    $declaracao->execute();

    $declaracao->bindColumn('cdturma', $cdturma);
    $declaracao->bindColumn('cdcursoturma', $cdcursoturma);
    $declaracao->bindColumn('nmturma', $nmturma);

    geraTag("table",0,array("border"=>"1"));
    if ($declaracao->rowCount() > 0) {
      while ($registro = $declaracao->fetch(PDO::FETCH_BOUND)) {
       geraTag("form",0,array("method"=>"GET")); 
       geraTag("tr",0);
       geraTag("td",0);
         geraTag("input",0,array("name"=>"COD",
                                 "type"=>"text",
                                 "value"=>"$cdturma",
                                 "size"=>"2",
                                 "readonly"=>"readonly"));
       geraTag("td",1);
       geraTag("td",0);
         echo ($cdcursoturma);
       geraTag("td",1);
       geraTag("td",0);
          echo ($nmturma);
       geraTag("td",1);
       geraTag("td",1);
       geraTag("td",0);
         geraTag("input",0,array("name"=>"exclui",
                                 "class"=>"excluir",
                                 "type"=>"button",
                                 "value"=>"Excluir",
                                 "title"=>"$cdturma"));

        geraTag("input",0,array("name"=>"alterar",
                                 "class"=>"alterar",
                                 "type"=>"button",
                                 "value"=>"Alterar",
                                 "title"=>"$cdturma"));
        
       geraTag("td",1);
       geraTag("tr",1);

      }
      
      geraTag("table",1);
     
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
     var codigoTurma = $(this).attr("title");
     alert(codigoTurma);
    $.post("turmas/exclui.php", {cod : codigoTurma})
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
     var codigoTurma = $(this).attr("title");
     alert(codigoTurma);
    $.post("turmas/frm_altera.php", {cod : codigoTurma})
      .done(function(data) { //tudo certo com a requiscao   
          $(".painel_principal").html(data);
      })
      .fail(function(data) { //erro na requisicao
         $(".painel_mensagem").html("erro requisicao");
     }); //fim post


});


  
});



</script>
