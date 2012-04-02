<?php
if(!defined('PT_GREGOOVERSE_NET')) exit;

class data {

    public static function read($file){
        if(!file_exists($file)){
            trigger_error('data::read(' . $file . ')', E_USER_WARNING);
            page::error("data::read - The file doesn't exist.");
        }

        $content = false;

        if($content === false){
            $stream = fopen($file, 'r');
            $content = fread($stream, filesize($file));
            fclose($stream);
        }

        return $content;
    }
}
?>
