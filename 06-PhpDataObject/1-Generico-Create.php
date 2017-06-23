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

        $array = array(
            "agent_name" => "teste",
            "agent_views" => "1000"
        );
        
        $create = new Create;
        
        $create->ExeCreate('ws_siteviews_agent', $array);
        var_dump($create);
        ?>
    </body>
</html>
