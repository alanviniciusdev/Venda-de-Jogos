<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Sessão de Nomes</title>
</head>
<body>
<?php
session_start(); // Inicia ou continua a sessão

// Se o usuário clicou para terminar a sessão
if (isset($_POST['finalizar'])) {
    session_destroy();
    session_unset();
    echo "<p style='color:red;'><strong>Sessão encerrada. O array foi limpo!</strong></p>";
}
// Se a sessão não existe ainda, cria o array inicial
if (!isset($_SESSION['nomes'])) {
    $_SESSION['nomes'] = ["Ana", "João", "Carlos", "Beatriz", "Lucas"];
}

// Se um nome foi enviado e a sessão está ativa
if (isset($_POST['meu_nome']) && !empty(trim($_POST['meu_nome'])) && isset($_SESSION['nomes'])) {
    $meu_nome = trim($_POST['meu_nome']);
    array_unshift($_SESSION['nomes'], $meu_nome); // adiciona no início
    array_push($_SESSION['nomes'], $meu_nome);   // adiciona no final
}
?>

<h2>Gerenciamento de Nomes</h2>

<!-- Formulário para adicionar nomes -->
<?php if (isset($_SESSION['nomes'])): ?>
    <form method="post">
        <input type="text" name="meu_nome" placeholder="Digite um nome" required>
        <button type="submit">Adicionar</button>
    </form>
<?php else: ?>
    <p style="color:blue;">Sessão não está ativa. Clique em "Iniciar Sessão" para começar.</p>
<?php endif; ?>

<!-- Botões de controle da sessão -->
<form method="post" style="margin-top: 10px;">
    <?php if (isset($_SESSION['nomes'])): ?>
        <button type="submit" name="finalizar" style="background:red; color:white;">Finalizar Sessão</button>
    <?php else: ?>
        <button type="submit" name="iniciar" style="background:green; color:white;">Iniciar Sessão</button>
    <?php endif; ?>
</form>

<!-- Exibição do array atual -->
<h3>Array Atual:</h3>
<pre>
<?php
if (isset($_SESSION['nomes'])) {
    print_r($_SESSION['nomes']);
} else {
    echo "Nenhuma sessão ativa.";
}
?>
</pre>

</body>
</html>