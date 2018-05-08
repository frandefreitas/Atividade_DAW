<?php
  //consulta via PDO

require("../funcoes.php");
require_once("../login.php");
require_once("../conecta.php");
require("../funcoes_arquivos.php");
//require_once("../consulta.php");


    $cdcidade = $_REQUEST['cod'];
   


   $sql = "DELETE FROM `cidade` where `cdcidade`= :cdcidade";
    try {
      $declaracao = $link->prepare($sql);
      $declaracao->bindParam(':cdcidade', $cdcidade);
      $declaracao->execute();
      //rowCount é um método que retorna o número de linhas
      //afetadas pela última chamada ao método execute
      if ($declaracao->rowCount() > 0)
       echo ("Cidade excluída com sucesso!");
      else
        echo("Código não existe.");
    }
    catch (PDOException $e) {
      print $e->getMessage();
    }


?>