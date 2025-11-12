<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Array de Nomes</title>
</head>
<body>
    <h2>Adicione seu nome ao array</h2>
    <form method="post">
        <input type="text" name="meu_nome" required>
        <button type="submit">Adicionar</button>
    </form>

    <?php
    $nomes = ["Ana", "João", "Carlos", "Beatriz", "Lucas"];
    if (isset($_POST['meu_nome'])) {
        $meu_nome = $_POST['meu_nome'];
        echo "<h3>Array inicial:</h3>";
        echo "<pre>";
        print_r($nomes);
        echo "</pre>";
        array_unshift($nomes, $meu_nome);
        array_push($nomes, $meu_nome);

        echo "<h3>Array atualizado:</h3>";
        echo "<pre>";
        print_r($nomes);
        echo "</pre>";
    }
    ?>
</body>
</html>