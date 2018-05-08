<!-- forms para upload de arquivo obrigatoriamente
devem ser por post e conter o atributo enctype="multpart/form-data" -->
<form method="post" enctype="multipart/form-data">
    Escolha uma imagem:
    <input type="file" name="imagem">
    <input type="submit" value="Enviar" name="acao">
</form>
<?php
require("../funcoes_arquivos.php");
if (isset($_REQUEST['acao'])) {
	//$_FILES contém os dados do arquivo
	//enviado 
	//echo("<pre>");
	//print_r($_FILES);
	enviaFoto("fotos/","222","imagem");

}
?>