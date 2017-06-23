<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trigger erros</title>
    </head>
    <body>
        <?php
        $uso = '11111111112';
        $cpf = '';
        $cpf = '500';
        $cpf = $uso;
        $cpf = '11111111111';

        if (!$cpf):
            trigger_error('Informe o CPC', E_USER_NOTICE);
        elseif ($cpf == '500'):
            trigger_error('Formato nao e mais ultilizado', E_USER_DEPRECATED);
        elseif ($cpf == $uso):
            trigger_error('CPF em uso', E_USER_WARNING);
        elseif (!preg_match('/^[0-9]*$/i', $cpf) && strlen($cpf) != 11):
            trigger_error('Formato invalido', E_USER_ERROR);
        else:
            echo "<p style='color: green'>CPF valido</p>";
        endif;

        echo '<hr>';

        function Erro($Erro, $mensagem, $arquivo, $linha) {
            $cores = ($Erro == E_USER_ERROR ? 'red' : ($Erro == E_USER_WARNING ? 'orange' : 'blue'));
            echo "<p style='color:{$cores}'>Erro na linha: {$linha} # {$mensagem}<br>";
            echo "<small>{$arquivo}</small></p>";
        }

        //tudo que estiver abaixo do set_erro_handle pode usar a funcao 'Erro';
        set_error_handler('Erro');

        $uso = '11111111112';
        $cpf = '';
        $cpf = '500';
        $cpf = $uso;
        $cpf = '111111111';

        if (!$cpf):
            trigger_error('Informe o CPC', E_USER_NOTICE);
        elseif ($cpf == '500'):
            trigger_error('Formato nao e mais ultilizado', E_USER_DEPRECATED);
        elseif ($cpf == $uso):
            trigger_error('CPF em uso', E_USER_WARNING);
        elseif (!preg_match('/^[0-9]*$/i', $cpf) && strlen($cpf) != 11):
            trigger_error('Formato invalido', E_USER_ERROR);
        else:
            echo "<p style='color: green'>CPF valido</p>";
        endif;
        ?>
    </body>
</html>
