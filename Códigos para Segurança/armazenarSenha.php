<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senha Criptografada</title>
</head>
<body>
    <form action="" method="POST">
        <label for="senha">Digite sua senha</label>
        <input type="password" name="senha" id="">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

<?php

session_start();

$senha = "123456";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $senha = $_POST['senha']??'';

    if ($senha) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        
        if (password_verify("123456", $senhaHash)) {
            echo "Senha correta";
            echo "<p>A senha criptografada é: $senhaHash </p>";
        } else {
            echo "Senha incorreta";
        }
    }
        
}

?>