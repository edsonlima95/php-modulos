<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComposicaoCliente
 *
 * @author Edson Lima
 */
class ComposicaoCliente {

    private $cidade;
    private $estado;

    function __construct($cidade, $estado) {
        $this->cidade = $cidade;
        $this->estado = $estado;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

}
