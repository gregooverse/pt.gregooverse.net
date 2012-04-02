<?php
if(!defined('PT_GREGOOVERSE_NET')) exit;

class crumbs {
    public static $elements = array();
    
    public static function add($crumb, $link = false){
        if($link !== false)
            crumbs::$elements[] = array($crumb, $link);
        else
            crumbs::$elements[] = $crumb;
    }
    
    public static function out(){
        foreach(crumbs::$elements as $v)
            if(is_array($v))
                echo ' &middot; <a href="?p=' . urlencode($v[1]). '">' . $v[0] . '</a>';
            else
                echo ' &middot; ' . $v;
    }
    
    public static function page(){
        $page = page::get('p');
        
        if($page !== false)
            if(ribbon::in($page))
                crumbs::add(ribbon::$elements[$page], $page);
    }
        
}

?>
