<?php
if(!defined('PT_GREGOOVERSE_NET')) exit;

class data {

    public static function read($file){
        if(!file::exists($file)){
            trigger_error('data::read(' . $file . ')', E_USER_WARNING);
            page::error("data::read - The file (" . $file . ") doesn't exist.");
        }

        $content = false;

        if($content === false){
            $stream = fopen($file, 'r');
            $content = fread($stream, filesize($file));
            fclose($stream);
        }

        return $content;
    }
    
    public static function replace(&$content, $data, $start, $length = false, $pad = false, $direction = STR_PAD_RIGHT){
        $size = $length;

        if($size === false)
            $size = strlen($data);

        if(!$size)
            return;

        $end = $start + $size;

        if(strlen($content) < $end)
            page::error("The submitted data is too big.");

        if($length !== false){
            if($pad === false)
                $pad = pack('h*', 00);

            $data = str_pad($data, $size, $pad, $direction);
        }

        $content = substr($content, 0, $start) . $data . substr($content, $end);
    }
}
?>
