<?php

$cadastro = [

    "nome" => "Letícia",

    "email" => "leticia@example.com"

];

file_put_contents("cadastro.json", json_encode($cadastro, JSON_PRETTY_PRINT));

echo "Salvo com sucesso!";

?>