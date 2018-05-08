<?php
require_once("funcoes.php");
//inicia sessão. 
session_start();
//caminho para reload da pagina
$URL = "Location: http://localhost/aulas/DAW/daw201701/PDO/aula09/index.php";
//teste se usuário não está logado
if(!isset($_SESSION['user'])){
	//rotina de login
	if(isset($_REQUEST['acao_login'])){
		$user = $_REQUEST['user'];
		$pass = md5($_REQUEST['pass']);
		//consulta a base e procura usuario e senha
		$sql = "SELECT * from usuario where user=:user and pass=:pass"; 
	    $declaracao = $link->prepare($sql);
	    $declaracao->bindParam(':user', $user);
	    $declaracao->bindParam(':pass', $pass);
	    $declaracao->execute();
	    //se rowCount > 0 é porque encontrou usuario e senha
		if ($declaracao->rowCount() > 0){
			//guarda usuario na variavel de sessao
			$_SESSION['user'] = $user;
			header($URL);
		}
		else {
			echo("usuário ou senha inválidos");
			require("frm_login.php");
			exit();
		}
	}
	require("frm_login.php");
	exit();
}
else {
	require_once("frm_logout.php");
	//rotina de logout
	if(isset($_REQUEST['acao_login'])){
		if($_REQUEST['acao_login'] == 'logout'){
			//destroi sessao
			session_destroy();
			header($URL);
		}

	}
}
?>