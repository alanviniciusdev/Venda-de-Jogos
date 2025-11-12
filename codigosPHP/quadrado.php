<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir Quadrado </title>
</head>

<body>
    <form method="post">
        <label>Qual a dimensão do quadrado:</label>
        <input type="number" name="numero" min="2" required>
        <button type="submit">Gerar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $numero = (int) $_POST["numero"];

        for ($l=1; $l <= $numero; $l++) {
            for ($c = 1; $c <= $numero; $c++) {
                echo "* ";
            }
            echo "<br>";
        }
    }
    ?>
</body>

</html>