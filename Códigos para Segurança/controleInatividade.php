<?php
session_start();

header("Refresh: 10");

$tempoMaximo = 60;

if (!isset($_SESSION['ultimo_acesso'])) {
    $_SESSION['ultimo_acesso'] = time();
}

$tempoInativo = time() - $_SESSION['ultimo_acesso'];
if ($tempoInativo > $tempoMaximo) {
    session_unset();
    session_destroy();
    $_SESSION = [];
    $mensagem = "Sessão encerrada por inatividade.";
} else {
    $mensagem = "Sessão ativa. Tempo inativo: {$tempoInativo} segundos.";
}

if (isset($_POST['acao']) && $_POST['acao'] === 'continuar') {
    $_SESSION['ultimo_acesso'] = time();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Inatividade</title>
</head>
<body>

<h1>Controle de Sessão por Inatividade</h1>

<p><?php echo $mensagem; ?></p>

<form action="" method="POST">
    <button type="submit" name="acao" value="continuar">Continuar sessão</button>
</form>

</body>
</html>
