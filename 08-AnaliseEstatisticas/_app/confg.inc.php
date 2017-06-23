<?php
//BASE.
define('HOME','http://localhost/SiteNoticias_2/07-ClassesAuxiliares');

//CONFIGURÇOES DO SITE ##########
define('HOST', 'localhost');
define('PASSWORLD', '');
define('DBSA', 'wsphp');
define('USER', 'root');

//FUÇAO AUTOLOAD DE CLASSES ##########
function __autoload($Class) {
    //obj nao foi passado a pasta _app pq o arquivo ja esta dentro dela entao inicia nela.
    $cDir = ['Conn','Helper']; //configuração de diretorio.
    $iDir = null; //verifica se esta incluso.
    //se nao estiver incluso e se o arquivo existir e nao for um diretorio ela esta na pasta.
    //O \ garante mesmo como arquivo e \ denovo pq so uma contra barra quebra o codigo.
    foreach ($cDir as $dirName)://percorre os diretorios em $cDir.
        if (!$iDir && file_exists(__DIR__ . "\\{$dirName}\\{$Class}.class.php") && !is_dir(__DIR__ . "\\{$dirName}\\{$Class}.class.php")):
            include_once (__DIR__ . "\\{$dirName}\\{$Class}.class.php");
            $iDir = TRUE;
        endif;
    endforeach;
    
    //Se nao incluir gera o erro e trava o codigo.
    if (!$iDir):
        trigger_error("Nao foi possivel incluir o arquivo {$Class}", E_USER_ERROR);
    endif;
}

//CONFIGURÇOES DE ERROS ##########
//Constantes erros css.
define('WS_ACCEPT', 'accept');
define('WS_INFOR', 'infor');
define('WS_ALERT', 'alert');
define('WS_ERROR', 'error');

//Mensagens apenas para o site FRONT_END.
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
