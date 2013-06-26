<?php
if(!defined('PT_GREGOOVERSE_NET')) exit;

class ribbon {
    public static $elements = array();
    
    public static function add($title, $link){
            ribbon::$elements[$link] = $title;
    }
    
    public static function adds($array){
        if(is_array($array))
            foreach($array as $k => $v)
                ribbon::add($k, $v);
    }
    
    public static function out(){
        foreach(ribbon::$elements as $k => $v)
            echo '<a href="?p=' . urlencode($k) . '">' . ribbon::nbsp($v) . '</a> ';
    }
    
    public static function in($module){
        return isset(ribbon::$elements[$module]);
    }
    
    public static function nbsp($text){
        return str_replace(' ', '&nbsp;', $text);
    }
}
?>
