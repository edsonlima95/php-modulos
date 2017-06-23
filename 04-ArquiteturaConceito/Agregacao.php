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
        //objeto edson.
        $edson = new AssociacaoCliente('edson', 'edson@hotmail.com');
        
        //objeto produtos.
        $wsphp = new AgregacaoProduto('20', 'ws_php', 100);
        $html = new AgregacaoProduto('21', 'html', 150);
        $sql = new AgregacaoProduto('24', 'mysql', 300);

        $outroCurso = new stdClass();
        $outroCurso->produto = '30';
        $outroCurso->nome = 'livro scrum';
        $outroCurso->valor = '50';

        $carrinho = new AgregacaoCarrinho($edson);
        $carrinho->Add($sql);
        $carrinho->Add($html);
        $carrinho->Add($wsphp);
        $carrinho->remover($wsphp);

        //gera um erro pq o objeto outro curso vem de outra classe.
        //$carrinho->Add($outroCurso);
        echo "<pre>";
        var_dump($edson, $carrinho);
        echo "</pre>";
        ?>
    </body>
</html>
