<style type="text/css">
	.erro { 
		background-color:red;
		color:white;
		 }
</style>
<form method="post" id="form1">
<?php
  require_once("../conecta.php");
  require_once("../funcoes.php");

  $cdcurso = $_REQUEST['cod'];
  $sql = "SELECT * FROM curso where cdcurso=:cdcurso";
  try {
     $declaracao = $link->prepare($sql);
     $declaracao->bindParam(':cdcurso', $cdcurso);
     $declaracao->execute();
     $declaracao->bindColumn('nmcurso', $nmcurso);
     $declaracao->bindColumn('semestres', $semestres);
     $declaracao->bindColumn('horas', $horas);
     $declaracao->bindColumn('nivel', $nivel);
     $declaracao->bindColumn('cdcurso', $cdcurso);
    }
    catch (PDOException $e) {
      print $e->getMessage() . $sql;
    }
    $registro = $declaracao->fetch(PDO::FETCH_BOUND);



	geraInput('Nome','nmcurso',$nmcurso,$erros);
	geraInput('Semestres','semestres',$semestres,$erros);
	geraInput('Horas','horas',$horas,$erros);
	geraInput('Nivel','nivel',$nivel,$erros);

		geraTag("input", 0, array("name" => "cdcurso",
									"type" => "hidden",
									"value" => "$cdcurso"));      

	?>
	<br>
	<input type="button" name="acao" value="Salvar" id="btSalvarCurso">
</form>
 

 <script type="text/javascript">
  $(function(){

    //validacao
     $("#form1").validate({
          rules: {
          nmcurso: {
            required: true
          },
          nivel: {
              required: true
            },
          semestres: {
              required: true
            },
          horas: {
              required: true
            }

        }
      });
  //jquery chamado quando a página termina de carregar
$(function(){
  
  $("#btSalvarCurso").click(function() {
       if ($('#form1').valid()) {
            $.post("curso/altera.php", $("#form1").serialize())
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