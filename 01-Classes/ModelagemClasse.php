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
       
       $pessoa = new ModelagemClasse("edson", 20, "desenvolvedor web", 1000);
       
       $pessoa->trabalhoExtra("aplicativo", 2000);
       $pessoa->salario();
       
       var_dump($pessoa);
        ?>
    </body>
</html>
