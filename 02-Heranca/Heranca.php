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

        $pessoa = new Heranca('Edson', 24);

        $pessoa->formar("ADS");
        $pessoa->formar("Programcação");
        $pessoa->formar("Design");

        $pessoa->mostra();
        echo "<pre>";
        var_dump($pessoa);
        echo "<pre>";
        
        echo '<hr>';

        $pessoaHeranca = new HerancaJuridica('joao', 23, 'java');
        $pessoaHeranca->formar("TEC");
        $pessoaHeranca->formar("SQL");
        $pessoaHeranca->formar("PADROES");

        $pessoaHeranca->contratar('Maria');
        $pessoaHeranca->contratar('Antonio');
        $pessoaHeranca->contratar('jr');

        $pessoaHeranca->ver();
        var_dump($pessoaHeranca);
        ?>
    </body>
</html>
