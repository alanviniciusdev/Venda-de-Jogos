<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "pagina_jogos";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $titulo = trim($_POST['titulo']);
    $genero = trim($_POST['genero']);
    $plataforma = trim($_POST['plataforma']);
    $desenvolvedora = trim($_POST['desenvolvedora']);
    $preco = floatval($_POST['preco']);
    $estoque = intval($_POST['estoque']);
    $dataHora = date('Y-m-d H:i:s');
    $capa = "";

    if (isset($_FILES['capa']) && $_FILES['capa']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['capa']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . '.' . $ext;
        $destino = __DIR__ . "/uploads/" . $nomeArquivo;
        if (!move_uploaded_file($_FILES['capa']['tmp_name'], $destino)) {
           die("Erro ao mover o arquivo enviado.");
        }
        $capa = "uploads/" . $nomeArquivo;
    }

    $stmt = $conn->prepare("INSERT INTO games (dataHora, titulo, genero, plataforma, desenvolvedora, capa, estoque, preco) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssdd", $dataHora, $titulo, $genero, $plataforma, $desenvolvedora, $capa, $estoque, $preco);
    $stmt->execute();
    $stmt->close();

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$games = [];
$result = $conn->query("SELECT * FROM games ORDER BY dataHora DESC");
if ($result && $result->num_rows > 0) {
    $games = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Jogos</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <button onclick="window.location.href='loja.php'">Ver Loja</button>
    <h1>Registro de Jogos para a Loja (somente admins)</h1>

    <form method="POST" class="form" enctype="multipart/form-data">
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" required>

        <label for="genero">Gênero</label>
        <input type="text" name="genero" id="genero" required>

        <label for="plataforma">Plataforma</label>
        <input type="text" name="plataforma" id="plataforma" required>

        <label for="desenvolvedora">Desenvolvedora</label>
        <input type="text" name="desenvolvedora" id="desenvolvedora" required>

        <label for="estoque">Estoque</label>
        <input type="number" name="estoque" id="estoque" required>

        <label for="preco">Preço</label>
        <input type="number" name="preco" min="0" step="0.01" required>

        <label for="capa">Capa do Jogo</label>
        <input type="file" name="capa" id="capa" accept="image/*" required>

        <button class="btn-register" type="submit">Registrar Jogo</button>
    </form>

    <h2>Jogos Registrados</h2>
    <table>
        <tr>
            <th>Data/Hora</th>
            <th>Capa do Jogo</th>
            <th>Título</th>
            <th>Gênero</th>
            <th>Plataforma</th>
            <th>Desenvolvedora</th>
            <th>Estoque</th>
            <th>Preço</th>
        </tr>

        <?php foreach ($games as $jogo): ?>
        <tr>
            <td><?= htmlspecialchars($jogo['dataHora']) ?></td>
            <td>
                <?php if (!empty($jogo['capa']) && file_exists(__DIR__ . '/' . $jogo['capa'])): ?>
                <img src="<?= htmlspecialchars($jogo['capa']) ?>" alt="Capa do Jogo" width="200">
                <?php else: ?>
                <span>Sem imagem</span>
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($jogo['titulo']) ?></td>
            <td><?= htmlspecialchars($jogo['genero']) ?></td>
            <td><?= htmlspecialchars($jogo['plataforma']) ?></td>
            <td><?= htmlspecialchars($jogo['desenvolvedora']) ?></td>
            <td><?= number_format($jogo['estoque']) ?></td>
            <td>
                <?php echo 'R$ ' . number_format($jogo['preco'], 2, ',', '.') ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>



</body>

</html>