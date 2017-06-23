<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IteracaoClass2
 *
 * @author Edson Lima
 */
class IteracaoClass2 {

    public $empresa;
    public $setor;
    /** @var IteracaoClass1 */
    public $funcionario;

    function __construct($empresa) {
        $this->empresa = $empresa;
        $this->setor = 0;
    }

    public function contratar($funcionario, $cargo, $salario) {
        $this->funcionario = (Object) $funcionario;
        //metodo trabalha da outra class
        $this->funcionario->trabalhar($this->empresa, $salario, $cargo);
        $this->setor += 1;
    }

    public function promover($cargo, $salario = NULL) {
        $this->funcionario->setProfissao($cargo);
        if ($salario):
            $this->funcionario->salario = $salario;
        endif;
    }

    public function pagar() {
        //metodo receber da outra classe, o salario e o setado no contrato.
        $this->funcionario->receber($this->funcionario->salario);
    }

    public function demitir($rescisao) {
        $this->funcionario->receber($rescisao);
        $this->funcionario->empresa = null;
        $this->funcionario->salario = null;
        $this->setor -= 1;
    }

}
