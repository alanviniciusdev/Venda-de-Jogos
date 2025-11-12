<?php
// Se existir cookie, transforma em array
$nomes = isset($_COOKIE['nomes']) ? json_decode($_COOKIE['nomes'], true) : [];

// Se vier algo pelo GET, adiciona
if (isset($_GET['nome']) && !empty($_GET['nome'])) {
    $nomes[] = htmlspecialchars($_GET['nome']);
    // Atualiza o cookie (1 hora de duração)
    setcookie("nomes", json_encode($nomes), time() + 3600);
}

// Mostra
if (!empty($nomes)) {
    echo "<h3>Nomes armazenados:</h3><ul>";
    foreach ($nomes as $n) {
        echo "<li>$n</li>";
    }
    echo "</ul>";
} else {
    echo "Nenhum nome foi definido.";
}
?>