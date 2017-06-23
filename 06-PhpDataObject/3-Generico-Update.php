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
        
        $update = new Update();
        
         $array = array(
            "agent_name" => "update",
            "agent_views" => "12"
        );
        
        $update->ExeUpdate('ws_siteviews_agent', $array,"WHERE agent_id = :id","id=6");
        $update->ExeUpdate('ws_siteviews_agent', $array,"WHERE agent_id = :id","id=6");
        
        var_dump($update);
        ?>
    </body>
</html>
