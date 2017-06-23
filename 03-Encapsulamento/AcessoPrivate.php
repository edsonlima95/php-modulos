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

        $private = new AcessoPrivate('Edson', 'edson@hotmail.com', '122.111.111-11');

        var_dump($private);
        ?>
    </body>
</html>
