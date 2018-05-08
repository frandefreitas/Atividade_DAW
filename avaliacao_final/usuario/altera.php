<?php
require("../login.php");
require("../funcoes.php");


$senhaantiga=$_REQUEST['senhaantiga'];
$nomeantigo=$_REQUEST['nomeantigo'];
$senha=$_REQUEST['senha'];
$nome=$_REQUEST['nome'];

  // DAVA PARA ECONOMIZA CODIGO, MAS OPTEI POR ESSE CAMINHO PARA DEMONSTRAR ENTENDIMENTO DO CRUD

 $sql = "UPDATE usuario set user=:nome, pass=:senha where user=:nomeantigo and pass=:senhaantiga";
 
  try {
    $declaracao = $link->prepare($sql);



    $declaracao->bindParam(':nome', $nome);
    $declaracao->bindParam(':senha', $senha);
    $declaracao->bindParam(':nomeantigo', $nomeantigo);
    $declaracao->bindParam(':senhaantiga', $senhaantiga);


    $declaracao->execute();

   
    





     echo ("Usuário alterada com sucesso!");
   
  }
  catch (PDOException $e) {
    print $e->getMessage();
  }





?>
<script>
$(".painel_principal").load("usuario/consulta.php");
</script>