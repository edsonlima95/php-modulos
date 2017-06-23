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
        require ('./inc/confg.inc.php');
        $teste = new ClasseAtributos();
        $teste2 = new Introducao();
        $teste3 = new ModelagemClasse('edson', 23, 'programador', 200);
        
        
        var_dump($teste3,$teste,$teste2);
        ?>
    </body>
</html>
