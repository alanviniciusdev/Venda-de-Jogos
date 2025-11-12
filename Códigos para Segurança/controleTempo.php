<?php
session_start();

// Controle da sessão
if (isset($_REQUEST["page"])) {
    switch($_REQUEST["page"]){
        case "iniciar":
            $_SESSION['inicio'] = time();
            break;

        case "reiniciar":
            session_unset();
            session_destroy();
            $_SESSION = [];
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
    }
}

$mensagem = "";

// Quando o formulário é enviado
if (isset($_POST['campo']) && isset($_SESSION['inicio'])) {
    $campo = $_POST['campo'];
    $tempoAtual = time();
    $tempoDecorrido = $tempoAtual - $_SESSION['inicio'];

    if ($tempoDecorrido > 5) {
        $mensagem = "Tempo esgotado! Você demorou $tempoDecorrido segundos.";
    } else {
        $mensagem = "Você digitou: $campo em $tempoDecorrido segundos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Tempo</title>
</head>
<body>

<h1>Controle de Tempo com Sessão</h1>

<form action="" method="POST">
    <button type="submit" name="page" value="iniciar">Iniciar</button>
    <button type="submit" name="page" value="reiniciar">Reiniciar</button>
</form>

<?php
if (isset($_SESSION['inicio'])) {
    $dataInicio = date("H:i:s", $_SESSION['inicio']);
    echo "<p>Início da sessão: $dataInicio</p>";
    include 'formularioControle.php'; // formulário de digitar algo
}

if ($mensagem != "") {
    echo "<p><b>$mensagem</b></p>";
}
?>

</body>
</html>
