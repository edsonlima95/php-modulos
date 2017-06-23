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
        
        $delete = new Delete();

        $delete->ExeDelete('ws_siteviews_agent',"WHERE agent_id = :id","id=5");
        
        var_dump($delete);
        ?>
    </body>
</html>
