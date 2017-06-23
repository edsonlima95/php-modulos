<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PolimorfismoCartao
 *
 * @author Edson Lima
 */
class PolimorfismoCartao extends PolimorfismoBoleto{
   
    public $juros;
    public $encargos;
    public $parcela;
    public $numParcela;

    public function __construct($produto, $valor) {
        parent::__construct($produto, $valor);
        $this->juros = 1.75;
        $this->metodo = 'Cartao de creditos';      
    }
    //override, o mesmo metodo porem com valores alterados.
    public function pagar($parcelas = null) {
        $this->setNumParcela($parcelas);
        $this->setEncargos();
        //Adiciona o valor do juro obtidos pelo encargo.
        $this->valor = $this->valor + $this->encargos;
        $this->parcela = $this->valor / $this->numParcela;
        echo "Voce pagou {$this->convert($this->valor)} pelo o produto {$this->produto}.<br>";
        echo "<small>Pagamento efetuado via <b>{$this->metodo}</b> em {$this->numParcela}x iguais de {$this->convert($this->parcela)} </small>";
    }
    
    function setJuros($juros) {
        $this->juros = $juros;
    }
    
    //Calcula o valor do juros em cima do valor do produto.
    function setEncargos() {
        $this->encargos = ($this->valor * ($this->juros / 100)) * $this->numParcela;
    }
    
    //Seta o numero de parcelas em 1 se nao existir
    function setNumParcela($numParcela) {
        $this->numParcela = ((int) $numParcela >= 1 ? $numParcela : 1);
    }

}
