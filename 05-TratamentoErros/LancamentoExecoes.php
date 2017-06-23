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
        $eu = null;

        if (!$eu):
            $erro = new Exception('Eu esta null', E_USER_NOTICE);
        endif;
        //metodos da classe execption.
        echo $erro->getMessage();
        echo '<br>';
        echo $erro->getLine();
        echo '<br>';
        echo $erro->getFile();
        var_dump($erro);

        echo '<hr>';

        $eu = NULL;

        try {
            if (!$eu):
                throw new Exception('Eu estou novamente nulo', E_USER_WARNING);
            endif;
        } catch (Exception $e) {
            echo "<p>Erro code <b>{$e->getCode()}</b>: mensagem <b>{$e->getMessage()}</b>: linha <b>{$e->getLine()}</b><br>";
            echo "<small>Arquivo: <b>{$e->getFile()}</b></small>";
        }
        ?>
    </body>
</html>
