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
        require './_app/confg.inc.php';

        //PAGINA ATUAL.
        $atual = filter_input(INPUT_GET, 'atual', FILTER_VALIDATE_INT);
        //LINK DA PAGINA.
        $pager = new Pager('2-PaginacaoResultados.php?atual=', 'Primeira', 'Ultima');
        $pager->ExePager($atual, 1);

        //LEITURA DOS DADOS.
        $read = new Read();
        $read->ExeRead('ws_categories', 'LIMIT :limit OFFSET :offset', "limit={$pager->getLimite()}&offset={$pager->getOffset()}");
        //EXECUTA O RETORNO PARA A PAGINA. 
        if (!$read->getRowCount()):
            $pager->retornaPage();
            echo 'Não existe resultados';
        else:
            var_dump($read->getResult());
        endif;

        echo '<hr>';

        $pager->ExePaginator('ws_categories');
        echo $pager->getPaginator();
        //var_dump($pager);
        ?>
    </body>
</html>
