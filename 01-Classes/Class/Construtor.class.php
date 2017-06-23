<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Construtor_3
 *
 * @author Edson Lima
 */
class Construtor {

    public $nome;
    public $idade;
    public $endereco;
    public $telefone;
    
    function __construct($nome, $idade, $endereco, $telefone) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        echo "O obejto $this->nome foi iniciado".'<hr>';
    }
    
    function dados(){
        return "<p>O aluno $this->nome tem $this->idade mora na rua $this->endereco e seu telefone e $this->telefone</p>";
    }
    
    function __destruct(){
        echo "O obejto $this->nome foi destruido".'<hr>';
    }
            
    function ver() {
    echo '<pre>';
    print_r($this);
    echo '</pre>';
    }

}
