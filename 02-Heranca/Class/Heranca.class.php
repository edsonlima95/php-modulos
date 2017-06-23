<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Heranca
 *
 * @author Edson Lima
 */
class Heranca {
    public $nome;
    public $idade;
    public $formacao;
    
    function __construct($nome, $idade) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->formacao = array();
    }
    
    public function envelhecer() {
        $this->idade += 1;
    }
    
    public function formar($curso) {
        $this->formacao[] = $curso;
    }
    
    public function mostra() {
        $formacao = implode(', ', $this->formacao);
        echo "Meu nome e {$this->nome} minha idade e {$this->idade} e minhas formçoes são {$formacao}".'<hr>';
    }
}
