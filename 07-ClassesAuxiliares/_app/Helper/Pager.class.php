<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pager
 *
 * @author Edson Lima
 */
class Pager {

    //DEFINE O PAGER.
    private $pager;
    private $limite;
    private $offset;
    //REALIZA A LEITURA.
    private $tabela;
    private $termos;
    private $places;
    //DEFINE O PAGINATOR.
    private $rows;
    private $link;
    private $maxLink;
    private $first;
    private $last;
    //RENDERIZA O PAGINATOR.
    private $paginator;

    //CONSTRUTOR
    function __construct($link, $first = null, $last = null, $maxLink = null) {
        $this->link = (string) $link;
        $this->first = ((string) $first ? $first : 'Primeira pagina');
        $this->last = ((string) $last ? $last : 'Ultima pagina');
        $this->maxLink = ((int) $maxLink ? $maxLink : 5);
    }

    //FUNÇÃO PARA PEGAR A PAGINA.
    public function ExePager($pager, $limite) {
        $this->pager = ((int) $pager ? $pager : 1);
        $this->limite = (int) $limite;
        $this->offset = ($this->pager * $this->limite) - $this->limite;
    }

    //FUNÇÃO RETORNA A PAGINA.
    public function retornaPage() {
        if ($this->pager > 1):
            $numPage = ($this->pager - 1);
            header("Location: {$this->link}{$numPage}");
        endif;
    }

    //GETTERS.
    function getPager() {
        return $this->pager;
    }

    function getLimite() {
        return $this->limite;
    }

    function getOffset() {
        return $this->offset;
    }

    //FUNÇÃO PAGINATOR
    public function ExePaginator($tabela, $termos = null, $parseString = null) {
        $this->tabela = $tabela;
        $this->termos = $termos;
        $this->places = $parseString;
        $this->getSintax();
    }

    //FUNÇÃO PARA RETORNAR O PAGINATOR.
    public function getPaginator() {
        return $this->paginator;
    }

    //EXECUTA A SINTAX DA PAGINAÇÃO.
    private function getSintax() {
        $read = new Read();
        $read->ExeRead($this->tabela, $this->termos, $this->places);
        $this->rows = $read->getRowCount();
        if ($this->rows > $this->limite):
            $paginas = $this->rows / $this->limite; //OBTEM O NUMERO DE PAGINAS.
            $maxlinks = $this->maxLink;
            //HTML.
            $this->paginator = "<ul class=\"paginator\">";
            $this->paginator .= "<li><a title=\"{$this->first}\" href=\"{$this->link}1\">{$this->first}</a></li>"; //PRIMEIRA PAG
            //DECREMENTO
            for ($ipag = $this->pager - $maxlinks; $ipag <= $this->pager - 1; $ipag ++):
                if ($ipag >= 1):
                    $this->paginator .= "<li><a title=\"Pagina {$ipag}\" href=\"{$this->link}{$ipag}\">{$ipag}</a></li>";
                endif;
            endfor;
            $this->paginator .= "<li><span class=\"active\">{$this->pager}</span></li>"; //PAGINA ATUAL. 
            //INCREMENTO.
            for ($dpag = $this->pager + 1; $dpag <= $this->pager + $maxlinks; $dpag ++):
                if ($dpag <= $paginas):
                    $this->paginator .= "<li><a title=\"Pagina {$dpag}\" href=\"{$this->link}{$dpag}\">{$dpag}</a></li>";
                endif;
            endfor;
            $this->paginator .= "<li><a title=\"{$this->last}\" href=\"{$this->link}{$paginas}\">{$this->last}</a></li>"; //ULTIMA PAG.
            $this->paginator .= "</ul>";
        endif;
    }

}
