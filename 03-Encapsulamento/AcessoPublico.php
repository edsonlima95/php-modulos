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

        $pessoa = new AcessoPublico('edson', 'edson@hotmail.com');

        /* Com os modificadores publico pode-se livrimente alterar o comportamento das variaveis */
        $pessoa->nome = 'teste2';
        $pessoa->email = 'teste';

        var_dump($pessoa);
        ?>
    </body>
</html>
