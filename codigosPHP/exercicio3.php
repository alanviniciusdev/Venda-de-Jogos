<form method="post">
    <label for="name">Digite seu nome:</label>
    <input type="text" name="nome">
    <label for="posicao">Digite a posição dentro do Array:</label>
    <input type="number" name="posicao">
    <button type="submit">Enviar</button>
</form>

<?php
    echo "<h3>Array inicial <br></h2>";
    $nomes = ["Ana", "Matheus", "Thiago", "Pedro", "Maria"];
    echo "<pre>";
    print_r($nomes);
    echo "</pre>";

    /* Colocar o nome digitado no começo da lista */
    /* if(isset($_POST['nome'])) {
        array_unshift($nomes, "Alan");
        echo "<h3>Array final</h3>";
        echo "<pre>";
        print_r($nomes);
        echo "</pre>";
    } */

    /* Colocar o nome na posição digitado dentro do array */
    if(isset($_POST['posicao'])) {
        $posicao = $_POST['posicao'];
        $novoNome = $_POST['nome'];
        if($posicao >= 0) {
            array_splice($nomes, $posicao, 0, $novoNome);
            echo "<pre>";
            print_r($nomes);
            echo "</pre>";
        }        
    }
?>