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
//        echo '<h2>Arquivos html</h1>';
        $session = new Session();
//        
//        //carregando o template html da pasta mvc 
//        View::Load('_mvc/category');
//
//        $read = new Read();
//        $read->ExeRead('ws_categories');
//        
//        //setando os valores no template html
//        foreach ($read->getResult() as $cat):
//            View::show($cat);
//        endforeach;
//
//        echo '<hr>';
//        echo '<h2>Arquivos php</h1>';
//        //carregando o arquivo em php da pasta mvc.
//        foreach ($read->getResult() as $cat):
//            View::request('_mvc/category', $cat);
//        endforeach;
        
        //ws_siteviews_agent
        
        $readNavegador = new Read();
        $readNavegador->ExeRead('ws_siteviews_agent');
        
        View::Load('_mvc/navegador');
        foreach ($readNavegador->getResult() as $nav):
            View::show($nav);
        endforeach;
        
        ?>
    </body>
</html>
