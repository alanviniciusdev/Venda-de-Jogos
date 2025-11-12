<?php
// Lê o valor informado, padrão = 5
$N = isset($_GET['n']) ? max(1, min(30, intval($_GET['n']))) : 5;

function desenharEnigma($n) {
    for ($i = 1; $i <= $n; $i++) {
        echo str_repeat(' ', $n - $i);   // espaços à esquerda
        echo str_repeat('*', 2*$i - 1); // asteriscos
        echo "<br>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Enigma Simples</title>
</head>
<body>
    <h2>Enigma</h2>
    <form method="get">
        <label>Informe um número:
            <input type="number" name="n" min="1" max="30" value="<?= $N ?>">
        </label>
        <button type="submit">Desenhar</button>
    </form>
    <pre style="font-family: monospace;">
<?php desenharEnigma($N); ?>
    </pre>
</body>
</html>