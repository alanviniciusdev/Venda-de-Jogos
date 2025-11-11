<?php

/* Classe pessoa */
class Pessoa {

    /* Atributos (caracteristicas do objeto) */
    public $nome;
    public $idade;
    public $instituicao;

    /* Construtor (executado automaticamente quando o objeto é criado) */
    public function __construct($nome, $idade, $instituicao) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->instituicao = $instituicao;
    }

    /* Método (ação do objeto) */
    public function apresentar() {
        echo "Ola, meu nome é {$this->nome} e tenho {$this->idade} anos.\n\n";
    }

    public function apresentar2() {
        echo "O aluno {$this->nome} estuda no {$this->instituicao}\n\n";
    }
}

/* Programa Principal */

/* Cria um novo objeto da classe Pessoa */
$p1 = new Pessoa ("Alan", 18, "Senac Portão");

/* Exibe o ação do objeto */
$p1->apresentar();

/* Pode colocar mais objetos se quiser */
$p2 = new Pessoa ("Marcos", 17, "Senac Centro");
$p2->apresentar();


$p1->apresentar2();
$p2->apresentar2();
?>