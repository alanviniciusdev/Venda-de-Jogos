<?php
    $frutas=["Maçã", "Banana", "Laranja", "Uva"];
    foreach ($frutas as $fruta) {
        echo $fruta."<br>";
    }

    $palavra="programacao";
    $letra="p";
    $quantidade=strlen($palavra);
    echo "A palavra '$palavra' tem $quantidade letras.<br>";
    if(strpos($palavra, $letra) !== false) {
        echo "A letra '$letra' está na palavra '$palavra'.";
    } else {
        echo "A letra '$letra' não está na palavra '$palavra'.";
    }
?>