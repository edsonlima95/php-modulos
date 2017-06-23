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

        //funcionario
        $edson = new IteracaoClass1('Edson', 20, 'programador', 1000);
        //empresa
        $empresa = new IteracaoClass2("Microsoft");
        //jogando o objeto $edson para o atributo funcionario.
        $empresa->contratar($edson, 'Web master', 2000);
        //adiciona o salario na conta.
        $empresa->pagar();
        //promover
        $empresa->promover("Diretor da empresa", 10000);
        //adiciona o salario na conta.
        $empresa->pagar();
        echo "<pre>";
        var_dump($edson,$empresa);
        ?>
    </body>
</html>
