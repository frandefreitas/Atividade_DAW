<?php
require("../funcoes.php");
require_once("../login.php");
require_once("../conecta.php");
require("../funcoes_arquivos.php");

//$erros = array();
//testa se $_REQUEST foi criado pelo envio de um form
//if (isset($_REQUEST['acao'])) {
//	//guarda em varíaveis do PHP cada valor correspondente 
//	//do vetor associativo $_REQUEST[]
//	$acao = $_REQUEST['acao'];
	$nmcidade = $_REQUEST['nmcidade'];
//	if (strlen($nmcidade) == 0){
		//array_push cria um novo elemento em um vetor
//		array_push($erros, 'Nome');
//	}

	$ufcidade = $_REQUEST['ufcidade'];
//	if (strlen($ufcidade) == 0){
//		array_push($erros, 'Estado');
//	}
	
	//testa erros 
	if (count($erros) > 0){
		require("frm_inclui.php");
		echo ("Houve " . count($erros) . " erro(s).<br>");
		echo ("Verifique campos obrigatórios:");
		foreach ($erros as $v) {
			echo (" $v, ");
		}
		
		
		//exit é fim de programa
		exit();
	}

	//testa se $_REQUEST['acao'] é igual a 'enviar' 
	//if ($acao == 'enviar'){
		//formata a data para o padrao mysql
		$nascimento = converteData($nascimento);

		//consulta via PDO
 		$sql = "INSERT INTO `cidade` (`cdcidade`, `nmcidade`,`ufcidade`) VALUES (NULL, '$nmcidade','$ufcidade');";
	  try {
	    $declaracao = $link->prepare($sql);
	    $declaracao->execute();
	    echo ("Cidade incluída com sucesso!");
	    //limpar as variáveis depois do cadastro
	    $nmcidade = '';
	    $ufcidade = '';
	  }
	  catch (PDOException $e) {
	    print $e->getMessage() . $sql;
	  }
	//}//fim if($acao ...
//}//fim if isset...
//require("frm_inclui.php");



?>