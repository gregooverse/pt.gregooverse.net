<?php
if(!defined('PT_GREGOOVERSE_NET')) exit;

class file {

    public static function exists($file, $safe = true){
        if(!$file){
            return false;
        }
        
        if($safe){
            $file = file::noparent($file);
        }
        
        return file_exists($file);
    }
    
    public static function noparent($path){
        return str_replace('../', '', $path);
    }
}
?>
