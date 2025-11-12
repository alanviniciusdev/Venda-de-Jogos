<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Array de Nomes</title>
</head>
<body>
    <?php
    session_start(); // Inicia a sessão

    // Se ainda não existir um array de nomes na sessão, cria um inicial
    if (!isset($_SESSION['nomes'])) {
        $_SESSION['nomes'] = ["Ana", "João", "Carlos", "Beatriz", "Lucas"];
    }

    // Se o formulário foi enviado, adiciona o novo nome no array da sessão
    if (isset($_POST['meu_nome']) && !empty(trim($_POST['meu_nome']))) {
        $meu_nome = trim($_POST['meu_nome']);
        array_unshift($_SESSION['nomes'], $meu_nome); // adiciona no início
        array_push($_SESSION['nomes'], $meu_nome);   // adiciona no final
    }
    ?>

    <h2>Adicione seu nome ao array</h2>
    <form method="post">
        <input type="text" name="meu_nome" required>
        <button type="submit">Adicionar</button>
    </form>

    <h3>Array Atual:</h3>
    <pre>
<?php print_r($_SESSION['nomes']); ?>
    </pre>
</body>
</html>