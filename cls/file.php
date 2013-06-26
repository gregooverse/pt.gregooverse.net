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
    
    public static function dirs($module){
        $tree = array();
        
        echo '<ul>';
        
        foreach(glob(file::mod($module, '*')) as $e){
            $f = basename($e);
            
            if($f == '.' || $f == '..')
                continue;

            if(is_dir($e) && file::exists(file::mod($module, $f . '/index.html')))
                echo '<li><a href="?p=', $module, '&f=', urlencode($f), '">', $f, '</a></li>';
        }
        
        echo '</ul>';
    }
    
    public static function mod($module, $path = false){
        return 'mod/' . $module . '/' . $path;
    }
}
?>
