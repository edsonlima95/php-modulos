<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AcessoProtected
 *
 * @author Edson Lima
 */
class AcessoProtected {

    public $nome;
    protected $email;

    function __construct($nome, $email) {
        $this->nome = $nome;
        $this->setEmail($email);
    }

    public function setEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)):
            $this->email = $email;
        else:
            die('formato incorreto!');
        endif;
    }

    final protected function setNome($nome) {
        $this->nome = $nome;
    }

}

//classe para demostrar o acesso protected.
class Acesso extends AcessoProtected {

    protected $cpf;

    public function addCpf($nome, $cpf) {
        parent::setNome($nome);
        $this->cpf = $cpf;
    }
    
    
}
