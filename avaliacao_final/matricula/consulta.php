<?php

require_once("../funcoes.php");
require_once("../login.php");




//consulta via PDO
    $sql = "SELECT cdmatricula,nome,nmsituacao,`matricula`.cdcurso,nmcurso from pessoa  RIGHT JOIN matricula ON `matricula`.cdpessoa = `pessoa`.cdpessoa JOIN curso ON `matricula`.cdcurso = `curso`.cdcurso JOIN situacao ON `situacao`.cdsituacao = `matricula`.situacao"; 
    $declaracao = $link->prepare($sql);
    $declaracao->execute();

    /* liga uma coluna do banco a uma variavel PHP */
    $declaracao->bindColumn('nome', $nome);
    $declaracao->bindColumn('cdcurso', $cdcurso);
    $declaracao->bindColumn('nmcurso', $nmcurso);
    $declaracao->bindColumn('cdmatricula', $cdmatricula);
    $declaracao->bindColumn('nmsituacao', $nmsituacao);

    //table e primeira tr com os cabeçalhos da listagem
    require("inc/consulta__tabela_inicio.php");

    if ($declaracao->rowCount() > 0) {
      while ($registro = $declaracao->fetch(PDO::FETCH_BOUND)) {
       
       require("inc/consulta__tabela_registro.php");
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
          cdmatricula: {
            required: true
          }

        }
      });




  
  $(".excluir").click(function() {
     var codigoMatricula = $(this).attr("title");
     alert(codigoMatricula);
    $.post("matricula/exclui.php", {cod : codigoMatricula})
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
          cdmatricula: {
            required: true
          }

        }
      });




  
  $(".alterar").click(function() {
     var codigoMatricula = $(this).attr("title");
     alert(codigoMatricula);
    $.post("matricula/frm_altera.php", {cod : codigoMatricula})
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