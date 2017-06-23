<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PolimorfismoDeposito
 *
 * @author Edson Lima
 */
class PolimorfismoDeposito extends PolimorfismoBoleto{
    
    public $desconto;
          
    public function __construct($produto, $valor) {
        parent::__construct($produto, $valor);
        $this->desconto = 15;
        $this->metodo = 'Deposito';
    }
    
    function setDesconto($desconto) {
        $this->desconto = $desconto;
    }
    
    //polimorfismo no metodo
    public function pagar() {
        $this->valor = ($this->valor - $this->desconto);
        parent::pagar();
    }
}
