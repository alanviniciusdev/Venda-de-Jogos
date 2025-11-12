<?php
// ----------------------
// Função para calcular o fatorial
// ----------------------
function calcularFatorial($n) {
    if ($n < 0) {
        return "Não existe fatorial de número negativo.";
    }
    $fat = 1;
    for ($i = 1; $i <= $n; $i++) {
        $fat *= $i;
    }
    return $fat;
}

// ----------------------
// Função para calcular a soma de dois números
// ----------------------
function calcularSoma($a, $b) {
    return $a + $b;
}

// ----------------------
// Procedimento para mostrar resultados
// ----------------------
function mostrarResultado($texto, $valor) {
    echo "<p><b>$texto:</b> $valor</p>";
}

// ----------------------
// Programa principal
// ----------------------
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $numero = (int) $_POST["numero"];
    $n1 = (float) $_POST["n1"];
    $n2 = (float) $_POST["n2"];

    $fatorial = calcularFatorial($numero);
    $soma = calcularSoma($n1, $n2);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Funções em PHP</title>
</head>
<body>
    <h1>🔢 Cálculos com Funções em PHP</h1>

    <form method="POST">
        <h3>Fatorial</h3>
        Número: <input type="number" name="numero" required><br><br>

        <h3>Soma de dois números</h3>
        Número 1: <input type="number" step="0.1" name="n1" required><br><br>
        Número 2: <input type="number" step="0.1" name="n2" required><br><br>

        <button type="submit">Calcular</button>
    </form>

    <hr>
    <h2>Resultado:</h2>
    <?php
    if (isset($fatorial) && isset($soma)) {
        mostrarResultado("Fatorial de $numero", $fatorial);
        mostrarResultado("Soma de $n1 e $n2", $soma);
    }
    ?>
</body>
</html>