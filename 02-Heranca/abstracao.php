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

//        $conta = new Abstracao('edson', 500);
//        $contaDois = new Abstracao('joao', 300);        
//        $conta->depositar(1000);
//        $conta->sacar(500);
//        $conta->transferir(500, $contaDois);
//        $conta->extrato();
//        var_dump($conta,$contaDois);

        $contaCorrente = new abstracaoCC('edson', 0, 1000);
        
        $contaPoupanca = new abstracaoCP('joão', 0);

        $contaCorrente->depositar(2000);
        $contaCorrente->sacar(500);
        $contaCorrente->transferir(500, $contaPoupanca);

        $contaPoupanca->depositar(3000);
        $contaPoupanca->sacar(1051);
        $contaPoupanca->transferir(508.50, $contaCorrente);

        $contaCorrente->verSaldo();
        $contaPoupanca->verSaldo();
        echo "<pre>";
        var_dump($contaCorrente, $contaPoupanca);
        ?>
    </body>
</html>
