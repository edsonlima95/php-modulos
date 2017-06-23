<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Interface
 *
 * @author Edson Lima
 */
class InterfaceClasses implements Ialuno {

    public $aluno;
    public $curso;
    public $formacao;

    function __construct($aluno, $curso) {
        $this->aluno = $aluno;
        $this->curso = $curso;
        $this->formacao = array();
    }

    public function formar() {
        $this->formacao[] = $this->curso;
        echo "O aluno {$this->aluno} formou se nos curso: {$this->curso}<br>";
    }

    public function matricular($curso) {
        $this->curso = $curso;
        echo "O aluno {$this->aluno} foi matriculado no curso de {$curso}<br>";
    }

}
