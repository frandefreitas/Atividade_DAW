<?php
  require_once("../conecta.php");
  require_once("../funcoes.php");

$nmcurso=$_REQUEST['nmcurso'];
$semestres=$_REQUEST['semestres'];
$horas=$_REQUEST['horas'];
$nivel=$_REQUEST['nivel'];
$cdcurso=$_REQUEST['cdcurso'];


 $sql = "UPDATE curso set nmcurso=:nmcurso,semestres=:semestres,horas=:horas,nivel=:nivel where cdcurso=:cdcurso";
  try {
    $declaracao = $link->prepare($sql);

    //conecta so parâmetro PDO às variáveois do PHP 
    $declaracao->bindParam(':nmcurso', $nmcurso);
    $declaracao->bindParam(':cdcurso', $cdcurso);
    $declaracao->bindParam(':semestres', $semestres);
    $declaracao->bindParam(':horas', $horas);
    $declaracao->bindParam(':nivel', $nivel);
    $declaracao->execute();
    echo ("Cidade alterada com sucesso!");
   
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }



?>


<script>
$(".painel_principal").load("curso/consulta.php");
</script>