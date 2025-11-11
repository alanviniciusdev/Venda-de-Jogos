<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta Bancária</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            line-height: 1.6;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 250px;
            gap: 10px;
        }
        h1 {
            color: #0066cc;
        }
        .resultado {
            margin-top: 30px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background: #f8f8f8;
        }
    </style>
</head>
<body>

    <h1>Simulador de Conta Bancária</h1>
    <form action="" method="post">
        <label for="nome">Nome do Titular</label>
        <input type="text" name="nome" required>

        <label for="saldo">Saldo Inicial (R$)</label>
        <input type="number" name="saldo" step="0.01" required>

        <label for="operacao">Operação</label>
        <select name="operacao" required>
            <option value="depositar">Depositar</option>
            <option value="sacar">Sacar</option>
        </select>

        <label for="valor">Valor (R$)</label>
        <input type="number" name="valor" step="0.01" required>

        <button type="submit">Executar Operação</button>
    </form>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    class ContaBancaria {
        private $titular;
        private $saldo;

        public function __construct($titular, $saldoInicial) {
            $this->titular = $titular;
            $this->saldo = (float)$saldoInicial;
        }

        public function getTitular() {
            return $this->titular;
        }

        public function getSaldo() {
            return $this->saldo;
        }

        public function depositar($valor) {
            $this->saldo += (float)$valor;
        }

        public function sacar($valor) {
            if ($valor > $this->saldo) {
                echo "<p style='color:red'><strong>Erro:</strong> Saldo insuficiente para saque!</p>";
            } else {
                $this->saldo -= (float)$valor;
            }
        }
    }

    $nome = trim($_POST['nome']);
    $saldo = (float) $_POST['saldo'];
    $valor = (float) $_POST['valor'];
    $operacao = $_POST['operacao'];

    // Cria a conta
    $conta = new ContaBancaria($nome, $saldo);

    // Executa operação
    if ($operacao === "depositar") {
        $conta->depositar($valor);
        $acao = "Depósito";
        
    } else {
        $conta->sacar($valor);
        $acao = "Saque";
    }

    // Exibe o resultado
    echo "<div class='resultado'>";
    echo "<h2>Resumo da Operação</h2>";
    echo "<p><strong>Titular:</strong> {$conta->getTitular()}</p>";
    echo "<p><strong>Operação:</strong> $acao</p>";
    echo "<p><strong>Valor:</strong> R$ " . number_format($valor, 2, ',', '.') . "</p>";
    echo "<p><strong>Saldo Atual:</strong> R$ " . number_format($conta->getSaldo(), 2, ',', '.') . "</p>";
    echo "</div>";
}
?>

</body>
</html>
