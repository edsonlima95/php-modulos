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

        $email = 'edson@hotmail.com';
        echo Check::validaEmail($email);
        echo '<hr>';

        $nome = 'Olá eu estou aqui, aprendendo PHP não  se preocupe !';
        echo Check::Name($nome);
        echo '<hr>';

        $data = '21/07/2016 12:40:20';
        echo Check::ValidaData($data);
        echo '<hr>';

        $string = 'Olá amigos estamos aprendendo PHP na upinside';
        echo Check::limitarWords($string, 5, "<small>Clique Aqui</small>");
        echo '<hr>';

        echo Check::catByName('artigos') . '<hr>';
        echo Check::catByName('esportes') . '<hr>';
        
        echo '<hr>';
        echo Check::userOnline();
        echo '<hr>';
         
        echo Check::Imagem('google.jpg','Google',300,200);
        
        ?>
        
    </body>
</html>
