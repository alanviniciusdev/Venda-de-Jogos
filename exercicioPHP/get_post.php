<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Teste GET e POST</title>
</head>
<body>
  <h2>Formulário com GET</h2>
  <form method="GET">
    Nome: <input type="text" name="nome">
    <input type="submit" value="Enviar GET">
  </form>

  <h2>Formulário com POST</h2>
  <form method="POST">
    Nome: <input type="text" name="nome">
    <input type="submit" value="Enviar POST">
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD']) {
      $metodo = $_SERVER['REQUEST_METHOD'];
      $cliente = $_SERVER['HTTP_USER_AGENT'];
      $servidor = $_SERVER['SERVER_NAME'];
      $nome = $_REQUEST['nome'] ?? 'não informado';

      echo "<h2>Resultado da Requisição</h2>";
      echo "Método usado: <strong>$metodo</strong><br>";
      echo "Cliente (navegador): <strong>$cliente</strong><br>";
      echo "Servidor: <strong>$servidor</strong><br>";
      echo "Nome enviado: <strong>$nome</strong><br>";
  }
  ?>
</body>
</html>