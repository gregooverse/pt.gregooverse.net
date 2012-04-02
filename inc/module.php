<?php if(!defined('PT_GREGOOVERSE_NET')) exit; ?>
<div class="body"><?php 
    if(ribbon::in(page::get('p'))) 
        if(file_exists('mod/' . page::get('p') . '.php')){
            crumbs::page();
            echo '<h1>', page::title(false), '</h1>';
            require_once 'mod/' . page::get('p') . '.php'; 
        }
?>
    <!--<div id="disqus_thread"></div>-->
</div>