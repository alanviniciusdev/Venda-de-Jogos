<form action="" method="POST" enctype="multipart/form-data">
    Insira uma imagem<input type="file" name="imagem" id="imagem" accept="image/*">
    <button type="submit">Enviar</button>
</form>

<?php

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $imagem = "";

    if(isset($_FILES['imagem'])) {
        $arquivo = $_FILES['imagem'];
        $pasta = 'uploads/';
    if(!is_dir($pasta)) {
        mkdir($pasta, 0777, true);
    }
        
    if (str_starts_with($arquivo['type'], 'image/')) {
        $destino = $pasta . basename($arquivo['name']);
        move_uploaded_file($arquivo['tmp_name'], $destino);
        echo "Upload concluído!<br>";
        echo "<img src='$destino' width='200'>";
    } else {
        echo "Envie apenas imagens!";
    }
    }
}
?>