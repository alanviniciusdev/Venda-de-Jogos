<?php

$texto = '{"nome":"João","idade":30}';
$dados = json_decode($texto, true); // true retorna array associativo

echo "Nome: " . $dados['nome'] . "<br>";
echo "Idade: " . $dados['idade'];
