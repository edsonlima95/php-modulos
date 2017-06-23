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
        <h3>Tratamento por existencia</h3><hr>
        <?php
        $string = '';
        $string = 2;
        if (is_string($string)):
            echo "E uma string<hr>";
        elseif (!is_string($string)):
            echo "Não e uma string<hr>";
        endif;

        if (!empty($string)):
            echo "Existe contem valor";
        elseif (isset($string)):
            echo "Existe nao contem valor";
        endif;
        ?>  
        <hr><hr>

        <h3>Tomada de decisão</h3><hr>
        <?php
        $email = 'wedson@hotmail.com';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)):
            echo "Email informado tem o formato invalido";
        elseif ($email == 'edson@hotmail.com'):
            die('Email restrito');
        endif;
        echo 'passou';
        ?>
        <h3>Flags:</h3><hr>

        <?php

        function idade($idade) {
            if (!$idade):
                return FALSE;
            elseif (!is_int($idade)):
                return FALSE;
            endif;
            return "Voce nasceu em " . (date('Y') - $idade).'<hr>';
        }

        $idade = 24;
        if (idade($idade)):
            echo idade($idade);
        else:
            echo "Erro de formato, apenas INT";
        endif;
        ?>

        <h3>Mesmo tipo:</h3><hr>
        <?php
        $um = '1';
        $dois = 1;

        if ($um == $dois):
            echo "Variaveis um e dois tem o mesmo valor<hr>";
        elseif ($um != $dois):
            echo "Variaveis um e dois nao tem o mesmo valor<hr>";
        endif;

        if ($um === $dois):
            echo "Variaveis um e dois tem o mesmo valor e sao do mesmo tipo";
        elseif ($um !== $dois):
            echo "Variaveis um e dois tem o mesmo valor mais nao sao do mesmo tipo";
        endif;
        ?>
    </body>
</html>
