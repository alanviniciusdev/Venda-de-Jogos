<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIGITE O TEXTO</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f0f0f0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        gap: 20px;
    }

    h2 {
        color: #333;
        margin-bottom: 10px;
        text-align: center;
    }

    form {
        margin-bottom: 20px;
        text-align: center;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
        width: 350px;
        box-sizing: border-box;
        gap: 10px;
        margin-top: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    input[type="text"],
    textarea {
        width: 300px;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
        resize: vertical;
        display: block;
        margin: 0 auto 10px auto;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        transition: border-color 0.3s;
    }

    button {
        padding: 8px 16px;
        background-color: red;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 300px;
        font-size: 16px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s;
        display: block;
        margin: 0 auto;
        margin-top: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
        text-align: center;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-family: 'Arial Black', Arial, sans-serif;
    }

    button:hover {
        background-color: darkred;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    h3,
    h4,
    p {
        color: #555;
        text-align: center;
        margin-top: 10px;
        margin-bottom: 10px;
        font-size: 18px;
        font-weight: normal;
        line-height: 1.4;
        max-width: 600px;
        box-sizing: border-box;
        padding: 10px;
        background-color: #fff;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
        font-family: 'Georgia', serif;
    }
    </style>
</head>

<body>

    <form method="post">
        <h2>Digite seu nome</h2>
        <input type="text" name="nome" required>

        <h2>Digite seu email</h2>
        <input type="text" name="email" required>

        <h2>Digite seu telefone</h2>
        <input type="text" name="telefone" required>

        <h2>Digite um texto:</h2><br>
        <textarea name="texto" rows="5" cols="40" required></textarea><br><br>
        <button type="submit">Enviar</button>
    </form>
    <?php
      if(isset($_POST['nome'.'email'.'telefone'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        echo "<h3>Olá, $nome! Seja bem-vindo</h3>";
        echo "<h4> Seu nome em maiusculas: " . mb_strtoupper($nome, "UTF-8") . "</h4>";
      }
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $texto = trim($_POST['texto'] ?? '');
        if (!empty($texto)) {
            $palavras = str_word_count($texto);
           
            echo "<p><strong>O texto contém $palavras palavras.</strong></p>";
        } else {
            echo "<p><strong>Por favor, insira um texto válido.</strong></p>";
        }
    }
    ?>
</body>

</html>