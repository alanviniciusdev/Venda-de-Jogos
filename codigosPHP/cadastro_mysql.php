<?php
// Configuração do banco de dados
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "loja";

// Conectar ao MySQL
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Salvar dados se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente    = trim($_POST['cliente']);
    $produto    = trim($_POST['produto']);
    $quantidade = intval($_POST['quantidade']);
    $preco      = floatval($_POST['preco']);
    $status     = trim($_POST['status']);
    $dataHora   = date('Y-m-d H:i:s');

    // Inserir no banco
    $stmt = $conn->prepare("INSERT INTO pedidos (dataHora, cliente, produto, quantidade, preco, status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssids", $dataHora, $cliente, $produto, $quantidade, $preco, $status);
    $stmt->execute();
    $stmt->close();

    // Evita reenvio ao atualizar a página
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Ler registros existentes
$pedidos = [];
$result = $conn->query("SELECT * FROM pedidos ORDER BY dataHora DESC");
if ($result && $result->num_rows > 0) {
    $pedidos = $result->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Registro de Pedidos da Loja</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    form input,
    form select {
        width: 100%;
        margin-bottom: 10px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }

    table th {
        background-color: #f0f0f0;
    }

    table td,
    table th {
        padding: 8px;
        border: 1px solid #ccc;
        text-align: center;
    }
    </style>
</head>

<body>
    <h1>Registro de Pedidos da Loja</h1>

    <form method="POST">
        <label>Cliente:</label>
        <input type="text" name="cliente" required>

        <label>Produto:</label>
        <input type="text" name="produto" required>

        <label>Quantidade:</label>
        <input type="number" name="quantidade" min="1" required>

        <label>Preço Unitário (R$):</label>
        <input type="number" name="preco" min="0" step="0.01" required>

        <label>Status do Pedido:</label>
        <select name="status" required>
            <option value="Pendente">Pendente</option>
            <option value="Enviado">Enviado</option>
            <option value="Entregue">Entregue</option>
        </select>

        <button type="submit">Registrar Pedido</button>
    </form>

    <h2>Histórico de Pedidos</h2>
    <table>
        <tr>
            <th>Data/Hora</th>
            <th>Cliente</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço Unitário (R$)</th>
            <th>Total (R$)</th>
            <th>Status</th>
        </tr>
        <?php foreach ($pedidos as $pedido): 
            $total = $pedido['quantidade'] * $pedido['preco'];
        ?>
        <tr>
            <td><?= htmlspecialchars($pedido['dataHora']) ?></td>
            <td><?= htmlspecialchars($pedido['cliente']) ?></td>
            <td><?= htmlspecialchars($pedido['produto']) ?></td>
            <td><?= htmlspecialchars($pedido['quantidade']) ?></td>
            <td><?= number_format($pedido['preco'],2,',','.') ?></td>
            <td><?= number_format($total,2,',','.') ?></td>
            <td><?= htmlspecialchars($pedido['status']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
<?php $conn->close(); ?>