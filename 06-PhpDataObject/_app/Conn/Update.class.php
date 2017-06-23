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
class Update extends Conn {

    private $tabela;
    private $dados;
    private $condicao;
    private $places;
    private $result;

    /** @var PDOstatements* */
    private $update;

    /** @var PDO */
    private $Conn;

    public function ExeUpdate($tabela, array $dados, $condicao, $parseString) {
        $this->tabela = $tabela;
        $this->dados = $dados;
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
        $this->update = $this->Conn->prepare($this->update);
    }

    private function getSintax() {
        foreach ($this->dados as $key => $valores):
            $places[] = $key . ' = :' . $key;
        endforeach;
        $places = implode(', ', $places);
        $this->update = "UPDATE {$this->tabela} SET {$places} {$this->condicao}";
    }

    private function Execute() {
        $this->conexao();
        try {
            $this->update->execute(array_merge($this->dados, $this->places)); //mescla os arrays dados e places
            $this->result = TRUE;
        } catch (PDOException $e) {
            $this->Result = null;
            WSErro("<b>Erro ao Ler:</b> {$e->getMessage()}", $e->getCode());
        }
    }

}
