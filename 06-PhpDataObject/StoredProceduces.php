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
    <link rel="stylesheet" href="css/reset.css">
    <body>
        <?php
        require './_app/confg.inc.php';

        $PDO = new Conn();

        try {

            $query = "SELECT * FROM ws_siteviews_agent WHERE agent_name = :name";
            $exe = $PDO->getConn()->prepare($query);

            $exe->bindValue(":name", "Google");
            $exe->execute();

            $google = $exe->fetch(PDO::FETCH_ASSOC);

            $exe->bindValue(":name", "Firefox");
            $exe->execute();

            $firefox = $exe->fetch(PDO::FETCH_ASSOC);
            //
        } catch (PDOException $e) {
            PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
        if ($google):
            //var_dump($google);
            echo "O seu navegador e: $google[agent_name] e suas visitas foram: $google[agent_views]<hr>";
        endif;

        if ($firefox):
            //var_dump($firefox);
            echo "O seu navegador e: $firefox[agent_name] e suas visitas foram: $firefox[agent_views]";
        endif;
        ?>
    </body>
</html>
