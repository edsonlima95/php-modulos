<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require './inc/confg.inc.php';

        $cliente = new ObjetoDinamico();

        /** O stdClass serve como se fosse uma classe e ele pode acessar metodos e atributos de forma
          rapida sem ser preciso criar uma class, problema nao tem controle e pode ser alterado os valoes.
         */
        $joao = new stdClass();
        $joao->nome = 'joao';
        $joao->email = 'joao@hotmail.com';

        $cliente->setCliente($joao);

        $marcos = clone ($joao);
        $marcos->nome = 'marcos';
        $marcos->email = 'banana';

        var_dump($cliente, $joao, $marcos);
        ?>
    </body>
</html>
