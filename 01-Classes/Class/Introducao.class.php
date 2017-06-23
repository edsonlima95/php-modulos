<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of 1-Introducao
 *
 * @author Edson Lima
 */
class Introducao {
    
    public $Class;
    public $funcao;
    
    function mostrar($Class, $funcao){
        echo "A classe $Class vai fazer a funão $funcao";
    }
    
    function arr(){
        echo '<pre>';
        print_r($this);
        echo '<pre>';
    }

    
    
}
