<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StaticScopo
 *
 * @author Edson Lima
 */
class StaticScopo {

    public $produto;
    public $valor;
    public static $vendas;
    public static $lucros;

    function __construct($produto, $valor) {
        $this->produto = $produto;
        $this->valor = $valor;
    }

    public function vener() {
        self::$vendas += 1;
        self::$lucros = $this->valor * self::$vendas;
        echo "O produto {$this->produto} foi vendido por {$this->valor}<br>";
    }

    public static function relatorio() {
        echo '<hr>';
        echo "Este produto vendeu " . self::$vendas . " quantidade(s) e seu lucro foi de " . self::$lucros . '<br>';
        echo '<hr>';
    }

}
