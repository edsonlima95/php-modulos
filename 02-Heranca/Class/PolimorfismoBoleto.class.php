<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Polimorfismo
 *
 * @author Edson Lima
 */
class PolimorfismoBoleto {

    public $produto;
    public $valor;
    public $metodo;
    
    function __construct($produto, $valor) {
        $this->produto = $produto;
        $this->valor = $valor;
        $this->metodo = 'Boleto';
    }
    
    public function pagar() {
        echo "Voce pagou {$this->convert($this->valor)} pelo o produto {$this->produto}.<br>";
        echo "<small>Pagamento efetuado via <b>{$this->metodo}</b></small>";
    }

    public function convert($valor) {
        return "R$ ".number_format($valor,'2','.',',');
    }
}

