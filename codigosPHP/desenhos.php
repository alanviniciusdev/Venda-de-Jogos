<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Escolha do Desenho</h2>
    <form method="get">
        <label>Numero de linhas:
            <input type="number" name="l" min="1" max="60" value="<?= $L ?>">
        </label>
</body>

</html>

<?php
// Verifica qual desenho foi escolhido pelo aluno
$desenho = isset($_GET['desenho']) ? $_GET['desenho'] : 'triangulo_direita';

$linhas = isset($_GET['l']) ? max(1, min(60, intval($_GET['l']))) : 5;

echo "<form method='get'>";
echo "<select name='desenho'>";
echo "<option value='triangulo_direita'" . ($desenho=='triangulo_direita' ? ' selected' : '') . ">Triângulo à Direita</option>";
echo "<option value='triangulo_esquerda'" . ($desenho=='triangulo_esquerda' ? ' selected' : '') . ">Triângulo à Esquerda</option>";
echo "<option value='triangulo_invertido'" . ($desenho=='triangulo_invertido' ? ' selected' : '') . ">Triângulo Invertido</option>";
echo "</select>";
echo "<input type='submit' value='Gerar'>";
echo "</form>";
echo "<h3>Saída:</h3>";

switch ($desenho) {
    case 'triangulo_direita':
        for ($i = 1; $i <= $linhas; $i++) { 
            echo str_repeat("&nbsp;", $linhas - $i); 
            echo str_repeat("*", $i); 
            echo "<br>" ; 
        } break;

    case 'triangulo_esquerda' : 
        for ($i=1; $i <= $linhas; $i++) { 
            echo str_repeat("*", $i); 
            echo "<br>" ; 
        } break;

    case 'triangulo_invertido' : 
        for ($i = $linhas; $i>= 1; $i--) {
            echo str_repeat("&nbsp;", $linhas - $i);
            echo str_repeat("*", $i);
            echo "<br>";
        } break;

    default:
        echo "Desenho não encontrado.";
    }
?>