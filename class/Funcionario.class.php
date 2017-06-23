<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Funcionario
 *
 * @author Edson Lima
 */
class Funcionario {

    private $nome;
    private $idade;
    private $empresa;
   

    function __construct($nome, $idade) {
        $this->nome = $nome;
        $this->idade = $idade;
    }
    
    function getIdade() {
        return $this->idade;
    }

    
    function getNome() {
        return $this->nome;
    }

    function getEmpresa() {
        return $this->empresa;
    }
    
    function getProdutoVenda() {
        return $this->produtoVenda;
    }
    
    public function trabalhaEmpresa($empresa) {
        $this->empresa = $empresa;
    }
   



}
