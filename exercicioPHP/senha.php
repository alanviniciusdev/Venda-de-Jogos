<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senha</title>
</head>
<body>
    <h1>Digite a senha para acessar o contador</h1>

    <form action="" method="POST">
        <input type="password" name="senha" id="senha" placeholder="Senha">
        <button type="submit">Enviar</button>
    </form>
</body> 
</html>

<?php

session_start();

$senhaCorreta = "1234";
 
if(isset($_POST['senha'])) {
    if($_POST['senha'] === $senhaCorreta) {
        $_SESSION['logado'] = true;
        header("Location: contador.php");
        exit;
    } else {
        echo "Senha Incorreta";
    }
}
?>