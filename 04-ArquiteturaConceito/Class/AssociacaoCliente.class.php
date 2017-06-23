<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AssociacaoCliente
 *
 * @author Edson Lima
 */
class AssociacaoCliente {

    private $cliente;
    private $nome;
    private $email;

    function __construct($nome, $email) {
        $this->cliente = md5($nome);
        $this->nome = $nome;
        $this->email = $email;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

}
