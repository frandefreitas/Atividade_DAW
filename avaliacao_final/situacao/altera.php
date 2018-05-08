<?php
require_once("../login.php");
require("../funcoes.php");

$cdsituacao=$_REQUEST['cdsituacao'];
$nome=$_REQUEST['nome'];

 $sql = "UPDATE situacao set nmsituacao=:nome where cdsituacao=:cdsituacao";
  try {
    $declaracao = $link->prepare($sql);

    $declaracao->bindParam(':cdsituacao', $cdsituacao);
    $declaracao->bindParam(':nome', $nome);
    $declaracao->execute();
   
     echo ("Situação alterada com sucesso!");
   
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }



?>



<script>
$(".painel_principal").load("situacao/consulta.php");
</script>