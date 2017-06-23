<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produto
 *
 * @author Edson Lima
 */
class Produto {

    private $nome;
    private $valor;
 
    function __construct($nome, $valor) {
        $this->nome = $nome;
        $this->valor = $valor;
    }

    function getNome() {
        return $this->nome;
    }

    function getValor() {
        return $this->valor;
    }

}
