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

        $read = new Read();
        $read->ExeRead('ws_categories');

        //armazena o codigo html ma variavel.
        $tpl = file_get_contents('_mvc/category.tpl.html');
       
        foreach ($read->getResult() as $cat):
            extract($cat);
            //substitue os links ## no arquivo html da view.
            //echo str_replace(array('#category_name#', '#category_title#'), array($category_name, $category_title), $tpl);
        
            //criar um link para substituicao.
            $cat['pubdate'] = date('Y-m-d',strtotime($cat['category_date']));
        
            //alterar os valores da data.
            $cat['category_date'] = date('d-m-Y H:i',  strtotime($cat['category_date']));  
            
            //substitue os links ## no arquivo html da view.
            $links = explode('&',"#".implode('#&#', array_keys($cat))."#");
            echo str_replace($links, $cat, $tpl);
            
        endforeach;
        ?>
    </body>
</html>
