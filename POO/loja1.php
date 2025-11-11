<?php

// Classe pai
class Produto {
    protected $nome;
    protected $preco;
    protected $estoque;

    public function __construct($nome, $preco, $estoque) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    public function aplicarDesconto($percentual) {
        $this->preco -= $this->preco * ($percentual / 100);
    }

    public function vender($quantidade) {
        if ($quantidade <= $this->estoque) {
            $this->estoque -= $quantidade;
            echo "<p>Venda realizada de {$quantidade} unidade(s) de {$this->nome}.</p>";
        } else {
            echo "<p>Estoque insuficiente de {$this->nome}.</p>";
        }
    }

    public function exibirInformacoes() {
        echo "<p>Nome: {$this->nome}<br>Preço: R$ {$this->preco}<br>Estoque: {$this->estoque}</p>";
    }
}

// Classe filha: jogo físico
class JogoFisico extends Produto {
    private $plataforma;

    public function __construct($nome, $preco, $estoque, $plataforma) {
        parent::__construct($nome, $preco, $estoque);
        $this->plataforma = $plataforma;
    }

    public function exibirInformacoes() {
        echo "<div style='border:1px solid #ccc; padding:10px; margin:5px;'>
                <strong>🎮 Jogo Físico</strong><br>
                Nome: {$this->nome}<br>
                Preço: R$ {$this->preco}<br>
                Plataforma: {$this->plataforma}<br>
                Estoque: {$this->estoque}
              </div>";
    }
}

// Classe filha: jogo digital
class JogoDigital extends Produto {
    private $tamanhoGB;

    public function __construct($nome, $preco, $estoque, $tamanhoGB) {
        parent::__construct($nome, $preco, $estoque);
        $this->tamanhoGB = $tamanhoGB;
    }

    public function exibirInformacoes() {
        echo "<div style='border:1px solid #ccc; padding:10px; margin:5px;'>
                <strong>💾 Jogo Digital</strong><br>
                Nome: {$this->nome}<br>
                Preço: R$ {$this->preco}<br>
                Tamanho: {$this->tamanhoGB} GB<br>
                Estoque: {$this->estoque}
              </div>";
    }
}

// ----------- TESTE -------------

$jogo1 = new JogoFisico("God of War Ragnarok", 299.90, 5, "PS5");
$jogo2 = new JogoDigital("Hollow Knight", 59.90, 999, 3.2);

// Exibir informações
$jogo1->exibirInformacoes();
$jogo2->exibirInformacoes();

// Aplicar desconto
$jogo1->aplicarDesconto(10);
$jogo2->aplicarDesconto(20);

// Mostrar após desconto
echo "<h3>Após desconto:</h3>";
$jogo1->exibirInformacoes();
$jogo2->exibirInformacoes();

// Testar venda
$jogo1->vender(2);
$jogo1->exibirInformacoes();
?>
