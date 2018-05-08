<?php
  //consulta via PDO
require("../funcoes.php");
require_once("../login.php");
require_once("../conecta.php");
require("../funcoes_arquivos.php");



   $nome = $_REQUEST['nome'];
   $senha = $_REQUEST['senha'];





   $sql = "DELETE From `usuario` where `user`= :nome and `pass`= :senha";
    try {
      $declaracao = $link->prepare($sql);
      $declaracao->bindParam(':nome', $nome);
      $declaracao->bindParam(':senha', $senha);
      $declaracao->execute();

      if ($declaracao->rowCount() > 0)
       echo ("Pessoa excluída com sucesso!");
      else
        echo("Código não existe.");
    }
    catch (PDOException $e) {
      print $e->getMessage();
    }


?>