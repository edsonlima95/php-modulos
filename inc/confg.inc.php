<?php
//carrega todas as classes.
function __autoload($Class){
    $dirName = 'Class';//pasta onde fica as classes
    if(file_exists("{$dirName}/{$Class}.class.php")):
     require_once ("{$dirName}/{$Class}.class.php");
        else:
            die("Erro ao incluir");
    endif;  
}

?>
