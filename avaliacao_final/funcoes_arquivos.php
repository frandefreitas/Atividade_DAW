<?php
////////////////////////////
//função para upload de fotografia
//E1: diretório destino (terminado por /)
//E2: nome destino
//E3: nome do campo file no formulário
//S: nada
function enviaFoto($diretorioDestino,$nome,$campo){
    //basename retira o caminho e retorna somente a parte do nome do arquivo
    $arquivo_fonte = basename($_FILES[$campo]["tmp_name"]);
    //----------------pega a extensão do arquivo
    //pathinfo retorna um vetor com:
        //dirname => pasta 
        //extension => extensão do arquivo
        //filename => nome do arquivo
    $vetorCaminho = pathinfo(basename($_FILES[$campo]["name"]));
    $tipoArquivoImagem = $vetorCaminho['extension'];
    //-------------------------------------------
    $arquivo_destino = $diretorioDestino . $nome . "." . $tipoArquivoImagem;
    //flag para teste de erro
    $uploadOk = 1;
    

    // testa se é uma imagem
    //getimagesize retorna false se arquivo não é uma imagem
    $check = getimagesize($_FILES[$campo]["tmp_name"]);
    //echo("<pre>");
   // print_r($check);
    if($check !== false) {
        echo "Arquivo é uma imagem - " . $check["mime"] . ".<br>";
    } else {
        echo "Arquivo não é uma imagem.<br>";
        $uploadOk = 0;
    }
    
    // testa se arquivo existe
   /* if (file_exists($arquivo_destino)) {
        echo "Arquivo já existe.<br>";
        $uploadOk = 0;
    }*/

    // /testa se o tamanho do arquivo não excede o máximo
    //$_FILES[$campo]["size"] contém o tamanho do arquivo em bytes 
   // echo($_FILES[$campo]["size"]);
    if ($_FILES[$campo]["size"] > 500000) {
        echo "Tamanho do arquivo excede tamanho máximo permitido<br>"; 
        $uploadOk = 0;
    }
    // permite somente as extensoes jpg
    if($tipoArquivoImagem != "jpg"  ) {
        echo "Somente JPG é permitido. ($tipoArquivoImagem)<br>";
        //&& $tipoArquivoImagem != "png" && $tipoArquivoImagem != "jpeg" && $tipoArquivoImagem != "gif"
        $uploadOk = 0;
    }
    // testa se houve algum erro
    if ($uploadOk == 0) {
        echo "Erro enviando arquivo.<br>";
    // caso contrário tenta o upload
    } else {
        if (move_uploaded_file($_FILES[$campo]["tmp_name"], $arquivo_destino)) {
            echo "Arquivo $arquivo_destino foi enviado.<br>";
        } else {
            echo "Houve um erro enviando o arquivo.<br>";
        }
    }
}
?>