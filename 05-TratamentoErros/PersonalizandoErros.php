<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <!--Link do css dos erros-->
        <link rel="stylesheet" href="css/reset.css"/>
        <title></title>
    </head>
    <body>
        <?php
        require './_app/confg.inc.php';

        trigger_error('Este e um notice', E_USER_NOTICE);
        trigger_error('Este e um warnig', E_USER_WARNING);
        //trigger_error('Este e um error',E_USER_ERROR);
        PHPErro(WS_ERROR, 'mesagem sem travar', __FILE__, __LINE__);

        WSErro('Esta e a funcao accept', WS_ACCEPT);
        ?>
    </body>
</html>
