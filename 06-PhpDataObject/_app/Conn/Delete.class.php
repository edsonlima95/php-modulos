<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Update
 *
 * @author Edson Lima
 */
class Delete extends Conn {

    private $tabela;
    private $condicao;
    private $places;
    private $result;

    /** @var PDOstatements* */
    private $delete;

    /** @var PDO */
    private $Conn;

    public function ExeDelete($tabela, $condicao, $parseString) {
        $this->tabela = $tabela;
        $this->condicao = $condicao;

        parse_str($parseString, $this->places);
        $this->getSintax();
        $this->Execute();
    }

    public function getResult() {
        return $this->result;
    }

    public function setPlcaes($parseString) {
        parse_str($parseString, $this->places);
        $this->getSintax();
        $this->Execute();
    }

    private function conexao() {
        $this->Conn = parent::getConn();
        $this->delete = $this->Conn->prepare($this->delete);
    }

    private function getSintax() {
        $this->delete = "DELETE FROM {$this->tabela} {$this->condicao}";
    }

    private function Execute() {
        $this->conexao();
        try {
            $this->delete->execute($this->places);
            $this->Result = true;
        } catch (PDOException $e) {
            $this->Result = null;
            WSErro("<b>Erro ao Ler:</b> {$e->getMessage()}", $e->getCode());
        }
    }

}
