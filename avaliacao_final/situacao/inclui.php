<?php
require("../funcoes.php");
require("../funcoes_arquivos.php");



	$nome = $_REQUEST['nome'];





		$nascimento = converteData($nascimento);

	
 		$sql = "INSERT INTO `situacao` (`cdsituacao`, `nmsituacao`) VALUES (NULL, '$nome');";
	  try {
	    $declaracao = $link->prepare($sql);
	    $declaracao->execute();
	    $id = $link->lastInsertId();
	    echo ("Situação incluída com sucesso!");
	    
	    $nome = '';

	  }
	  catch (PDOException $e) {
	    print $e->getMessage() . $sql;
	  }
	
?>