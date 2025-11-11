<?php

$pessoa = [

    "nome" => "Maria",

    "idade" => 28,

    "cidade" => "Curitiba"

];

$var_json = json_encode($pessoa, JSON_PRETTY_PRINT);

echo $var_json;

?>