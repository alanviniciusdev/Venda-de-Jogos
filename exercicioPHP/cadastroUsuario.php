<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "sistema_cadastro";
$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro de Conexão" . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');
    $sexo = $_POST['sexo'] ?? '';
    $nascimento_input = trim($_POST['nascimento'] ?? '');

    if ($nome && $email && $senha && $nascimento_input) {
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $nascimento = date('Y-m-d', strtotime($nascimento_input));

        $stmt = $conn->prepare("INSERT INTO usuarios (data_nascimento, nome, email, senha, sexo) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nascimento, $nome, $email, $senha, $sexo);

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
</head>

<body>
    <h2>Cadastro de Usuário</h2>
    <form class="form" method="post">

        <label for="nome">Nome Completo</label>
        <input type="text" name="nome" required>

        <label for="email">Email</label>
        <input type="text" name="email" required>

        <label for="senha">Senha</label>
        <input type="password" name="senha" minlength="6" maxlength="12" required>

        <label for="nascimento">Data de Nascimento</label>
        <input type="date" name="nascimento" required>

        <fieldset>
            <legend>Sexo</legend>
            <div>
                <label for="Masculino">Masculino</label>
                <input type="radio" name="sexo" value="Masculino" required>
            </div>
            <div>
                <label for="Feminino">Feminino</label>
                <input type="radio" name="sexo" value="Feminino">
            </div>
            <div>
                <label for="Outro">Outro</label>
                <input type="radio" name="sexo" value="Outro">
            </div>
        </fieldset>

        <button type="submit">Cadastrar</button>
    </form>
</body>

</html>