<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ObjetoDinamico
 *
 * @author Edson Lima
 */
class ObjetoDinamico {

    public $nome;
    private $email;

    public function setCliente($cliente) {
        if (is_object($cliente)):
            $this->nome = $cliente->nome;
            $this->email = $cliente->email;
        else:
            die('erro, informe um nome');
        endif;
    }

}
