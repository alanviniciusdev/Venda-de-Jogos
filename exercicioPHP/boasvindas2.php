<?php
session_start();

// Se vier algo pelo GET, adiciona na lista de nomes
if (isset($_GET['nome']) && !empty($_GET['nome'])) {
    $_SESSION['nomes'][] = htmlspecialchars($_GET['nome']);
}

// Mostra os nomes guardados
if (isset($_SESSION['nomes'])) {
    echo "<h3>Nomes armazenados:</h3><ul>";
    foreach ($_SESSION['nomes'] as $n) {
        echo "<li>$n</li>";
    }
    echo "</ul>";
} else {
    echo "Nenhum nome foi definido.";
}
?>