<?php
require("../funcoes.php");
require_once("../login.php");
require_once("../conecta.php");
require("../funcoes_arquivos.php");
  //consulta via PDO

$cod=$_REQUEST['cod'];
   $sql = "DELETE From `turma` where `cdturma`= :cod";
    try {
      $declaracao = $link->prepare($sql);
      $declaracao->bindParam(':cod', $cod);
      $declaracao->execute();
      //rowCount é um método que retorna o número de linhas
      //afetadas pela última chamada ao método execute
      if ($declaracao->rowCount() > 0)
       echo ("Turma excluída com sucesso!");
      else
        echo("Código não existe.");
    }
    catch (PDOException $e) {
      print $e->getMessage();
    }


?>