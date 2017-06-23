<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carrinho
 *
 * @author Edson Lima
 */
class Carrinho {

    private $cliente;
    private $produto;
    private $total;
    private $zelador;

    function __construct($cliente) {
        $this->cliente = $cliente;
        $this->produto = array();
    }

    public function Add($produto) {
        $this->produto[$produto->getNome()] = $produto;
        $this->total += $produto->getValor();
    }

    public function zelador($nome) {
        $this->zelador = $nome;
    }

}
