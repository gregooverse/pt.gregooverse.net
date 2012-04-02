<?php if(!defined('PT_GREGOOVERSE_NET')) exit; ?>
<div id="accordion-source" class="accordion">
    <?php source::out(page::get('f')) ?>
    <h3><a href="#">Tree</a></h3>
    <div><?php source::tree(); ?></div>
</div>