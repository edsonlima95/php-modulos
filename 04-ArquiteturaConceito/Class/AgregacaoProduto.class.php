<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AgregacaoProduto
 *
 * @author Edson Lima
 */
class AgregacaoProduto {

    private $produto;
    private $nome;
    private $valor;

    function __construct($produto, $nome, $valor) {
        $this->produto = $produto;
        $this->nome = $nome;
        $this->valor = $valor;
    }

    function getProduto() {
        return $this->produto;
    }

    function getNome() {
        return $this->nome;
    }

    function getValor() {
        return $this->valor;
    }

}
