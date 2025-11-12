<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contador de Palavras</title>
</head>
<body>
    <h2>Digite um texto</h2>
    <form method="post">
        <textarea name="texto" rows="5" cols="50" required></textarea><br><br>
        <button type="submit">Contar</button>
    </form>

    <?php
    if (isset($_POST['texto'])) {
        $texto = trim($_POST['texto']);
        $qtdPalavras = str_word_count($texto);
        print_r ($texto);
        echo "<h3>O texto possui $qtdPalavras palavra(s).</h3>";
    }
    ?>
</body>
</html>