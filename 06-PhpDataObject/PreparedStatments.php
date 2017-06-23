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
        <link rel="stylesheet" href="css/reset.css">
    </head>
    <body>

        <?php
        require './_app/confg.inc.php';

        $PDO = new Conn();

        $name = 'explorer';
        $views = '200';
        try {
            //create
            //statements ou seja a query
            $query = "INSERT INTO ws_siteviews_agent (agent_name,agent_views) VALUES (?,?)";
            //prepared
            $create = $PDO->getConn()->prepare($query);
//            $create->bindValue(1, 'Google-chrome', PDO::PARAM_STR); //esse param e pra garantir que seja um string inserida no banco.
//            $create->bindValue(2, '100', PDO::PARAM_INT);
            //o blindparam so aceira variaves no valor;
            $create->bindParam(1, $name, PDO::PARAM_STR, 12);
            $create->bindParam(2, $views, PDO::PARAM_INT, 5);

            //$create->execute();
            //conta quantas linhas fora inseridas.
            if ($create->rowCount()):
                echo "Id: {$PDO->getConn()->lastInsertId()} - Cadastrado com sucesso"; //verifica ultimo id inserto.
            endif;

            //read.
            $queryRead = "SELECT * FROM ws_siteviews_agent WHERE agent_views >= :visitas";
            $read = $PDO->getConn()->prepare($queryRead);
            //retorna todos resultados acima do informado no caso 7.
            $read->bindValue(':visitas', 7);

            //$read->execute();
            if ($read->rowCount() > 1):
                echo "Pesquisa retornou {$read->rowCount()} resultado(s)";
                $resultados = $read->fetchAll(PDO::FETCH_ASSOC);
                var_dump($resultados);
            endif;
        } catch (PDOException $e) {
            PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
        ?>
    </body>
</html>
