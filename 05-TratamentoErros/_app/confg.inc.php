<?php

//CONFIGURÇOES DO SITE ##########
//FUÇAO AUTOLOAD DE CLASSES ##########
function __autoload($Class) {
    $dirName = 'Class'; //pasta onde fica as classes
    if (file_exists("{$dirName}/{$Class}.class.php")):
        require_once ("{$dirName}/{$Class}.class.php");
    else:
        die("Erro ao incluir");
    endif;
}

//CONFIGURÇOES DE ERROS ##########
//Constantes erros css.
define('WS_ACCEPT', 'accept');
define('WS_INFOR', 'infor');
define('WS_ALERT', 'alert');
define('WS_ERROR', 'error');

//FUNCAO FRONT-END.
function WSErro($mensagem, $tipoErro, $die = Null) {
    //tipo de mensagem e cor de acordo com as constantes.
    $classCss = ($tipoErro == E_USER_NOTICE ? WS_INFOR : ($tipoErro == E_USER_WARNING ? WS_ALERT : ($tipoErro == E_USER_ERROR ? WS_ERROR : $tipoErro)));
    echo "<p class=\"trigger {$classCss}\">{$mensagem}<span class=\"ajax_close\"></span></p>";

    if ($die):
        die;
    endif;
}

//PHPerro gatilhos.
function PHPErro($tipoErro, $mensagem, $arquivo, $linha) {
    $classCss = ($tipoErro == E_USER_NOTICE ? WS_INFOR : ($tipoErro == E_USER_WARNING ? WS_ALERT : WS_ERROR));
    echo "<p class=\"trigger {$classCss}\">";
    echo "<b>Erro na linha {$linha}:</b> {$mensagem}<br>";
    echo "<small>{$arquivo}</small>";
    echo "<span class=\"ajax_close\"></span></p>";

    if ($tipoErro == E_USER_ERROR):
        die();
    endif;
}

set_error_handler('PHPErro');
?>
