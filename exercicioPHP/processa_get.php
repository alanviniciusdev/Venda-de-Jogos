<?php
$nome = $_GET['nome']??'';
$idade = $_GET['idade']??'';

echo "Olá $nome!<br>";
echo "Sua idade é: $idade";
?>