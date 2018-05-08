<?php

require("../funcoes.php");

@$cdcidade = $_REQUEST['cdcidade'];
@$nmcidade = $_REQUEST['nmcidade'];
@$ufcidade = $_REQUEST['ufcidade'];


//consulta via PDO
$sql = "UPDATE cidade set nmcidade='$nmcidade',ufcidade='$ufcidade' where cdcidade=$cdcidade";
  try {
    $declaracao = $link->prepare($sql);

    //conecta so parâmetro PDO às variáveois do PHP 
    $declaracao->bindParam('nmcidade', $nmcidade);
    $declaracao->bindParam('ufcidade', $ufcidade);
    $declaracao->bindParam('cdcidade', $cdcidade);
    $declaracao->execute();
      echo ("Cidade alterada com sucesso!");
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }
?>
<script>
$(".painel_principal").load("cidade/consulta.php");
</script>