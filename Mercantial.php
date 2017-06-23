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
        $vendas = new Vendas('Mercadinho MDC');

        $maria = new Funcionario('maria', 20);
        $caio = new Funcionario('caio', 20);

        $edson = new Cliente('edson', '24');
        $joao = new Cliente('joao', '30');

        $arroz = new Produto('arroz', 5);
        $feijao = new Produto('feijao', 40);

        $vendas->vender($arroz, $caio, $edson);
        $vendas->vender($feijao, $maria, $joao);

        $vendas->remover($feijao, $maria, $joao);
        $vendas->caixaMercantil();

        $carrinho = new Carrinho($joao);
        $carrinho->Add($feijao);

        $carrinho->zelador($caio);

        var_dump($vendas, $carrinho);
        ?>
    </body>
</html>
