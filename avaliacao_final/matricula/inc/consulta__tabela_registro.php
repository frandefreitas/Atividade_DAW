<?php
//<-- consulta.php 
//geraTag("form",0,array("method"=>"GET")); 
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

         geraTag("input",0,array("name"=>"exclui",
                                 "class"=>"excluir",
                                 "type"=>"button",
                                 "value"=>"Excluir",
                                 "title"=>"$cdmatricula"));

        geraTag("input",0,array("name"=>"alterar",
                                 "class"=>"alterar",
                                 "type"=>"button",
                                 "value"=>"Alterar",
                                 "title"=>"$cdmatricula"));

geraTag("td",1);
geraTag("tr",1);
//geraTag("form",1);

//<-- consulta.php 
?>