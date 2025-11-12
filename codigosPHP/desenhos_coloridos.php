<?php
// Pega os valores do formulário
$desenho = isset($_GET['desenho']) ? $_GET['desenho'] : 'triangulo_normal';
$linhas = isset($_GET['linhas']) ? intval($_GET['linhas']) : 5; // padrão 5 linhas
$caractere = isset($_GET['caractere']) ? $_GET['caractere'] : '*'; // padrão *
$cor = isset($_GET['cor']) ? $_GET['cor'] : 'black'; // cor padrão

// Formulário
echo "<h2>Escolha o tipo de desenho</h2>";
echo "<form method='get'>";
echo "Desenho: ";
echo "<select name='desenho'>";
$opcoes = [
    'triangulo_normal' => 'Triângulo Normal (à esquerda)',
    'triangulo_centralizado' => 'Triângulo Centralizado',
    'triangulo_invertido' => 'Triângulo Invertido',
    'quadrado' => 'Quadrado',
    'losango' => 'Losango'
];
foreach ($opcoes as $key => $valor) {
    $selected = $desenho == $key ? ' selected' : '';
    echo "<option value='$key'$selected>$valor</option>";
}
echo "</select><br><br>";

echo "Número de linhas: <input type='number' name='linhas' value='$linhas' min='1' max='20'><br><br>";
echo "Caractere do desenho: <input type='text' name='caractere' value='$caractere' maxlength='1'><br><br>";
echo "Cor do desenho: <input type='color' name='cor' value='$cor'><br><br>";
echo "<input type='submit' value='Gerar'>";
echo "</form>";

// Saída do desenho
echo "<h3>Saída:</h3>";
echo "<pre style='font-family: monospace;'>"; // mantém alinhamento

function linha_colorida($texto, $cor) {
    return "<span style='color:$cor;'>$texto</span>";
}

switch ($desenho) {
    case 'triangulo_normal':
        for ($i = 1; $i <= $linhas; $i++) {
            echo linha_colorida(str_repeat($GLOBALS['caractere'], $i), $cor) . "\n";
        }
        break;

    case 'triangulo_centralizado':
        for ($i = 1; $i <= $linhas; $i++) {
            echo str_repeat(" ", $linhas - $i) . linha_colorida(str_repeat($caractere, 2 * $i - 1), $cor) . "\n";
        }
        break;

    case 'triangulo_invertido':
        for ($i = $linhas; $i >= 1; $i--) {
            echo str_repeat(" ", $linhas - $i) . linha_colorida(str_repeat($caractere, 2 * $i - 1), $cor) . "\n";
        }
        break;

    case 'quadrado':
        for ($i = 1; $i <= $linhas; $i++) {
            echo linha_colorida(str_repeat($caractere, $linhas), $cor) . "\n";
        }
        break;

    case 'losango':
        $n = $linhas;
        for ($i = 1; $i <= $n; $i++) {
            echo str_repeat(" ", $n - $i) . linha_colorida(str_repeat($caractere, 2 * $i - 1), $cor) . "\n";
        }
        for ($i = $n - 1; $i >= 1; $i--) {
            echo str_repeat(" ", $n - $i) . linha_colorida(str_repeat($caractere, 2 * $i - 1), $cor) . "\n";
        }
        break;

    default:
        echo "Desenho não encontrado.";
}

echo "</pre>";
?>