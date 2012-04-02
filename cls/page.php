<?php
if(!defined('PT_GREGOOVERSE_NET')) exit;

class page {
    public static $get_cache = array();
    public static $post_cache = array();
    
    public static function get($e){
        if(!isset($_GET[$e]))
            return false;
        
        if(isset(page::$get_cache[$e]))
            return page::$get_cache[$e];
        
        page::$get_cache[$e] = filter_input(INPUT_GET, $e, FILTER_SANITIZE_STRING);
        
        return page::$get_cache[$e];
    }
    
    public static function post($e){
        if(!isset($_POST[$e]))
            return false;
        
        if(isset(page::$post_cache[$e]))
            return page::$post_cache[$e];
        
        page::$post_cache[$e] = filter_input(INPUT_POST, $e, FILTER_SANITIZE_STRING);
        
        return page::$post_cache[$e];
    }
    
    public static function posts(){
        $arguments = func_get_args();
        
        $posts = array();
        
        foreach($arguments as $e)
            $posts[] = page::post($e);
        
        return $posts;
    }
    
    public static function error($text){
        header('Location: 500.php?t=' . urlencode($text));
        
        exit(0);
    }
    
    public static function title($dash = true){
        $page = page::get('p');
        
        if($page !== false)
            if(ribbon::in($page))
                return (($dash) ? ' - ' : false) . ribbon::$elements[$page];
    }
}
?>
