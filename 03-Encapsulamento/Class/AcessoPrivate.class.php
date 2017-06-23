<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AcessoPrivate
 *
 * @author Edson Lima
 */
class AcessoPrivate {

    private $nome;
    private $email;
    private $cpf;

    function __construct($nome, $email, $cpf) {
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setCpf($cpf);
    }

    public function setNome($nome) {
        if ($nome && is_string($nome)):
            $this->nome = $nome;
        else:
            die('formato invalido apenas strings.');
        endif;
    }

    public function setEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)):
            die('formato incorreto!');
        else:
            $this->email = $email;
        endif;
    }

    public function setCpf($cpf) {
        if (preg_match('/[0-9]*/i', $cpf) && strlen($cpf) == 14):
            $this->cpf = $cpf;
        else:
            die('formato incorreto');
        endif;
    }

}
