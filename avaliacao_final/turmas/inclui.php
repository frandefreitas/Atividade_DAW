<?php
require("../funcoes.php");

@$cdcursoturma = $_REQUEST['cdcursoturma'];
	@$nmturma = $_REQUEST['nmturma'];


 		$sql = "INSERT INTO `turma` (`cdturma`, `cdcursoturma`,`nmturma`) VALUES (NULL, '$cdcursoturma','$nmturma');";
	  try {
	    $declaracao = $link->prepare($sql);
	    $declaracao->execute();
	    echo ("Turma incluída com sucesso!");

	    @$cdcursoturma = '';
	    @$nmturma = '';
	  }
	  catch (PDOException $e) {
	    print $e->getMessage() . $sql;
	  }
?>