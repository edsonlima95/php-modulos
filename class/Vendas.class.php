<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vendas
 *
 * @author Edson Lima
 */
class Vendas {

    /** @var Cliente */
    private $cliente;
    private $empresa;
    private $total;

    /** @var Funcionario */
    private $vendedor;

    /** @var Produto */
    private $produtos;

    function __construct($empresa) {
        $this->empresa = $empresa;
        $this->produtos = array();
        $this->cliente = array();
        $this->vendedor = array();
    }

    public function vender($produto, $vendedor, $cliente) {
        //para remover um elemento do array, tem que passa o parametro dentro do objeto[].
        $this->cliente[$cliente->getNome()] = $cliente;
        $cliente->produtoCliente($produto->getNome());
        $cliente->valorCompra($produto->getValor());

        $this->vendedor[$vendedor->getNome()] = $vendedor;
        $vendedor->trabalhaEmpresa($this->empresa);

        $this->produtos[$produto->getNome()] = $produto;
        $this->total += $produto->getValor();

        echo "O funcionario {$vendedor->getNome()} trabalha na empresa {$this->empresa} e vendeu um(a) {$produto->getNome()}";
        echo " no valor de {$produto->getValor()}<hr>";
    }

    public function remover($produto, $vendedor, $cliente) {
        unset($this->produtos[$produto->getNome()]);
        unset($this->vendedor[$vendedor->getNome()]);
        unset($this->cliente[$cliente->getNome()]);
        $this->total -= $produto->getValor();
    }

    public function caixaMercantil() {
        echo "O caixa do mercantil atualizado e de: {$this->total}<hr>";
    }

}
