<?php
//require_once("../login.php");
require_once("../funcoes.php");
require_once("../conecta.php");
$nome = $_REQUEST['nome'];
$nascimento = $_REQUEST['nascimento'];
$sexo = $_REQUEST['sexo'];
$cdcidadepessoa = $_REQUEST['cidade'];
$cdpessoa = $_REQUEST['cdpessoa'];
$nascimento = converteData($nascimento);
 $sql = "UPDATE pessoa set nome=:nome, nascimento=:nascimento ,sexo=:sexo,cdcidadepessoa=:cdcidadepessoa where cdpessoa=:cdpessoa";
  try {
    $declaracao = $link->prepare($sql);

    //conecta so parâmetro PDO às variáveois do PHP 
   
    $declaracao->bindParam(':nome', $nome);

    $declaracao->bindParam(':nascimento', $nascimento);
    
    $declaracao->bindParam(':cdpessoa', $cdpessoa);
    $declaracao->bindParam(':sexo', $sexo);
    $declaracao->bindParam(':cdcidadepessoa', $cdcidadepessoa);
    $declaracao->execute();
   
     echo ("Pessoa alterada com sucesso!");
   
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }



?>


<script>
$(".painel_principal").load("pessoa/consulta.php");
</script>