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

        $cliente = new AssociacaoCliente('edson', 'edson@hotmail.com');
        $login = new AssociacoLogin($cliente);

        /** com o objeto login eu acesso todos os metos e atributos da classe cliente sem precisar
         * herdar-la isso e a associacao, isso e pq o getCliente da classe login e um objeto da classe cliente
          pois foi setado com o objeto $cliente dando o direito de acessar a classe cliente */
        if ($login->getLogin()):
            echo "Gerenciando o cliente id: {$login->getCliente()->getCliente()}<br>";
            echo "{$login->getCliente()->getNome()} logou com o email {$login->getCliente()->getEmail()}<hr>";
        endif;
        var_dump($cliente);
        ?>
    </body>
</html>
