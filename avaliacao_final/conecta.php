<?php
//conexao via PDO
try{
    $aux = 'mysql:host=localhost;dbname=pw1;charset=utf8mb4';
    //$link será a conexao para o BD
                   //$aux = string de conexão
    					 //user do BD
    					        //senha do user do BD
    $link = new PDO($aux,'root','',
                array(
                    PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => false
                )
            );
    //echo("Conexão realizada com sucesso!<br>");
    }
catch(PDOException $ex){
    echo("Deu erro! <br>". $ex->getMessage());

}



?>