<?php
require("../funcoes.php");
require("../funcoes_arquivos.php");



	$nome = $_REQUEST['nome'];
	$senha = $_REQUEST['senha'];

		$nascimento = converteData($nascimento);

		//consulta via PDO
 		$sql = "INSERT INTO `usuario` (`user`, `pass`) VALUES ('$nome', '$senha');";
	  try {
	    $declaracao = $link->prepare($sql);
	    $declaracao->execute();

	    echo ("Usuário incluído com sucesso!");

	    $nome = '';
	    $senha = '';

	  }
	  catch (PDOException $e) {
	    print $e->getMessage() . $sql;
	  }
	
?>