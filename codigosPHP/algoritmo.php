<form method="post">
    Digite um número: <input type="number" name="numero">
    <input type="submit" value="Verificar">
</form>

<?php
if(isset($_POST['numero'])) {
    $numero = $_POST['numero'];
    if ($numero % 2 == 0) {
        echo "$numero é par.";
    } else {
        echo "$numero é impar.";
    }
}
?>