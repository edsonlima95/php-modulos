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
        <link rel="stylesheet" href="css/reset.css"/>
    </head>
    <body>
        <?php
        require './_app/confg.inc.php';

        $con = new Conn();

        $con->getConn();

        var_dump($con->getConn());
        ?>
    </body>
</html>
