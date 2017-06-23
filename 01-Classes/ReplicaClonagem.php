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
        
        $read = new ReplicaClonagem("posts", "categoria='noticias'","ORDER BY data DESC");       
        $read->querry();
        
        $read->setTermos("categoria='internet'");
        $read->querry();
                      
        //replicar, quando read1 recebe read ele tbm executarar as mesmas funcões.
        $read1 = $read;
        $read1->setTermos("categoria='replica de objetos'");
        $read1->querry();
        
        //clonando o objeto, ele usa as mesmas funçoes porem criara um novo objeto na memoria.
        $readClone = clone $read1;
        $readClone->setTermos("categoria='clone'");
        $readClone->setTabela("visitas");
        $readClone->querry();
        
        //ao clonar eu posso tbm executar a leitura abaixo sem copiar os mesmo valores ex:
        /*
        $read->querry();
        $read1->querry();
        $readClone->querry();*/
        
        var_dump($read,$read1,$readClone);
        ?>
    </body>
</html>
