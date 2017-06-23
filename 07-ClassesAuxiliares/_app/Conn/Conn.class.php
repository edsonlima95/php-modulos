<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Classe de conexao com o banco pelo PDO e padrao singleton.
 *
 * @author Edson Lima
 */
class Conn {

    //estao vindo das constantes.
    public static $host = HOST;
    public static $pass = PASSWORLD;
    public static $user = USER;
    public static $dbsa = DBSA;

    /** @var PDO */
    public static $conexao = null;

    public static function Conectar() {
        try {
            if (self::$conexao == null):
                //dsn do myslq. caso queira usar outros bancos e so alterar o dsn.
                $dsn = 'mysql:host=' . self::$host . ';dbname=' . self::$dbsa;
                //padrao de utf8 do pdo.
                $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
                //instancia do PDO.
                self::$conexao = new PDO($dsn, self::$user, self::$pass, $options);
            endif;
        } catch (PDOException $e) {
            //metodo PHPerro usando os metodos de instancia do PDO.
            PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
        //tipo de erros exceçoes do PDO.
        self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$conexao;
    }

    /** Retorna a o metodo conectar com singleton. */
    public static function getConn() {
        return self::Conectar();
    }

}
