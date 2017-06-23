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

        $produto = new StaticScopo('livro', 100);
        $produtoDigital = new StaticDigital('digital', 50);

        $produto->vener();
        $produto->vener();
        $produto->vener();
        
        echo '<hr>';
     
        $produtoDigital->vener();
        $produtoDigital->vener();
        $produtoDigital->vener();
        $produtoDigital->vener();
        echo '<hr>';
         /** @param Resolucao de scopo e quando usa-se o nome da classe para
         *  pegar os atributos e metodos que nao pode ser instanciado pelo objeto;
         */
         echo StaticDigital::$digital.' Livros digitais<br>';
         echo StaticScopo::$vendas - StaticDigital::$digital.' Livros fisicos';
         StaticDigital::relatorio();

        var_dump($produto, $produtoDigital);
        ?>
    </body>
</html>
