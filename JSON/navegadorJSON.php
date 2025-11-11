<?php

header("Content-Type: application/json");


$resposta = [

    "status" => "ok",

    "mensagem" => "Funcionou!"

];

echo json_encode($resposta);

?>