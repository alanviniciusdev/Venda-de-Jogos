<?php

$conteudo = file_get_contents("dados.json");

$dados = json_decode($conteudo, true);

echo $dados["produto"];

echo "<br>";

echo $dados["preco"];   

?>