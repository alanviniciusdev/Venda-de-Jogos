<?php
// Classe pai
class Produto {
    protected static $contadorID = 1; // ID automático
    protected $id;
    protected $nome;
    protected $preco;
    protected $estoque;
    protected $historicoVendas = [];

    public function __construct($nome, $preco, $estoque) {
        $this->id = self::$contadorID++;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    public function getId() {
        return $this->id;
    }

    public function aplicarDesconto($percentual) {
        $this->preco -= $this->preco * ($percentual / 100);
    }

    public function vender($quantidade) {
        if ($quantidade <= $this->estoque) {
            $this->estoque -= $quantidade;
            $data = date('d/m/Y H:i:s');
            $this->historicoVendas[] = [
                'data' => $data,
                'quantidade' => $quantidade,
                'valor' => $this->preco * $quantidade
            ];
            echo "<p>Venda realizada de {$quantidade} unidade(s) de {$this->nome} em {$data}.</p>";
        } else {
            echo "<p style='color:red;'>Estoque insuficiente de {$this->nome}.</p>";
        }
    }

    public function reporEstoque($quantidade) {
        $this->estoque += $quantidade;
        echo "<p>Foram adicionadas {$quantidade} unidades ao estoque de {$this->nome}.</p>";
    }

    public function getValorTotalEstoque() {
        return $this->estoque * $this->preco;
    }

    public function exibirHistoricoVendas() {
        echo "<h4>📜 Histórico de Vendas de {$this->nome}:</h4>";
        if (empty($this->historicoVendas)) {
            echo "<p>Nenhuma venda registrada.</p>";
        } else {
            foreach ($this->historicoVendas as $venda) {
                echo "<p>- {$venda['data']} | {$venda['quantidade']} unid | R$ " . number_format($venda['valor'], 2, ',', '.') . "</p>";
            }
        }
    }

    public function exibirInformacoes() {
        echo "<p>Nome: {$this->nome}<br>Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>Estoque: {$this->estoque}</p>";
    }
}

// Classe filha: Jogo Físico
class JogoFisico extends Produto {
    private $plataforma;

    public function __construct($nome, $preco, $estoque, $plataforma) {
        parent::__construct($nome, $preco, $estoque);
        $this->plataforma = $plataforma;
    }

    public function exibirInformacoes() {
        echo "<div style='border:1px solid #ccc; padding:10px; margin:5px;'>
                <strong>🎮 Jogo Físico #{$this->id}</strong><br>
                Nome: {$this->nome}<br>
                Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>
                Plataforma: {$this->plataforma}<br>
                Estoque: {$this->estoque}<br>
                Valor total em estoque: R$ " . number_format($this->getValorTotalEstoque(), 2, ',', '.') . "
              </div>";
    }
}

// Classe filha: Jogo Digital
class JogoDigital extends Produto {
    private $tamanhoGB;

    public function __construct($nome, $preco, $estoque, $tamanhoGB) {
        parent::__construct($nome, $preco, $estoque);
        $this->tamanhoGB = $tamanhoGB;
    }

    public function exibirInformacoes() {
        echo "<div style='border:1px solid #ccc; padding:10px; margin:5px;'>
                <strong>💾 Jogo Digital #{$this->id}</strong><br>
                Nome: {$this->nome}<br>
                Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>
                Tamanho: {$this->tamanhoGB} GB<br>
                Estoque: {$this->estoque}<br>
                Valor total em estoque: R$ " . number_format($this->getValorTotalEstoque(), 2, ',', '.') . "
              </div>";
    }
}

// Classe Loja para gerenciar produtos
class Loja {
    private $produtos = [];

    public function adicionarProduto(Produto $produto) {
        $this->produtos[] = $produto;
    }

    public function listarProdutos() {
        echo "<h3>🛒 Lista de Produtos:</h3>";
        foreach ($this->produtos as $produto) {
            $produto->exibirInformacoes();
        }
    }

    public function buscarPorId($id) {
        foreach ($this->produtos as $produto) {
            if ($produto->getId() == $id) {
                return $produto;
            }
        }
        echo "<p style='color:red;'>Produto não encontrado.</p>";
        return null;
    }
}

// ----------- TESTE -------------
$jogo1 = new JogoFisico("God of War Ragnarok", 299.90, 5, "PS5");
$jogo2 = new JogoDigital("Hollow Knight", 59.90, 999, 3.2);

$loja = new Loja();
$loja->adicionarProduto($jogo1);
$loja->adicionarProduto($jogo2);

$loja->listarProdutos();

$jogo1->vender(20);
$jogo1->vender(1);
$jogo1->reporEstoque(3);

$jogo1->exibirHistoricoVendas();
?>