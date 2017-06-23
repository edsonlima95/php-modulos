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
        
        $pessoa = new ClasseAtributos();
        
        $pessoa->dados("edson", "24", "1111111111");
        $usuario = $pessoa->mostrarDados();
        echo $usuario;
        echo '<hr>';
        $pessoa->arr();
               
        $pessoa->nome = "joao";
        $pessoa->idade = "10";
        $pessoa->telefone  = "22222222";
        echo '<hr>';
        $pessoa->arr();
        
        $usuario = $pessoa->mostrarDados();
        echo $usuario;
        ?>
    </body>
</html>
