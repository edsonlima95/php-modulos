<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AcessoPublico
 *
 * @author Edson Lima
 */
class AcessoPublico {

    public $nome;
    public $email;

    function __construct($nome, $email) {
        $this->nome = $nome;
        $this->validarEmail($email);
    }

    public function validarEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)):
            die('formato incorreto');
        else:
            $this->email = $email;
        endif;
    }

}
