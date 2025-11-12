<?php
function secao($titulo, $dados) {
    echo "<h2>$titulo</h2>";
    echo "<table border='1' cellpadding='6' cellspacing='0' style='border-collapse: collapse; margin-bottom:20px;'>";
    echo "<tr style='background:#eee;'><th>Chave</th><th>Valor</th></tr>";
    foreach ($dados as $chave => $valor) {
        if (is_array($valor) || is_object($valor)) {
            $valor = print_r($valor, true);
        }
        echo "<tr><td><b>$chave</b></td><td>" . htmlspecialchars($valor) . "</td></tr>";
    }
    echo "</table>";
}

echo "<!DOCTYPE html><html lang='pt-br'><head>
<meta charset='UTF-8'>
<title>Painel do Servidor</title>
</head><body style='font-family: Arial, sans-serif;'>";

echo "<h1>🔎 Informações do Servidor PHP</h1>";

secao("Servidor", [
    "Nome" => $_SERVER['SERVER_NAME'] ?? '',
    "IP" => $_SERVER['SERVER_ADDR'] ?? '',
    "Porta" => $_SERVER['SERVER_PORT'] ?? '',
    "Software" => $_SERVER['SERVER_SOFTWARE'] ?? '',
    "Gateway" => $_SERVER['GATEWAY_INTERFACE'] ?? '',
]);

secao("Requisição", [
    "Método" => $_SERVER['REQUEST_METHOD'] ?? '',
    "URI" => $_SERVER['REQUEST_URI'] ?? '',
    "Query String" => $_SERVER['QUERY_STRING'] ?? '',
    "User Agent" => $_SERVER['HTTP_USER_AGENT'] ?? '',
    "Referer" => $_SERVER['HTTP_REFERER'] ?? 'N/A',
    "HTTPS" => isset($_SERVER['HTTPS']) ? 'Sim' : 'Não',
]);

secao("Script Atual", [
    "Arquivo" => $_SERVER['SCRIPT_FILENAME'] ?? '',
    "PHP Self" => $_SERVER['PHP_SELF'] ?? '',
    "Script Name" => $_SERVER['SCRIPT_NAME'] ?? '',
    "Document Root" => $_SERVER['DOCUMENT_ROOT'] ?? '',
]);

secao("Cliente", [
    "IP" => $_SERVER['REMOTE_ADDR'] ?? '',
    "Porta" => $_SERVER['REMOTE_PORT'] ?? '',
    "Host" => $_SERVER['REMOTE_HOST'] ?? 'N/A',
]);

secao("PHP", [
    "Versão" => phpversion(),
    "Sistema" => php_uname(),
    "Extensões Carregadas" => implode(", ", get_loaded_extensions()),
]);

echo "</body></html>";