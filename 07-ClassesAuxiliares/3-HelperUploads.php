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
        $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if ($form && $form['sendForm']):

            $upload = new UploadImagens('uploads/');

            $imagem = $_FILES['imagem'];
            //var_dump($imagem);

            $upload->Image($imagem);
            if (!$upload->getResult()):
                WSErro("Erro ao enviar o arquivo: {$upload->getErro()}", WS_ERROR);
            else:
                WSErro("Imagem enviada com sucesso: {$upload->getResult()}", WS_ACCEPT);
            endif;

            echo '<hr>';
            var_dump($upload);
        endif;
        ?>

        <form name="" action="" method="post" enctype="multipart/form-data">
            <label>
                <input type="file" name="imagem">
            </label>
            <input type="submit" value="Enviar" name="sendForm">
        </form>
    </body>
</html>
