<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StaticDigital
 *
 * @author Edson Lima
 */
class StaticDigital extends StaticScopo {

    public static $digital;

    public function __construct($produto, $valor) {
        parent::__construct($produto, $valor);
    }

    public function vener() {
        self::$digital += 1;
        parent::vener();
    }

}
