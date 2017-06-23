<?php

/**
 * Description of Check
 *
 * @author Edson Lima
 */
class Check {

    public static $dados;
    public static $formato;

    //validação de email.
    public static function validaEmail($email) {
        self::$dados = (string) $email;
        self::$formato = '/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/';

        if (preg_match(self::$formato, $email)):
            return true;
        else:
            return false;
        endif;
    }

    //validação de string e url amigavel.
    public static function Name($nome) {
        self::$formato = array();
        self::$formato['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
        self::$formato['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
        self::$dados = strtr(utf8_decode($nome), utf8_decode(self::$formato['a']), self::$formato['b']); //elimina as acentuaçoes e passa do formato A para o B;
        self::$dados = strip_tags(trim(self::$dados)); //elimina tags html.
        self::$dados = str_replace(' ', '-', self::$dados);
        self::$dados = str_replace(array('-----', '----', '---', '--'), '-', self::$dados); //se houver mais de um traço ele substitui por apenas 1.

        return strtolower(utf8_encode(self::$dados));
    }

    //vaidaçao da data.
    public static function ValidaData($data) {
        self::$formato = explode(' ', $data); //Transforma a data e hora em um array.
        self::$dados = explode('/', self::$formato[0]); //divide a data em um array.       
        if (empty(self::$formato[1]))://coloca a hora se nao for passada.
            self::$formato[1] = date('H:i:s');
        endif;
        //Timestamp.
        self::$dados = self::$dados[2] . '/' . self::$dados[1] . '/' . self::$dados[0] . ' ' . self::$formato[1];

        return self::$dados;
    }

    //Limita strings.
    public static function limitarWords($string, $limite, $ponto = null) {
        self::$dados = strip_tags(trim($string)); //elimina caracteres.
        self::$formato = $limite;
        $arraWords = explode(' ', self::$dados); //Transformando a sting em array.
        $numWords = count($arraWords);
        $newWords = implode(' ', array_slice($arraWords, 0, self::$formato)); //Indica o inicio e ate aonda ira o corte, funciona como o substr.

        $ponto = (empty($ponto) ? '...' : ' ' . $ponto);
        $result = (self::$formato < $numWords ? $newWords . $ponto : self::$dados);
        return $result;
    }

    //categoria por nome.
    public static function catByName($nome) {
        $read = new Read();
        $read->ExeRead('ws_categories', "WHERE category_name = :name", "name={$nome}");
        if ($read->getRowCount()):
            return $read->getResult()[0]['category_id']; //retorna o id da categoria.
        else:
            echo "A categoria {$nome} não foi encontrada!";
        endif;
    }

    //Deletar usuarios expirados.
    public static function userOnline() {
        $now = date('Y/m/d H:i:s'); //data de hoje.
        $deleteOnline = new Delete();
        $deleteOnline->ExeDelete('ws_siteviews_online', "WHERE online_endviews < :now", "now={$now}");
        $readUserOnline = new Read();
        $readUserOnline->ExeRead('ws_siteviews_online');
        return "Restaram: " . $readUserOnline->getRowCount() . " usuario(s)";
    }

    //redirecionamento de imagem com tim.
    public static function Imagem($imageUrl, $imageDescr, $imageW = null, $imageH = null) {

        self::$dados = 'uploads/' . $imageUrl; //passa a url com a imagem.

        if (file_exists(self::$dados) && !is_dir(self::$dados)):
            $path = HOME;
            $imagem = self::$dados;
            echo "<img src=\"{$path}/tim.php?src={$path}/{$imagem}&w={$imageW}&h={$imageH}\" alt=\"{$imageDescr}\" title=\"{$imageDescr}\">";
        else:
            return false;
        endif;
    }

}
