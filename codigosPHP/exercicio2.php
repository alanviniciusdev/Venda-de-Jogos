<form method="post">
    <label for="name">Digite seu nome</label>
    <input type="text" name="nome">
    <button type="submit">Enviar</button>
</form>

<?php
    if(isset($_POST['nome'])) {
        $nome = $_POST['nome'];
        echo "Olá, $nome seja bem vindo <br>";
        echo "Seu nome em letras maiusculas: " . mb_strtoupper($nome, 'UTF-8');
    }
?>