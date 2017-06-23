<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Abstracao
 *
 * @author Edson Lima
 */
abstract class Abstracao {

    public $cliente;
    public $conta;
    public $saldo;

    function __construct($cliente, $saldo) {
        $this->cliente = $cliente;
        $this->saldo = $saldo;
    }

    public function depositar($valor) {
        $this->saldo += $valor;
        echo "<span style='color: green'>{$this->conta} :Deposito de {$this->converter($valor)} efetuado com sucesso</span><hr>";
    }

    public function sacar($valor) {
        $this->saldo -= $valor;
        echo "<span style='color: red'>{$this->conta} :Saque de {$this->converter($valor)} efetuado com sucesso</span><hr>";
    }

    /** @param Abstracao $destino */
    public function transferir($valor, $destino) {
        if ($this === $destino):
            echo 'Voce nao pode transferir para a mesma conta<br>';
        else:
            echo '<hr>';
            $this->sacar($valor);
            $destino->depositar($valor);
            echo "<span style='color: blue'>{$this->conta} transferencia de {$this->converter($valor)} efetuado com sucesso de {$this->cliente} para {$destino->cliente}</span><br>";
            echo '<hr>';
        endif;
    }

    public function extrato() {
        echo "Ola {$this->cliente} sua conta e {$this->conta} e seu saldo e de {$this->converter($this->saldo)}<hr>";
    }

    public function converter($valor) {
        return"R$" . number_format($valor, '2', '.', ',');
    }

    //metodo abstract, deverar ser implementado pelas classes filhas
    abstract public function verSaldo();
}
