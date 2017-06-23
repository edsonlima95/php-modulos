<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author Edson Lima
 */
class Cliente {

    private $nome;
    private $idade;
    private $produto;
    private $valorCompra;


    function __construct($nome, $idade) {
        $this->nome = $nome;
        $this->idade = $idade;
    }

    function getProduto() {
        return $this->produto;
    }

    public function produtoCliente($produto) {
        $this->produto = $produto;
    }
 
    public function valorCompra($valor) {
        $this->valorCompra += $valor;
    }

    function getNome() {
        return $this->nome;
    }
    
    function getValorCompra() {
        return $this->valorCompra;
    }
    
    


}
