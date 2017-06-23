<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AssociacoLogin
 *
 * @author Edson Lima
 */
class AssociacoLogin {

    /** @var AssociacaoCliente */
    private $cliente;
    private $login;

    function __construct($cliente) {
        if (is_object($cliente)):
            $this->cliente = $cliente;
            $this->login = true;
        else:
            die('Erro no login');
        endif;
    }

    function getCliente() {
        return $this->cliente;
    }

    function getLogin() {
        return $this->login;
    }

}
