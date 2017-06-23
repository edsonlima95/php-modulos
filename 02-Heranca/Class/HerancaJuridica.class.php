<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HerancaJuridica
 *
 * @author Edson Lima
 */
class HerancaJuridica extends Heranca {

    public $empresa;
    public $funcionario;

    public function __construct($nome, $idade, $empresa) {
        parent::__construct($nome, $idade);
        $this->empresa = $empresa;
    }
    
    public function contratar($func) {
        echo "A empresa {$this->empresa} de {$this->nome} acabou de contratar {$func}.<hr>";
        $this->funcionario += 1;
    }
    
    public function ver(){
        echo "A empresa {$this->empresa} foi fundada por {$this->nome}<small style='color:#09f'><br>";
        parent::mostra();
        echo "</small>";
    }

}
