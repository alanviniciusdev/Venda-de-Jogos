<?php
session_start();

if(isset($_SESSION['numeros'])) {
    $_SESSION['numeros'] = [];
}

if(isset($_POST['numero']) && is_numeric($_POST['numero'])) {
    $_SESSION['numeros'][] = (int)$_POST['numero'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar no array</title>
</head>

<body>

    <h2>Insira um numero:</h2>
    <form method="post">
        <input type="number" name="numero" required>
        <button type="submit">Adicionar</button>
    </form>

    <h3>Numeros inseridos:</h3>
    <pre>

<?php print_r($_SESSION['numeros']); ?>
    </pre>
</body>

</html>