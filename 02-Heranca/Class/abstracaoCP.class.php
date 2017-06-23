<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of abastracaoCP
 *
 * @author Edson Lima
 */
class abstracaoCP extends abstracaoCC {

    public $rendimento;

    public function __construct($cliente, $saldo) {
        parent::__construct($cliente, $saldo, 0);
        $this->rendimento = 1.7;
        $this->conta = 'Conta poupança';
    }

    final public function depositar($valor) {
        $juro = $valor * ($this->rendimento / 100);
        $deposito = $valor + $juro;
        parent::depositar($deposito);
        echo "<small style='color:#09f'>O valor do deposito e {$valor} e o rendimento e de {$this->converter($juro)}</small><hr>";
    }

}
