<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AgregacaoCarrinho
 *
 * @author Edson Lima
 */
class AgregacaoCarrinho {

    private $cliente;
    private $total;
    private $produtos;

    /** Ao passar o nome da class antes de uma atritubuto, isso quer dizer que eu so vou aceitar objetos desta classe
      ou seja se eu criar um objeto de outra calsse ele nao aceita, este e o conceito de agregacao */
    function __construct(AssociacaoCliente $cliente) {
        $this->cliente = $cliente;
        $this->produtos = array();
    }

    /* Apartir de agora so aceitara objetos da classe produto. */

    public function Add(AgregacaoProduto $produto) {
        //$produto->getProduto() pega o indice do produto e joga no indice do array.
        $this->produtos[$produto->getProduto()] = $produto;
        $this->total += $produto->getValor();
        $this->verCarrinho($produto, 'Adicionou');
    }

    /* Apartir de agora so aceitara objetos da classe produto. */

    public function remover(AgregacaoProduto $produto) {
        unset($this->produtos[$produto->getProduto()]);
        $this->total -= $produto->getValor();
        $this->verCarrinho($produto, 'Removeu');
    }

    /* Apartir de agora so aceitara objetos da classe produto. */

    public function verCarrinho(AgregacaoProduto $produto, $acao) {
        echo "Voce {$acao} um {$produto->getNome()} aos seus produtos no valor de {$produto->getValor()}
        e o total de seu carrinho e: {$this->total}<hr>";
    }

}
