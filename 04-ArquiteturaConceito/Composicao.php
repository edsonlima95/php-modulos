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

        $cliente = new ComposicaoUsuario('edson', 'edson@hotmail.com');
        $cliente->cadastrarEndereco('varzea alegre', 'ceara');
        $cliente->getEnderco();

        //com o objeto criado da classe usuario eu posso acessar os atributos da classe cliente,
        //pois foi declarada um objeto na classe usurio que deu acesso a cliente.
        echo "O email de {$cliente->nome} é {$cliente->email}<br>";
        echo "Mora em {$cliente->getEnderco()->getCidade()}/{$cliente->getEnderco()->getEstado()}<hr>";

        var_dump($cliente);
        ?>
    </body>
</html>
