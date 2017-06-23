<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelagemClasse
 *
 * @author Edson Lima
 */
class ModelagemClasse {

    public $nome;
    public $idade;
    public $profissao;
    public $minhaConta;

    function __construct($nome, $idade, $profissao, $minhaConta) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->profissao = $profissao;
        $this->minhaConta = $minhaConta;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }

    function setProfissao($profissao) {
        $this->profissao = $profissao;
    }

    function setMinhaConta($minhaConta) {
        $this->minhaConta = $minhaConta;
    }

    function trabalhoExtra($trabalho, $valor) {
        echo "O {$this->profissao} {$this->nome} fez um {$trabalho} e recebeu {$this->convert($valor)}" . '<hr>';
        $this->minhaConta += $valor;
    }

    function salario() {
        echo "Seu salario atual e de <b>{$this->minhaConta}</b>";
    }

    function convert($valor) {
        return number_format($valor, '2', '.', ',');
    }

}
