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

        $boleto = new PolimorfismoBoleto('mac-pro', 3000);
        $boleto->pagar();
        echo '<pre>';
        var_dump($boleto);
        echo '<hr>';

        $deposito = new PolimorfismoDeposito('mac-pro', 3000);
        $deposito->pagar();
        echo '<pre>';
        var_dump($deposito);
        echo '<hr>';

        $cartao = new PolimorfismoCartao('mac-pro', 3000);
        $cartao->pagar();
        echo '<pre>';
        var_dump($cartao);
        ?>
    </body>
</html>
