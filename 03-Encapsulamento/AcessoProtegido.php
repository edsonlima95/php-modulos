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

        $protegido = new AcessoProtected('edson', 'edson@hotmail.com');

        var_dump($protegido);

        $protected = new Acesso('joao', 'joao@hotmail.com');
        $protected->addCpf('pedro', '1111111111');
        
        var_dump($protected);
        ?>
    </body>
</html>
