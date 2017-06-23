<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClasseAtributos_2
 *
 * @author Edson Lima
 */
class ClasseAtributos {

    public $nome;
    public $idade;
    public $telefone;

    function dados($Nome, $Idade, $Telefone) {
        $this->nome = $Nome;
        $this->idade = $Idade;
        $this->telefone = $Telefone;
    }

    function mostrarDados() {
        return "Ola meu nome e $this->nome minha idade e $this->idade meu telefone e $this->telefone";
    }

    function arr() {
        echo '<pre>';
        print_r($this);
        echo '<pre>';
    }

}
