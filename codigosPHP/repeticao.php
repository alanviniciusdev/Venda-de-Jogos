<!-- While -->
<?php
$i = 0;
while ($i < 5) {
    echo $i;
    $i ++;
}
?>

<!-- Do -->
<?php
$i = 0;
do {
    echo $i;
    $i++;
} while ($i < 5);
?>

<!-- Foreach -->
<?php
$nomes = ["Ana", "João", "Maria"];
foreach ($nomes as $nome) {
    echo $nome;
}
?>

<?php 
$alunos = ["a1" => "Lucas", "a2" => "Marina"];
foreach ($alunos as $chave => $valor) {
    echo "$chave: $valor";
}
?>