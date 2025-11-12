<?php
/* Caminho do arquivo CSV */
$arquivo_csv = 'dados.csv';

/* Salvar dados se o formulario foi enviado */
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $responsavel = trim($_POST['responsavel']);
    $componente = trim($_POST['componente']);
    $observacao = trim($_POST['observacao']);
    $resultado = trim($_POST['resultado']);
    $dataHora = date($_POST['Y-m-d H:i:s']);

    /* Abre o arquivo CSV */
    $arquivo = fopen($arquivo_csv, 'a');
    fputcsv($arquivo, [$dataHora, $responsavel, $componente, $observacao, $resultado]);
    fclose($arquivo);

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$dados = [];
if(file_exists($arquivo_csv)) {
    $dados = array_map('str_getcsv', file($arquivo_csv));
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 200px;
        }
        form input, form textarea, form select {
            width: 100%;
            
        }
            
        
    </style>
</body>
</html>