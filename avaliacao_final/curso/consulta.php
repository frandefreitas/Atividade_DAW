<?php
require("../funcoes.php");
require_once("../login.php");
require_once("../conecta.php");
require("../funcoes_arquivos.php");

 $sql = "SELECT * FROM curso order by nmcurso";
  try {
    $declaracao = $link->prepare($sql);
    $declaracao->execute();

        $declaracao->bindColumn('nmcurso', $nmcurso);
        $declaracao->bindColumn('cdcurso', $cdcurso);
        $declaracao->bindColumn('semestres', $semestres);
        $declaracao->bindColumn('horas', $horas);
        $declaracao->bindColumn('nivel', $nivel);


    geraTag("table",0,array("border"=>"1"));
    if ($declaracao->rowCount() > 0) {
      while ($registro = $declaracao->fetch(PDO::FETCH_BOUND)) {
       
       geraTag("tr",0);
       geraTag("td",0);
         geraTag("input",0,array("name"=>"COD",
                                 "type"=>"text",
                                 "value"=>"$cdcurso",
                                 "size"=>"2",
                                 "readonly"=>"readonly"));
       geraTag("td",1);
       geraTag("td",0);
         echo ($nmcurso);
       geraTag("td",1);
       geraTag("td",0);
          echo ($semestres);
       geraTag("td",1);
       geraTag("td",0);
         echo ($horas);
       geraTag("td",1);
       geraTag("td",0);
          echo ($nivel);
       geraTag("td",1);
       geraTag("td",1);
       geraTag("td",0);


         geraTag("input",0,array("name"=>"exclui",
                                 "class"=>"excluir",
                                 "type"=>"button",
                                 "value"=>"Excluir",
                                 "title"=>"$cdcurso"));

        geraTag("input",0,array("name"=>"alterar",
                                 "class"=>"alterar",
                                 "type"=>"button",
                                 "value"=>"Alterar",
                                 "title"=>"$cdcurso"));
        
        
       geraTag("td",1);
       geraTag("tr",1);
      
      }
      //</table>
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
     var codigoCurso = $(this).attr("title");
     alert(codigoCurso);
    $.post("curso/exclui.php", {cod : codigoCurso})
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
     var codigoCurso = $(this).attr("title");
     alert(codigoCurso);
    $.post("curso/frm_altera.php", {cod : codigoCurso})
      .done(function(data) { //tudo certo com a requiscao   
          $(".painel_principal").html(data);
      })
      .fail(function(data) { //erro na requisicao
         $(".painel_mensagem").html("erro requisicao");
     }); //fim post


});


  
});



</script>