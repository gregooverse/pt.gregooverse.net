<?php
if(!defined('PT_GREGOOVERSE_NET')) exit;

class source {
    
    static public $exclude = array('');

    public static function tree($path = false){
        $tree = array();
        
        echo '<ul>';
        
        foreach(glob($path . '*') as $e){
            $f = basename($e);

            if($f == '.' || $f == '..')
                continue;

            if(is_dir($e)){
                echo '<li>', $e, source::tree($path . $f . '/'), '</li>';
                continue;
            }

            $pos = strrpos($f, '.'); 
            if($pos !== false && substr($f, $pos + 1) == 'php')
                echo '<li><a href="?p=source&f=', urlencode($e), '">', $f, '</a></li>';
            else
                echo '<li>', $f, '</li>';
        }
        
        echo '</ul>';
    }
    
    public static function exists($file){
        $pos = strrpos($file, '.'); 
        
        return $pos !== false && substr($file, $pos + 1) == 'php' && file::exists($file);
    }
    
    public static function show($file){
        echo highlight_file($file, true);
    }
}
?>
