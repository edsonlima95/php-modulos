<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReplicaClonagem_4
 *
 * @author Edson Lima
 */
class ReplicaClonagem {
    public $tabela;
    public $termos;
    public $query;
    public $addQuery;
    
    function __construct($tabela, $termos, $addQuery) {
        $this->tabela = $tabela;
        $this->termos = $termos;
        $this->addQuery = $addQuery;
    }
    
    function setTermos($termo){
        $this->termos = $termo;
    }
    
    function setTabela($tabela) {
        $this->tabela = $tabela;
    }

    function querry() {
        echo "SELECT * FROM $this->tabela WHERE $this->termos $this->addQuery";
        echo '<hr>';
    }
}
