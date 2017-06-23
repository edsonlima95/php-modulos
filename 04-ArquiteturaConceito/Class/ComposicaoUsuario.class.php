<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComposicaoUsuario
 *
 * @author Edson Lima
 */
class ComposicaoUsuario {

    public $nome;
    public $email;
    private $endereco;

    function __construct($nome, $email) {
        $this->nome = $nome;
        $this->email = $email;
    }

    /*     * Aqui estou criando um objeto dentro da classe, isso fara com que possa ter acesso total aos atributos
     * da mesma, isso e a composicao */

    public function cadastrarEndereco($cidade, $estado) {
        $this->endereco = new ComposicaoCliente($cidade, $estado);
    }

    //atraves deste metodo pode acessa os atributos da classe cliente por que o objeto foi criado aqui.
    public function getEnderco() {
        return $this->endereco;
    }

}
