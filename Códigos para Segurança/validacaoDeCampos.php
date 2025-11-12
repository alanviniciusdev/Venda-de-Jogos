<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação de Campos</title>
</head>
<body>
    <form method="POST">
        <label for="usuario">Usuário</label>
        <input type="text" name="usuario">

        <label for="email">Email</label>
        <input type="text" name="email" id="">

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="">

        <button type="submit">Enviar</button>
    </form>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $usuario = trim($_POST['usuario']??'');
    $senha = trim($_POST['senha']??'');
    $email = trim($_POST['email']??'');

    if (empty($usuario) || empty($senha) || empty($email)) {
        echo "<p>Preencha todos os campos!</p>";
    }

    if ($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p style='color:green;'>Email válido</p>";
            echo "Bem-vindo " . htmlspecialchars($usuario) . "!";
        } else {
            echo "<p style='color: red;'>Email inválido</p>";
        }
    }
}

?>