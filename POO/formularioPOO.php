<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario com POO</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 200px;
            gap: 20px;
        }
    </style>
</head>
<body>
    <h2>Cadastro de Aluno</h2>
    <form action="" method="POST">
        <input type="text" placeholder="Nome do Aluno" name="nome">
        <input type="text" placeholder="Instituição de Ensino" name="instituicao">
        <input type="text" placeholder="Curso" name="curso">
        
        <label for="tipo">Tipo de Aluno</label>
        <select name="tipoAluno" id="tipo">
            <option value="comum">Comum</option>
            <option value="bolsista">Bolsista</option>
        </select>
        <input type="number" placeholder="Percentual da bolsa (%)" name="percentualBolsa">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    class Aluno {

        public $nome;
        public $instituicao;
        public $curso;

        public function __construct($nome, $instituicao, $curso) {
            $this->nome = $nome;
            $this->instituicao = $instituicao;
            $this->curso = $curso;
        }
        
        public function exibirDados() {
            echo "<h1>Dados do Aluno</h1>";
            echo "<p><strong>Nome do Aluno:</strong> {$this->nome}</p>";
            echo "<p><strong>Curso:</strong> {$this->curso}</p>";
            echo "<p><strong>Instituição de Ensino:</strong> {$this->instituicao}</p>";
        }
    }

    class AlunoBolsista extends Aluno {
        
        public $percentualBolsa;

        public function __construct($nome, $instituicao, $curso, $percentualBolsa) {
            parent::__construct($nome, $instituicao, $curso);
            $this->percentualBolsa = $percentualBolsa;
        }

        public function exibirBolsa() {
            echo "<h1>Dados do Aluno</h1>";
            echo "<p><strong>Nome do Aluno:</strong> {$this->nome}</p>";
            echo "<p><strong>Curso:</strong> {$this->curso}</p>";
            echo "<p><strong>Instituição de Ensino:</strong> {$this->instituicao}</p>";
            echo "<p><strong>Percentual de Bolsa:</strong> {$this->percentualBolsa}%</p>";
        }
    }

    if (isset($_POST['tipoAluno'])) {
        $tipoSelecionado = $_POST['tipoAluno'];

        if ($tipoSelecionado === "bolsista") {
            $aluno = new AlunoBolsista(trim($_POST['nome']), trim($_POST['instituicao']), trim($_POST['curso']), number_format($_POST['percentualBolsa']));
            $aluno->exibirBolsa();

        } else {
            $aluno = new Aluno(trim($_POST['nome']), trim($_POST['instituicao']), trim($_POST['curso']));
            $aluno->exibirDados();

            if (isset($_POST['percentualBolsa'])) {
                echo "<p>Obs: Aluno comum não tem direito a bolsa</p>";
            }

        }
    }   
}
?>