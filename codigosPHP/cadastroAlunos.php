<?php
/* Cadastro inicial */
$alunos = [
    "Ana" => 20,
    "João" => 25,
    "Pedro" => 30
];

/* 1. Adicionando novos alunos */
$alunos["Maria"] = 22;
$alunos["Lucas"] = 19;

/* 2. Alterando idade de um aluno */
$alunos["Ana"] = 21; /* Ana fez aniversário */

/* 3. removendo um aluno */
unset($alunos["Pedro"]); /* Pedro saiu da turma */

/* 4. Listando os alunos */
echo "<h2>Lista de alunos:</h2>";
foreach ($alunos as $nome => $idade) {
    echo "$nome tem $idade anos<br>";
}

/* 5. Verificando se um aluno existe */
echo "<h2>Consulta de aluno:</h2>";
$consulta = "Lucas";
if (array_key_exists($consulta, $alunos)) {
    echo "$consulta está cadastrado e tem {$alunos[$consulta]} anos.";
} else {
    echo "$consulta não está cadastrado.";
}

?>