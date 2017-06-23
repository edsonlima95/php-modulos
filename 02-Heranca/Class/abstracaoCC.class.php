<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of abstracaoCC
 *
 * @author Edson Lima
 */
class abstracaoCC extends abstracao {

    public $limite;

    public function __construct($cliente, $saldo, $limite) {
        parent::__construct($cliente, $saldo);
        $this->cliente = $cliente;
        $this->saldo = $saldo;
        $this->limite = $limite;
        $this->conta = 'Conta corrente';
    }

    final public function sacar($valor) {
        if ($this->saldo + $this->limite >= $valor):
            parent::sacar($valor);
        else:
            echo "<span style='color: red'>{$this->conta} :Erro ao sacar {$this->converter($valor)} limite indisponivel.</span><hr>";
        endif;
    }

    final public function transferir($valor, $destino) {
        if ($this->saldo + $this->limite >= $valor):
            parent::transferir($valor, $destino);
        else:
            echo "<span style='color: red'>{$this->conta} :Erro ao transferir {$this->converter($valor)} limite indisponivel.</span><hr>";
        endif;
    }

    public function verSaldo() {
        parent::extrato();
    }

}
