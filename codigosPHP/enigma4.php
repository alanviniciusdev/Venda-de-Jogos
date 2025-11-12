<?php
// Lê os valores informados, padrão = 5x3
$L = isset($_GET['l']) ? max(1, min(60, intval($_GET['l']))) : 5; // largura
$H = isset($_GET['h']) ? max(1, min(30, intval($_GET['h']))) : 3; // altura

function modoA($largura, $altura) {
    for ($i = 1; $i <= $altura; $i++) {
        echo str_repeat('*', $largura) . "<br>";
    }
}

function modoB($largura, $altura) {
    for ($i = 1; $i <= $altura; $i++) {
        /* Primeira Linha e a Ultima */
        if ($i == 1 || $i == $altura) {
            echo str_repeat('*', $largura) . "<br>";
        } else {
            echo '*' . str_repeat(' ', $largura - 2) .'*' . "<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Enigma</title>
</head>

<body>
    <h2>Programa Enigma</h2>
    <form method="get">
        <label>Largura:
            <input type="number" name="l" min="1" max="60" value="<?= $L ?>">
        </label>
        <label>Altura:
            <input type="number" name="h" min="1" max="30" value="<?= $H ?>">
        </label>
        <label>Modo:
            <select id="modo" name="modo">
                <option value="A">Modo A</option>
                <option value="B">Modo B</option>
            </select>
        </label>
        <button type="submit">Executar</button>
    </form>
    <pre style="font-family: monospace;">
<?php
if(isset($_GET['modo']) && $_GET['modo'] == 'B') {
    modoB($L, $H);
} else {
    modoA($L, $H);
}
?>
    </pre>
</body>

</html>