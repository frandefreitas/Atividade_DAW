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
<form method="post" id="form1">
<?php

  $cdpessoa = $_REQUEST['cod'];
  $sql = "SELECT * FROM pessoa where cdpessoa=$cdpessoa";
  try {
      $declaracao = $link->prepare($sql);
      $declaracao->execute();
    
     $declaracao->bindColumn('cdpessoa', $cdpessoa);
       $declaracao->bindColumn('nome', $nome);
       $declaracao->bindColumn('nascimento', $nascimento);
	   
       $declaracao->bindColumn('sexo', $sexo);
       $declaracao->bindColumn('cdcidadepessoa', $cdcidade);

    }



    catch (PDOException $e) {
      print $e->getMessage() . $sql;
    }
     $registro = $declaracao->fetch(PDO::FETCH_BOUND);
	
	geraInput('Nome','nome',$nome,$erros);
	geraInput('Nascimento','nascimento',$nascimento,$erros);
	       //name tabela campo1  campo2   valor
	geraSelect("sexo","sexo","cdsexo","nmsexo",$sexo,"Sexo");        
	       //name    tabela   campo1     campo2    valor
	geraSelect("cidade","cidade","cdcidade","nmcidade",$cdcidade,"Cidade");
    geraTag("input",0,array("type"=>"hidden",
                  "name"=>"cdpessoa",
                  "value"=>"$cdpessoa"));


	?>
	<br>
	<input type="button" name="acao" id="btSalvarPessoa" value="Salvar">
</form>



<script type="text/javascript">
  $(function(){

    //validacao
     $("#form1").validate({
          rules: {
          nascimento: {
            required: true,
            dateITA: true
          },
          nome: {
              required: true
            },
          sexo: {
            required: true
          },
          cidade: {
              required: true
            },



        }
      });

$(function(){
  
  $("#btSalvarPessoa").click(function() {
       if ($('#form1').valid()) {
            $.post("pessoa/altera.php", $("#form1").serialize())
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