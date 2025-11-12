<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "pagina_jogos";
$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro de Conexão" . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if ($nome && $email && $senha) {
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $email, $senha);

        if ($stmt->execute()) {
            echo "Usuário Cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $stmt->$error;
        }

        $stmt->close();
    } else {
        echo "Preencha todos os campos corretamente.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>

<body>

    <form class="form" method="post">
        <h2>Cadastro de Usuário</h2>

        <label for="nome">Nome Completo</label>
        <input type="text" name="nome" required>

        <label for="email">Email</label>
        <input type="text" name="email" required>

        <label for="senha">Senha</label>
        <input type="password" name="senha" minlength="6" maxlength="12" required>

        <button class="btn" type="submit">Cadastrar</button>
    </form>
</body>

</html>