<?php if(!defined('PT_GREGOOVERSE_NET')) exit; ?>
<div class="body"><?php 
    if(page::get('p') !== false) {
        if(ribbon::in(page::get('p'))) {
            if(file_exists('mod/' . page::get('p') . '.php')){
                crumbs::page();
                echo '<h1>', page::title(false), '</h1>';
                require_once 'mod/' . page::get('p') . '.php'; 
            } else {
                page::error("The module (" . page::get('p') . ") is not available yet.");
            }
        } else {
            page::error("The module (" . page::get('p') . ") doesn't exist.");
        }
    }
?>
    <!--<div id="disqus_thread"></div>-->
</div>
