<?php
  //consulta via PDO
require("../funcoes.php");
require_once("../login.php");
require_once("../conecta.php");
require("../funcoes_arquivos.php");



    
    $sql = "SELECT * FROM usuario";
    $declaracao = $link->prepare($sql);
    $declaracao->execute();


    $declaracao->bindColumn('user', $nome);
    $declaracao->bindColumn('pass', $senha);
    geraTag("table",0,array("border"=>"1"));
    if ($declaracao->rowCount() > 0) {
      while ($registro = $declaracao->fetch(PDO::FETCH_BOUND)) {

       geraTag("tr",0);
       geraTag("td",0);
         
        echo ($nome);
       geraTag("td",1);
       geraTag("td",0);
        echo ($senha);
       geraTag("td",1);
       geraTag("td",0);
         
         geraTag("input",0,array("name"=>"$nome",
                                 "class"=>"excluir",
                                 "type"=>"button",
                                 "value"=>"Excluir",
                                 "title"=>"$senha"));

        geraTag("input",0,array("name"=>"$nome",
                                 "class"=>"alterar",
                                 "type"=>"button",
                                 "value"=>"Alterar",
                                 "title"=>"$senha"));
        
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
     var nomeUsuario = $(this).attr("name");
     var senhaUsuario = $(this).attr("title");
    $.post("usuario/exclui.php", {nome : nomeUsuario, senha : senhaUsuario})
      .done(function(data) { //tudo certo com a requiscao   
          $(".painel_principal").html(data);
      })
      .fail(function(data) { //erro na requisicao
         $(".painel_mensagem").html("erro requisicao");
     }); //fim post


});


  
});








$(function(){





  
  $(".alterar").click(function() {
     var nomeUsuario = $(this).attr("name");
     var senhaUsuario = $(this).attr("title");
    $.post("usuario/frm_altera.php", {nome : nomeUsuario, senha : senhaUsuario})
      .done(function(data) { //tudo certo com a remquiscao   
          $(".painel_principal").html(data);
      })
      .fail(function(data) { //erro na requisicao
         $(".painel_mensagem").html("erro requisicao");
     }); //fim post


});


  
});



</script>
