<?php

require("../funcoes.php");
require_once("../login.php");
require_once("../conecta.php");
require("../funcoes_arquivos.php");
//$erros = array();
//testa se $_REQUEST foi criado pelo envio de um form

	//guarda em varíaveis do PHP cada valor correspondente 
	//do vetor associativo $_REQUEST[]

	$cdpessoa = $_REQUEST['cdpessoa'];
	$cdcurso = $_REQUEST['cdcurso'];
	$anosemestre = $_REQUEST['anosemestre'];

	
	//testa erros 
	if (count($erros) > 0){
		//require("frm_inclui.php");
		echo ("Houve " . count($erros) . " erro(s).<br>");
		echo ("Verifique campos obrigatórios:");
		foreach ($erros as $v) {
			echo (" $v, ");
		}
		
		
		//exit é fim de programa
		exit();
	}

	//testa se $_REQUEST['acao'] é igual a 'enviar' 

	$situacao = 3; //cursando
	//montagem do cdmatricula
	$cdmatricula = $anosemestre . $cdcurso . $cdpessoa;

	//consulta via PDO
 	$sql = "INSERT INTO `matricula` (`cdmatricula`, `cdpessoa`, `cdcurso`, `anosemestre`, `situacao`) VALUES ($cdmatricula, '$cdpessoa', '$cdcurso', '$anosemestre', '$situacao');";
	  try {
	    $declaracao = $link->prepare($sql);
	    $declaracao->execute();
	    echo ("Matrícula incluída com sucesso!");
	    //limpar as variáveis depois do cadastro
	    $cdpessoa = '';
	    $cdcurso = '';
	    $anosemestre = '';
	  }
	  catch (PDOException $e) {
	    print $e->getMessage() . $sql;
	  }


//require("frm_inclui.php");



?>