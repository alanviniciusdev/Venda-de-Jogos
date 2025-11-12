<?php

if (isset($_GET['nome']) && !empty($_GET['nome'])) {
    $nome = htmlspecialchars($_GET['nome']);
    echo "Bm-vindo, $nome! O valor recebido pela variável GET foi: $nome";
} else {
    echo "Bem-vindo, visitante!";
        echo "<p>Por favor, informe seu nome na URL, exemplo: ?nome=Maria</p>";
}
?>