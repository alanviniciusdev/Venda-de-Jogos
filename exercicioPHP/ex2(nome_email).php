<!-- formulario.html -->
<form action="" method="POST">
    Nome: <input type="text" name="nome"><br>
    Email: <input type="email" name="email"><br>
    <button type="submit">Enviar</button>
</form>
<?php
// processa.php
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';

if (empty($nome) || empty($email)) {
    echo "Preencha todos os campos!";
    exit;
}

echo "Obrigado, " . htmlspecialchars($nome) . "!<br>";
echo "Nós enviaremos novidades para " . htmlspecialchars($email) . ".";
$email = $_POST['email'] ?? '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email inválido!";
} else {
    echo "Email válido: " . htmlspecialchars($email);
}

?>
