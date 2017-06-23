<?php

class View {

    private static $dados;
    private static $keys;
    private static $values;
    private static $template;

    //carrega os templates .tpl.html.
    public static function Load($template) {
        self::$template = (string) $template; //carrega os templates.
        self::$template = file_get_contents(self::$template . '.tpl.html'); //executa.
    }

    //mostra os dados
    public static function show(array $dados) {
        self::setKeys($dados);
        self::setValues();
        self::showView();
    }

    //somente arquivos .inc.php.
    public static function request($file, array $dados) {
        extract($dados);
        require "{$file}.inc.php";
    }

    //seta os indices
    public static function setKeys($dados) {
        self::$dados = $dados;
        self::$keys = explode('&', "#" . implode('#&#', array_keys(self::$dados)) . "#");
    }

    //seta os valores.
    public static function setValues() {
        self::$values = array_values(self::$dados);
    }

    //substitue os links pelos valores.
    public static function showView() {
        echo str_replace(self::$keys, self::$values, self::$template);
    }

}
