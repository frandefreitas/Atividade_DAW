<?php
require("../funcoes.php");
require("../funcoes_arquivos.php");



	$nome = $_REQUEST['nome'];


	$nascimento = $_REQUEST['nascimento'];



	$sexo = $_REQUEST['sexo'];

	$cdcidadepessoa = $_REQUEST['cidade'];


	
		//formata a data para o padrao mysql
		$nascimento = converteData($nascimento);

		//consulta via PDO
 		$sql = "INSERT INTO `pessoa` (`cdpessoa`, `nome`, `nascimento`, `sexo`, `cdcidadepessoa`) VALUES (NULL, '$nome', '$nascimento', '$sexo', '$cdcidadepessoa');";
	  try {
	    $declaracao = $link->prepare($sql);
	    $declaracao->execute();
	    //lastInsertId() retorna o último código AI gerado
	    $id = $link->lastInsertId();
	    echo ("Pessoa incluída com sucesso!");
	    enviaFoto("fotos/",$id,"imagem");
	    //limpar as variáveis depois do cadastro
	    $nome = '';
	    $sexo = '';
	    $nascimento = '';
	    $cdcidadepessoa = '';
	    echo ("Inclusão OK!");
	  }
	  catch (PDOException $e) {
	    print $e->getMessage() . $sql;
	  }
	
?>