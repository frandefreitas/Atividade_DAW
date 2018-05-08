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
	$nmcurso = $_REQUEST['nmcurso'];
	$semestres = $_REQUEST['semestres'];
	$horas = $_REQUEST['horas'];
	$nivel = $_REQUEST['nivel'];

 		$sql = "INSERT INTO `curso` (`cdcurso`,`nmcurso` ,`semestres`,`horas`,`nivel`) VALUES (NULL, '$nmcurso','$semestres','$horas','$nivel');";
	  try {
	    $declaracao = $link->prepare($sql);
	    $declaracao->execute();
	    echo ("Curso incluída com sucesso!");
	    //limpar as variáveis depois do cadastro
	    $nmcurso = '';
	    $semestres = '';
	      $horas = '';
	    $nivel = '';
	  }
	  catch (PDOException $e) {
	    print $e->getMessage() . $sql;
	  }
	//}//fim if($acao ...
//}//fim if isset...
//require("frm_inclui.php");



?>