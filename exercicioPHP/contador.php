<?php
$contador_visitas = 'visitas.txt';

if (!file_exists($contador_visitas)) {
    file_put_contents($contador_visitas, "0");
}

$visitas = file_get_contents($contador_visitas);
$visitas++;

file_put_contents($contador_visitas, $visitas);

echo "Você é o visitante número: $visitas";
?>