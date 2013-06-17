<?php 
if(!defined('PT_GREGOOVERSE_NET')) exit;
?>
    <div class="accordion"><?php foreach(glob('mod/program/*/index.html') as $filename) include $filename; ?></div>
