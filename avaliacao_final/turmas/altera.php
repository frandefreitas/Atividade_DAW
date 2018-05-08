<?php
require("../funcoes.php");

$nmturma = $_REQUEST['nmturma'];
$cdcursoturma = $_REQUEST['cdcursoturma'];
$cdturma = $_REQUEST['cdturma'];


 $sql = "UPDATE turma set cdcursoturma=:cdcursoturma,nmturma=:nmturma where cdturma=:cdturma";
  try {
    $declaracao = $link->prepare($sql);
    $declaracao->bindParam(':cdturma', $cdturma);
    $declaracao->bindParam(':nmturma', $nmturma);
    $declaracao->bindParam(':cdcursoturma', $cdcursoturma);

    $declaracao->execute();
   
     echo ("Turma alterada com sucesso!");
   
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }



?>



<script>
$(".painel_principal").load("turmas/consulta.php");
</script>