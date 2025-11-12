<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada</title>

</head>

<body>
    <h2>Gerador de Tabuada</h2>
    <form method="post">
        <label>Digite um numero (1 a 10):</label>
        <input type="number" name="numero" min="1" max="10" required>
        <button type="submit">Gerar</button>
    </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $numero = (int) $_POST["numero"];
        
        for ($i=1; $i <= 10; $i++) {
            $resultado = $numero*$i;
            echo "$numero x $i = $resultado <br>";
        }
    }
?>
</body>

</html>