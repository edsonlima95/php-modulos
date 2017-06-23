<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>WS PHP - Generic Crud :: Read</title>
    </head>
    <body>
        <?php
        require('./_app/confg.inc.php');
        //ws_siteviews_agent

        $read = new Read;
        $read->ExeRead('ws_siteviews_agent', 'WHERE agent_name = :name AND agent_views >= :views LIMIT :limit', "name=teste&views=5&limit=2");

        var_dump($read);

        echo '<hr>';

        $read->ExeRead('ws_categories',"WHERE category_id = :id","id=3");

        var_dump($read->getResult()[0]['category_name']);

        ?>
    </body>
</html>
