<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coleta Dados</title>
    <style>
    </style>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        Nome<input type="text" name="nome">
        Email<input type="text" name="email">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

<?php

$arquivo_txt = 'usuarios.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']??'');
    $email = trim($_POST['email']??'');
    $metodo = $_SERVER['REQUEST_METHOD'];
    $cliente = $_SERVER['REMOTE_ADDR'];
    $agente = $_SERVER['HTTP_USER_AGENT'];
    $imagem = "";

    if($nome && $email) {
        echo "Obrigado, " .htmlspecialchars($nome) . "! <br>
        Nós enviaremos novidades para " . htmlspecialchars($email) . ". <br>";

        $dados = "Nome: $nome | Email: $email\n";
        if (file_put_contents($arquivo_txt, $dados, FILE_APPEND) !== false) {
            echo "<br>Dados salvos com sucesso no arquivo";
        }

        echo "<br>Método usado: $metodo";
        echo "<br>IP do cliente: $cliente";
        echo "<br>Agente do usuário: $agente";
    } else {
        echo "Erro ao Registrar, preencha os campos";
    }

    echo "<h2>Lista de Cadastro</h2>";

    $lista = file($arquivo_txt);

    foreach ($lista as $linha) {
        echo "<ul>";
        echo "<li>";
        print_r($linha);
        echo "</li>";
        echo "</ul>";
    }
}
?>