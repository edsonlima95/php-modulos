<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UploadImagens
 *
 * @author Edson Lima
 */
class UploadImagens {

    //ARQUIVOS
    private $file;
    private $name;
    private $send;
    //IMAGE UPLOAD
    private $width;
    private $image;
    //RESULTADOS
    private $result;
    private $erro;
    //DIRETORIOS
    private $folder;
    private static $baseDir;

    //CONSTRUTOR. Cria a pasta uploads.
    function __construct($baseDir = NULL) {
        self::$baseDir = ((string) $baseDir ? $baseDir : '../uploads/');
        if (!file_exists(self::$baseDir) && !is_dir(self::$baseDir))://se nao existir cria o diretorio.
            mkdir(self::$baseDir, 0777);
        endif;
    }

    //GETTERS
    function getResult() {
        return $this->result;
    }

    function getErro() {
        return $this->erro;
    }

    //METODO DE UPLOAD DE IMAGEM.
    public function Image(array $imagem, $name = null, $width = null, $folder = null) {
        $this->file = $imagem;
        $this->name = ((string) $name ? $name : substr($imagem['name'], 0, strrpos($imagem['name'], '.')));
        $this->width = ((int) $width ? $width : 1024);
        $this->folder = ((string) $folder ? $folder : 'imagens');
        $this->checkFolder($this->folder);
        $this->setNameArquivo();
        $this->uploadImgem();
    }

    //METODO DE UPLOAD DE FILE.
    public function uploadFile(array $file, $name = null, $folder = null, $maxfilesize = null) {
        $this->name = ((string) $name ? $name : substr($file['name'], 0, strrpos($file['name'], '.')));
        $this->file = $file;
        $this->folder = ((string) $folder ? $folder : 'files');
        $maxfilesize = ((int) $maxfilesize ? $maxfilesize : 2);
        //TIPO DE ARQUIVOS ACEITOS
        $fileAccept = [
            'application/msword',
            'application/pdf'
        ];
        //TAMANHO
        if ($this->file['size'] > $maxfilesize * (1024 * 1024)):
            $this->result = false;
            $this->erro = 'Tipo de arquivo muito grande. apenas 2mb';
        elseif (!in_array($this->file['type'], $fileAccept)):
            $this->result = false;
            $this->erro = 'Tipo de arquivo invalido';
        else:
            $this->checkFolder($this->folder);
            $this->setNameArquivo();
            $this->moveFile();
        endif;
    }

    //METODO DE UPLOAD DE MEDIAS.
    public function uploadMedia(array $medias, $name = null, $folder = null, $maxfilesize = null) {
        $this->name = ((string) $name ? $name : substr($medias['name'], 0, strrpos($medias['name'], '.')));
        $this->file = $medias;
        $this->folder = ((string) $folder ? $folder : 'medias');
        $maxfilesize = ((int) $maxfilesize ? $maxfilesize : 40);
        //TIPO DE ARQUIVOS ACEITOS
        $fileAccept = [
            'audio/mp3',
            'video/mp4'
        ];
        //TAMANHO
        if ($this->file['size'] > $maxfilesize * (1024 * 1024)):
            $this->result = false;
            $this->erro = 'Tipo de arquivo muito grande. apenas 2mb';
        elseif (!in_array($this->file['type'], $fileAccept)):
            $this->result = false;
            $this->erro = 'Tipo de arquivo invalido';
        else:
            $this->checkFolder($this->folder);
            $this->setNameArquivo();
            $this->moveFile();
        endif;
    }

    //VERIFICA SE A PASTA FOLDER EXISTE.
    private function checkFolder($folder) {
        list($y, $m) = explode('/', date('Y/m')); //o list passa os valores do array nas variaveis.
        $this->createFolder("{$folder}");
        $this->createFolder("{$folder}/{$y}");
        $this->createFolder("{$folder}/{$y}/{$m}/");
        $this->send = "{$folder}/{$y}/{$m}/";
    }

    //CRIA O DIRETORIO DA PASTA FOLDER
    private function createFolder($folder) {
        if (!file_exists(self::$baseDir . $folder) && !is_dir(self::$baseDir . $folder))://se nao existir cria o diretorio.
            mkdir(self::$baseDir . $folder, 0777);
        endif;
    }

    //SET O NOME DO ARQUIVO
    private function setNameArquivo() {
        $fileName = Check::Name($this->name) . strrchr($this->file['name'], '.');
        if (file_exists(self::$baseDir . $this->send . $fileName)):
            $fileName = Check::Name($this->name) . '-' . time() . strrchr($this->file['name'], '.'); //se existir renomeia.
        endif;
        $this->name = $fileName;
    }

    //METODO PARA CRIAR NOVA IMAGEN
    private function uploadImgem() {
        //VALIDAÇÃO DO TIPO
        switch ($this->file['type']):
            case 'image/jpg';
            case 'image/jpeg';
            case 'image/pjpeg';
                $this->image = imagecreatefromjpeg($this->file['tmp_name']);
                break;
            case 'image/png';
            case 'image/x-png';
                $this->image = imagecreatefrompng($this->file['tmp_name']);
                break;
        endswitch;
        //VALIDAÇÃO DA IMAGEM
        if (!$this->image):
            $this->result = false;
            $this->erro = 'Tipo de arquivo invalido, apenas JPG e PNG';
        else:
            $x = imagesx($this->image);
            $y = imagesy($this->image);
            $imageX = ($this->width < $x ? $this->width : $x); //width.
            $imageH = ($imageX * $y) / $x; //height.
            //nova imagem
            $newImage = imagecreatetruecolor($imageX, $imageH);
            imagealphablending($newImage, false);
            imagesavealpha($newImage, true);
            imagecopyresampled($newImage, $this->image, 0, 0, 0, 0, $imageX, $imageH, $x, $y);
        endif;
        //VALIDAR O NOME DA NOVA IMAGEM
        switch ($this->file['type']):
            case 'image/jpg';
            case 'image/jpeg';
            case 'image/pjpeg';
                imagejpeg($newImage, self::$baseDir . $this->send . $this->name);
                break;
            case 'image/png';
            case 'image/x-png';
                imagepng($newImage, self::$baseDir . $this->send . $this->name);
                break;
        endswitch;
        //VERIFICA SE FOI CRIADA.
        if (!$newImage):
            $this->result = false;
            $this->erro = 'Tipo de arquivo invalido, apenas JPG e PNG';
        else:
            $this->result = $this->send . $this->name;
            $this->erro = null;
        endif;
        //DESTROI A IMAGEM EM MEMORIA DEPOIS QUE FOI CRIADA
        imagedestroy($this->image);
        imagedestroy($newImage);
    }

    //METODO MOVE FILE.
    private function moveFile() {
        if (move_uploaded_file($this->file['tmp_name'], self::$baseDir . $this->send . $this->name)):
            $this->result = $this->send . $this->name;
            $this->erro = null;
        else:
            $this->result = false;
            $this->erro = "Erro ao mover arquivo";
        endif;
    }

}
