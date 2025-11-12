<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<form method="post">
  <label>Digite seu nome:</label>
  <input type="text" name="nome">
  <button type="submit">Enviar</button>
</form>

</html>

<!-- <?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"] ?? "";
    echo "<p>Olá, $nome!</p>"; // ⚠️ Exemplo inseguro
}
?> -->

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"] ?? "";
    echo "<p>Olá, " .htmlspecialchars($nome) . "!</p>"; // ⚠️ Exemplo seguro
}
?>