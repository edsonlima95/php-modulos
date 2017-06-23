<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IteracaoClass1
 *
 * @author Edson Lima
 */
class IteracaoClass1 {

    public $nome;
    public $idade;
    private $profissao;
    public $salario;
    public $empresa;
    public $conta;

    /**
     * @param mixed $profissao
     */
    public function setProfissao($profissao)
    {
        $this->profissao = $profissao;
    }

    function __construct($nome, $idade, $profissao, $conta) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->profissao = $profissao;
        $this->conta = $conta;
    }

    public function trabalhar($empresa, $salario, $profissao) {
        $this->empresa = $empresa;
        $this->salario = $salario;
        $this->profissao = $profissao;
    }

    public function receber($valor) {
        $this->conta += $valor;
    }
}
