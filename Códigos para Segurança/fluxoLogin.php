<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="POST">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="">
        <button type="submit">Entrar</button>
    </form>
</body>
</html>

<?php
session_start();

$senhaCadastrada = "123456";
$tempo_bloqueio = 10;

// Inicializa tentativas
if (!isset($_SESSION["tentativas"])) {
    $_SESSION["tentativas"] = 0;
}

// Verifica se está bloqueado
if (isset($_SESSION["bloqueado_ate"]) && time() < $_SESSION["bloqueado_ate"]) {
    $restante = $_SESSION["bloqueado_ate"] - time();
    echo "<p style='color:red;'>⏳ Você está bloqueado. Tente novamente em {$restante} segundos.</p>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $senhaDigitada = trim($_POST['senha'] ?? '');

    if (!empty($senhaDigitada)) {

        if (strlen($senhaDigitada) < 6) {
            echo "<p style='color: orange'>A senha deve conter pelo menos 6 caracteres.</p>";

        } elseif ($senhaDigitada === $senhaCadastrada) { // comparação simples
            echo "<p style='color:green;'>✅ Senha Correta</p>";
            echo "<p>Senha digitada (segura): <strong>" . htmlspecialchars($senhaDigitada) . "</strong></p>";

            $_SESSION["tentativas"] = 0; // zera tentativas

        } else {
            $_SESSION["tentativas"]++;

            $restantes = 3 - $_SESSION["tentativas"];
            echo "<p style='color:red;'>❌ Senha Incorreta</p>";

            if ($restantes > 0) {
                echo "<p>Tentativas restantes: {$restantes}</p>";
            } else {
                $_SESSION["bloqueado_ate"] = time() + $tempo_bloqueio;
                echo "<p style='color:red;'>🚫 Você excedeu o número máximo de tentativas. Bloqueado por {$tempo_bloqueio} segundos.</p>";
                $_SESSION["tentativas"] = 0; // reseta tentativas após bloqueio
            }
        }

    } else {
        echo "<p>Preencha o campo 'Senha'</p>";
    }
}
?>
;
