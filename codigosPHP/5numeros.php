<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo de 5 numeros</title>
    <style>
    #form {
        display: flex;
        flex-direction: column;
    }

    #form>input {
        width: 200px;
    }

    #btn {
        width: 100px;
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <h1>Digite 5 numeros</h1>
    <form method="post" id="form">
        Número 1:<input type="number" name="numero[]">
        Número 2:<input type="number" name="numero[]">
        Número 3:<input type="number" name="numero[]">
        Número 4:<input type="number" name="numero[]">
        Número 5:<input type="number" name="numero[]">
        <button type="submit" id="btn">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $numeros = $_POST["numero"];
        echo "<pre>";
        print_r($numeros);
        echo "</pre>";

        $soma = array_sum($numeros);
        echo "A soma dos numeros é: $soma";

        $media = $soma/count($numeros);
        echo "<br>A média dos numeros é: $media";
    }
    ?>
</body>

</html>