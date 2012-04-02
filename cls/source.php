<?php
if(!defined('PT_GREGOOVERSE_NET')) exit;

class source {

    public static function scan($path = false){
        $tree = array();
        
        foreach(glob($path . '*') as $e){
            $f = basename($e);

            if($f == '.' || $f == '..')
                continue;

            if(is_dir($e))
                $tree[$e] = source::scan($path . $f . '/');

            $pos = strrpos($f, '.'); 
            if($pos !== false && substr($f, $pos + 1) == 'php') 
                $tree[$e] = $f;
        }

        return $tree;
    }

    public static function tree($tree = false){
        if(!$tree)
            $tree = source::scan();

        echo '<ul>';
        
        foreach($tree as $e => $f){
            if(is_array($f)){
                if(count($f)){
                    echo '<li>', $e, '</li>';

                    source::tree($f);
                }
            } else {
                echo '<li><a href="?p=source&f=', urlencode($e), '">', $f, '</a></li>';
            }
        }          
        
        echo '</ul>';
    }
    
    public static function out($file){
        $file = str_replace('../', '', $file);
        
        $pos = strrpos($file, '.'); 
        if($pos !== false && substr($file, $pos + 1) == 'php')
                if(file_exists($file)) {
                    echo '<h3><a href="#">Source</a></h3>';
                    echo '<div>', highlight_file($file, true), '</div>';
                }
    }
}
?>
