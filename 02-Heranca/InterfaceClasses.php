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
        require './Class/Ialuno.php';
        require './inc/confg.inc.php';

        $aluno = new InterfaceClasses('edson', 'ADM');

        $aluno->matricular('ADS');
        $aluno->formar();

        $aluno->matricular('ADC');
        $aluno->formar();

        $aluno->matricular('ADD');
        $aluno->formar();


        var_dump($aluno);
        ?>
    </body>
</html>
