<?php

require("../funcoes.php");

@$cdmatricula = $_REQUEST['cdmatricula'];
@$situacao = $_REQUEST['situacao'];




    $cdpessoa = $_REQUEST['cdpessoa'];
  $cdcurso = $_REQUEST['cdcurso'];
  $anosemestre = $_REQUEST['anosemestre'];




 $sql = "UPDATE matricula set cdpessoa=:cdpessoa,cdcurso=:cdcurso,anosemestre=:anosemestre,situacao=:situacao where cdmatricula=:cdmatricula";
  try {     


   $declaracao = $link->prepare($sql);

    $declaracao->bindParam(':cdmatricula', $cdmatricula);
    $declaracao->bindParam(':situacao', $situacao);
    $declaracao->bindParam(':cdpessoa', $cdpessoa);
    $declaracao->bindParam(':cdcurso', $cdcurso);
    $declaracao->bindParam(':anosemestre', $anosemestre);
    $declaracao->execute();
   
     echo ("Matricula alterada com sucesso!");
   
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }


?>

<script>
$(".painel_principal").load("matricula/consulta.php");
</script>


