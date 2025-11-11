<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo de Retangulo</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 200px;
            gap: 20px;
        }

        .resultado {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <h1>Cálculo de Área e Perímetro do Retângulo</h1>
    <form action="" method="post">
        <label for="largura">Largura (m)</label>
        <input type="number" name="largura" id="">

        <label for="altura">Altura (m)</label>
        <input type="number" name="altura" id="">

        <button type="submit">Calcular</button>
    </form>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    class Retangulo {
    
        public $largura;
        public $altura;

        public function __construct($largura, $altura) {
            $this->largura = $largura;
            $this->altura = $altura;

        }

        public function calcular() {
            $area = $this->largura * $this->altura;
            $perimetro = 2*($this->largura + $this->altura);

            echo "<div class='resultado'>";
            echo "<strong>Resultados:</strong>";
            echo "<p>Largura: $this->largura</p>";
            echo "<p>Altura: $this->altura</p>";
            echo "<p>Área: $area m²</p>";
            echo "<p>Perímetro: $perimetro m</p>";
            echo "</div>";
        }
    }

    $calculo = new Retangulo (number_format($_POST['largura']), number_format($_POST['altura']));
    $calculo->calcular();
}

?>