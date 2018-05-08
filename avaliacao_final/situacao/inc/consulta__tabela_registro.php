<?php
//<-- consulta.php 
geraTag("form",0,array("method"=>"GET")); 
geraTag("tr",0);
geraTag("td",0);
geraTag("input",0,array("name"=>"COD",
                         "type"=>"text",
                         "value"=>"$cdmatricula",
                         "size"=>"11",
                         "readonly"=>"readonly"));
geraTag("td",1);
geraTag("td",0);
 echo ($nome);
geraTag("td",1);
geraTag("td",0);
 echo ($nmcurso);
geraTag("td",1);
geraTag("td",0);
 echo ($nmsituacao);
geraTag("td",1);
geraTag("td",1);
geraTag("td",0);
 geraTag("input",0,array("name"=>"acao",
                         "type"=>"submit",
                         "value"=>"Alterar"));
 geraTag("input",0,array("name"=>"acao",
                         "type"=>"submit",
                         "value"=>"Excluir"));

geraTag("td",1);
geraTag("tr",1);
geraTag("form",1);

//<-- consulta.php 
?>