<?php
// ----------------------
// Função com retorno
// ----------------------
function calcularMedia($notas) {
    return array_sum($notas) / count($notas);
}

// ----------------------
// Procedimento sem retorno
// ----------------------
function mostrarResultado($nome, $media) {
    if ($media >= 7) {
        return "Aluno $nome foi <b>APROVADO</b> com média $media.<br>";
    } elseif ($media >= 5) {
        return "Aluno $nome está de <b>RECUPERAÇÃO</b> com média $media.<br>";
    } else {
        return "Aluno $nome foi <b>REPROVADO</b> com média $media.<br>";
    }
}

// ----------------------
// Programa principal
// ----------------------
$resultado = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $notas = [
        (float) $_POST["nota1"],
        (float) $_POST["nota2"],
        (float) $_POST["nota3"]
    ];

    $media = calcularMedia($notas);
    $resultado = mostrarResultado($nome, $media);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Notas</title>
</head>
<body>
    <h1>📘 Calculadora de Notas</h1>

    <form method="POST">
        Nome: <input type="text" name="nome" required><br><br>
        Nota 1: <input type="number" step="0.1" name="nota1" required><br><br>
        Nota 2: <input type="number" step="0.1" name="nota2" required><br><br>
        Nota 3: <input type="number" step="0.1" name="nota3" required><br><br>
        <button type="submit">Calcular Média</button>
    </form>

    <hr>
    <h2>Resultado:</h2>
    <p><?= $resultado ?></p>
</body>
</html>