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
        
        $construtor = new Construtor("Edson",23,"Vila União","111111111");
        $construtor->ver();
        $dados = $construtor->dados();
        echo $dados;
              
        ?>
    </body>
</html>
