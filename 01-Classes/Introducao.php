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
        
        $classe = new Introducao();
        $classe->mostrar("INRODUAO", "TESTE");
        
        echo '<hr>';
        
        $classe->Class = "intro";
        $classe->funcao = "teste";
        $classe->arr();
        
        $classe->mostrar("INTRO", "TES");
        $classe->arr();
        ?>
    </body>
</html>
