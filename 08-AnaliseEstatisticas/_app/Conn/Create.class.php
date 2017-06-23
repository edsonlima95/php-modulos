<?php

/**
 * Description of Create
 *
 * @author Edson Lima
 */
class Create extends Conn {

    private $tabela;
    private $dados;
    private $resultados;

    /** @var PDOstatements */
    private $create;

    /** @var PDO instancia */
    private $conn;

    public function ExeCreate($tabela, array $dados) {
        $this->tabela = (String) $tabela;
        $this->dados = $dados;
        $this->getSintax();
        $this->Execute();
    }

    public function getResutado() {
        return $this->resultados;
    }

    private function connexao() {
        $this->conn = parent::getConn(); //metodo da class Conn.
        $this->create = $this->conn->prepare($this->create); //query de execução.
    }

    private function getSintax() {
        $key = implode(', ', array_keys($this->dados));
        $values = ':' . implode(', :', array_keys($this->dados));
        $this->create = "INSERT INTO {$this->tabela} ({$key}) VALUES ({$values})";
    }

    private function Execute() {
        $this->connexao();
        try {
            $this->create->execute($this->dados); //dados dentro do execute o PDO transforma no bindValue.
            $this->resultados = "ID: " . $this->conn->lastInsertId();
        } catch (PDOException $e) {
            $this->resultados = null;
            WSErro("Erro ao cadastrar {$e->getMessage()}", $e->getCode());
        }
    }

}
